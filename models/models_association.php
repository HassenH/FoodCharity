<?php

require_once 'models/database.php';

class association {

    private $db;
    public $name = '';

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
    public function addAssociation() {
        /*
         * Je prépare ma requête et je la stocke dans une variable
         * Attention : ne pas oublier l'espace à la fin de ma première ligne
         */
        $query = 'INSERT INTO `ag4_association`(`name` `id_ag4_users) '
                . 'VALUES(:name, 2)';
        //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
        $queryExecute = $this->db->prepare($query);
        // Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif
        // PDO::PARAM_STR, sa force le PDO, a considérer les entrées utilisateur en chaine de caractére, sécurise contre les injection SQL
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);

        return $queryExecute->execute();
        /*
         * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
         * Attention : fetchAll récupère un tableau de résultats
         */
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
