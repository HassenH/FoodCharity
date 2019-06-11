<?php

require_once 'models/database.php';

class comment {

    private $db;
    public $id = 0;
    public $opinion = '';
    public $score = '';
    public $id_ag4fc_users = 0;
    public $id_ag4fc_donation = 0;

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

    public function addComment() {
        $query = 'INSERT INTO `ag4fc_comment` (`ag4fc_comment`.`opinion`, `ag4fc_comment`.`score`, `ag4fc_comment`.`id_ag4fc_users`, `ag4fc_comment`.`id_ag4fc_donation`) '
                . 'VALUES(:opinion, :score, :id_ag4fc_users, :id_ag4fc_donation) ';
        $queryExecute = $this->db->prepare($query);
        /**
         * Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif.
         * PDO::PARAM_STR, représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
         * Sécurise contre les injections SQL
         */
        $queryExecute->bindValue(':opinion', $this->opinion, PDO::PARAM_STR);
        $queryExecute->bindValue(':score', $this->score, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_users', $_SESSION['id'], PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_donation', $this->id, PDO::PARAM_INT);


// Execute la requête préparée et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

    public function getComments() {
        $query = 'SELECT `ag4fc_comment`.`id`, `ag4fc_comment`.`opinion`, `ag4fc_comment`.`score`, `ag4fc_comment`.`creationDate`, `ag4fc_donation`.`title`, `ag4fc_donation`.`details`, `ag4fc_donation`.`id` AS `idDonation` '
                . 'FROM `ag4fc_comment` '
                . 'INNER JOIN `ag4fc_donation` ON `ag4fc_comment`.`id_ag4fc_donation` = `ag4fc_donation`.`id` '
                . 'WHERE `ag4fc_donation`.`id_ag4fc_association` = :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id_ag4fc_association'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function removeComment() {
        $query = 'DELETE FROM `ag4fc_comment` '
                . 'WHERE `ag4fc_comment`.`id` = :id';

        $delete = $this->db->prepare($query);
        $delete->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $delete->execute();
    }

}
