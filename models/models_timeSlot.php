<?php

class timeSlot {
    /*
     * Je crée mes attributs en fonction des champs de ma table users dans ma base de donnée
     * 1 attribut = 1 champs
     */

//Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
    private $db;
//Mes autres attributs sont publics car je veux pouvoir les afficher (donc les appeler en dehors de ma classe)
    public $id = 0;
    public $timeSlot = '';

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

    public function getTimeSlotList() {
        $query = 'SELECT `id`, `timeSlot` '
                . 'FROM ag4fc_timeSlot ';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

}
