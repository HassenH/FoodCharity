<?php

require_once 'models/database.php';

/* MODELE - MODEL */
/*
 * Je crée ma classe users (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

class users {
    /*
     * Je crée mes attributs en fonction des champs de ma table users dans ma base de donnée
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
    public $phoneNumber = '';
    public $mail = '';
    public $photo = '';
    public $password = '';
    public $id_ag4fc_usersGroup = '';
    public $id_ag4fc_city = '';

    // Méthode magic  __construct de la classe dataBaseSingleton
    public function __construct() {
        /*
         * J'utilise un try catch pour essayer (try) de me connecter à ma base de données.
         * S'il y a une erreur (Exception) je l'attrappe (catch), j'arrête le code (die) et j'affiche l'erreur (getMessage)
         */
        try {
            $this->db = Database::getInstance()->db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant d'insérer les informations des utilisateurs dans la base de données lors de l'inscription
     */
    public function addUsers() {
        $query = 'INSERT INTO `ag4fc_users`(`civility`,`lastname`, `firstname`,`address`, `phoneNumber`, `mail`, `photo`, `password`, `id_ag4fc_usersGroup`, `id_ag4fc_city`) '
                . 'VALUES(:civility, :lastname, :firstname, :address, :phoneNumber, :mail, :photo, :password, :id_ag4fc_usersGroup, :id_ag4fc_city)';
        //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
        $queryExecute = $this->db->prepare($query);
        /**
         * Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif.
         * PDO::PARAM_STR, représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
         * Sécurise contre les injections SQL
         */
        $queryExecute->bindValue(':civility', $this->civility, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':photo', $this->photo, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_usersGroup', $this->id_ag4fc_usersGroup, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_city', $this->id_ag4fc_city, PDO::PARAM_INT);
        // Execute la requête préparée et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

    /**
     * Méthode permettant de vérifier si l'utilisateur existe déjà avant de le créer.
     * Retour possible : false -> la requête ne s'est pas exécutée.
     *                   0     -> l'utilisateur est disponible.
     *                   1     -> l'utilisateur existe déja.
     * @return boolean
     */
    public function checkIfUserExist() {
        // On créé une variable de type booléen
        $state = false;
        // On vérifie si le mail existe déja, dans la table ag4fc_users
        $query = 'SELECT COUNT(`id`) AS `count` FROM `ag4fc_users` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        // Si la méthode (ici $queryExecute)->execute() = true
        if ($queryExecute->execute()) {
            $result = $queryExecute->fetch(PDO::FETCH_OBJ);
            $state = $result->count;
        }
        return $state;
    }

    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * L'email sert de login
     * @return type
     */
    public function userConnect() {
        // On va récuperer les données de la ligne contenant l'email entrée
        $query = 'SELECT `ag4fc_users`.`id` AS `id`, `ag4fc_users`.`mail` AS `mail`, `ag4fc_users`.`password` AS `password`, `ag4fc_users`.`id_ag4fc_usersGroup` AS `idGroup` '
                . 'FROM `ag4fc_users` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        // bindvalue Associe la valeur du marqueur nominatif email au paramètre string
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        //On execute la requête
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet à l'utilisateur d'afficher ses données
     */
    public function getUserList() {
        $query = 'SELECT ag4fc_users.id, ag4fc_users.civility, ag4fc_users.firstname, ag4fc_users.lastname, ag4fc_users.address, ag4fc_users.phoneNumber, ag4fc_users.mail, ag4fc_users.photo, ag4fc_city.city, ag4fc_city.postalCode '
                . 'FROM ag4fc_users '
                . 'INNER JOIN ag4fc_city '
                . 'ON ag4fc_users.id_ag4fc_city = ag4fc_city.id '
                . 'WHERE ag4fc_users.id = :id';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet à l'administrateur d'afficher les données des utilisateurs
     */
    public function getAdminListUser() {

        $query = 'SELECT `ag4fc_users`.`id`,`ag4fc_users`.`civility`, `ag4fc_users`.`firstname`, `ag4fc_users`.`lastname`, `ag4fc_users`.`mail`, `ag4fc_users`.`phoneNumber`, `ag4fc_users`.`id_ag4fc_usersGroup` '
                . 'FROM `ag4fc_users` '
                . 'ORDER BY `ag4fc_users`.`id`';
        $queryExecute = $this->db->query($query);

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode updateUsers pour ajouter un utilisateur
     */
    public function updateUsers() {
        $query = 'UPDATE ag4fc_users '
                . 'SET `civility` = :civility, `firstname` = :firstname, `lastname` = :lastname, `address` = :address, `phoneNumber` = :phoneNumber, `mail` = :mail, `password` = :password, `id_ag4fc_city` = :id_ag4fc_city '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        $queryExecute->bindValue(':civility', $this->civility, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_city', $this->id_ag4fc_city, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    /**
     * Méthode removeUser pour supprimer un utilisateur
     */
    public function removeUser() {
        $query = 'DELETE FROM `ag4fc_users` '
                . 'WHERE `id` = :id';
        $delete = $this->db->prepare($query);
        $delete->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        return $delete->execute();
    }

    /**
     * Méthode removeUserAdmin pour supprimer un utilisateur dans la partie Administrateur
     */
    public function removeUserAdmin() {
        $query = 'DELETE FROM `ag4fc_users` '
                . 'WHERE `id` = :id';
        $delete = $this->db->prepare($query);
        $delete->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $delete->execute();
    }

}
