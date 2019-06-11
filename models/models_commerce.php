<?php

require_once 'models/database.php';

class commerce {

    private $db;
    public $id = 0;
    public $name = '';
    public $siretNumber = '';
    public $id_ag4fc_users = 0;

    /**
     * Méthode magic __construct de la classe dataBaseSingleton
     */
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
     * Méthode permettant d'insérer les informations des commerces dans la base de données lors de l'inscription
     */
    public function addCommerce() {
        // Enregistrement dans la table ag4fc_enterprise de la valeur de ses attributs name et siret
        $query = 'INSERT INTO `ag4fc_commerce`(`name`, `siretNumber`, `id_ag4fc_users`) '
                . 'VALUES(:name, :siretNumber, :id_ag4fc_users)';
        //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
        $queryExecute = $this->db->prepare($query);
        // Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':siretNumber', $this->siretNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_users', $this->id_ag4fc_users, PDO::PARAM_INT);

        // Execute la requête et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

    public function getCommerce() {
        $query = 'SELECT `ag4fc_commerce`.`name`, `ag4fc_commerce`.`siretNumber` '
                . 'FROM `ag4fc_commerce` '
                . 'INNER JOIN `ag4fc_users` '
                . 'ON `ag4fc_commerce`.`id_ag4fc_users` = `ag4fc_users`.`id` '
                . 'WHERE `ag4fc_users`.`id` = :id';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function updateCommerce() {
        $query = 'UPDATE `ag4fc_commerce` SET `ag4fc_commerce`.`name` = :name '
                . 'WHERE `ag4fc_commerce`.`id_ag4fc_users` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        return $queryExecute->execute();
    }

}
