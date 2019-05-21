<?php

require_once 'models/database.php';
/* MODELE - MODEL */
/*
 * Je crée ma classe clients (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

class users {
    /*
     * Je crée mes attributs en fonction des champs de ma table clients
     * dans ma base de donnée
     * 1 attribut = 1 champs
     */

    //Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
    private $db;
    //Mes autres attributs sont publics car je veux pouvoir les afficher (donc les appeler en dehors de ma classe)
    public $id = 0;
    public $civility = '';
    public $lastname = '';
    public $firstname = '';
    public $birthDate = '1970-01-01';
    public $address = '';
    public $region = '';
    public $city = '';
    public $postalCode = 0;
    public $phoneNumber = 0;
    public $mail = '';
    public $password = '';

    //La méthode magique contruct s'éxecute à l'instanciation de l'objet ($clients = new clients())
    public function __construct() {
        /*
         * J'utilise un try catch pour essayer (try) de me connecter à ma base de données.
         * S'il y a une erreur (Exception) je l'attrappe (catch), j'arrête le code (die) et j'affiche l'erreur (getMessage)
         */
        try {
            /*
             * Mon attribut db devient un objet PDO, il va me permettre de me connecter à ma base de données.
             * Il a besoin d'une "phrase de connexion" :
             * host = localhost - il s'agit de l'hôte sur lequel est héberge mon site
             * dbname=colyseum - c'est la base de données que je vais utiliser
             * charset=utf8 - permet de conserver les caractères spéciaux qui sont récupérés de la base de données
             * Les deux autres paramètres de PDO sont :
             * le nom d'utilisateur permettant de se connecter à la base (admin_colyseum) et son mot de passe (pwd_colyseum)
             */
            $this->db = Database::getInstance()->db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant de récupérer les noms et prénoms de tous les clients
     * @return objet
     */
    public function addUsers() {
        /*
         * Je prépare ma requête et je la stocke dans une variable
         * Attention : ne pas oublier l'espace à la fin de ma première ligne
         */
        $query = 'INSERT INTO `ag4_users`(`civility`,`lastname`, `firstname`,`address`, `region`, `city`, `postalCode`, `phoneNumber`, `mail`, `password`, `id_ag4_usersGroup`) '
                . 'VALUES(:civility, :lastname, :firstname, :address, :region, :city, :postalCode, :phoneNumber, :mail, :password, 1)';
        //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
        $queryExecute = $this->db->prepare($query);
        // Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif
        // PDO::PARAM_STR, sa force le PDO, a considérer les entrées utilisateur en chaine de caractére, sécurise contre les injection SQL
        $queryExecute->bindValue(':civility', $this->civility, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':region', $this->region, PDO::PARAM_STR);
        $queryExecute->bindValue(':city', $this->city, PDO::PARAM_STR);
        $queryExecute->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);

        return $queryExecute->execute();
        /*
         * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
         * Attention : fetchAll récupère un tableau de résultats
         */
    }

    public function getUsersList() {

        $query = 'SELECT `civility`,`lastname`, `firstname`,`address`, `region`, `city`, `postalCode`, `phoneNumber`, `mail` '
                . 'FROM `ag4_users` '
                . 'WHERE id = :id';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function updateUsers() {
        $query = 'UPDATE `ag4_users` SET (`civility` = :civility,`lastname` = :lastname, `firstname` = :firstname,`address` = :address, `region` = :region, `city` = :city, `postalCode` = :postalCode, `phoneNumber` = :phoneNumber, `mail` = :mail, `password` = :password, `id_ag4_usersGroup` = :id_ag4_usersGroup WHERE `id` = :id) ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':civility', $this->civility, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':region', $this->region, PDO::PARAM_STR);
        $queryExecute->bindValue(':city', $this->city, PDO::PARAM_STR);
        $queryExecute->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function checkIfUsersIsFree() {
        // On créé une variable de type booléen.
        $isOk = false;
        // On vérifie si le mail existe déja, dans la table ag4_users
        $query = 'SELECT COUNT(`id`) AS `isFree` FROM `ag4_users` WHERE `mail` = :mail';
        $queryExecute = $this->dataBase->prepare($query);
        $queryExecute->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        //Si ma méthode (ici $queryExecute)->execute() = true
        if ($queryExecute->execute()) {
            $result = $queryExecute->fetch(PDO::FETCH_OBJ);
            $isOk = $result->isFree;
        }
        return $isOk;
    }

    public function readUserByMail() {
        // On va récuperer les données de la ligne contenant l'email entrée

        $query = 'SELECT `id`, `mail`, `password` FROM `ag4_users` WHERE mail = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode removeUser pour supprimer un utilisateur
     * @return string
     */
    public function removeUser() {
        $query = 'DELETE FROM `ag4_users` '
                . 'WHERE `id` = :id';
        $supression = $this->db->prepare($query);
        $supression->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $supression->execute();
    }

    /**
     * Méthode destruct (méthode magique)
     */
    public function __destruct() {
        $this->db = NULL;
    }

}
