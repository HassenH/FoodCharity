<?php

class city {

    private $db;
    public $id;
    public $postalCode = '';
    public $city = '';

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

    public function searchZipcode($search) {
        $query = 'SELECT `id`, `city`, `postalCode` FROM `ag4fc_city`   '
                . 'WHERE `postalCode` LIKE :search '
                . 'ORDER BY `city` ASC';
        $queryExecute = $this->db->prepare($query);
        //On peut concaténer les modulos ici où dans le contrôleur
        $queryExecute->bindValue(':search', $search . '%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

}
