<?php

require_once 'models/database.php';

/* MODELE - MODEL */
/*
 * Je crée ma classe users (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

class donationContent {
    /*
     * Je crée mes attributs en fonction des champs de ma table users dans ma base de donnée
     * 1 attribut = 1 champs
     */

    //Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
    private $db;
    //Mes autres attributs sont publics car je veux pouvoir les afficher (donc les appeler en dehors de ma classe)
    public $id = 0;
    public $quantity = 0;
    public $weight = 0;
    public $id_ag4fc_packages = 0;
    public $id_ag4fc_donation = 0;
    public $id_ag4fc_productCategory = 0;

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
     * Méthode permettant d'insérer les informations concernant le don alimentaire dans la base de données lors de l'envoi du formulaire
     */
    public function addDonationContent() {
        $query = 'INSERT INTO `ag4fc_donationContent` (`quantity`, `weight`, `id_ag4fc_packages`, `id_ag4fc_donation`, `id_ag4fc_productCategory`) '
                . 'VALUES (:quantity, :weight, :id_ag4fc_packages, :id_ag4fc_donation, :id_ag4fc_productCategory)';

        // On prépare la requête à l'exécution et on retourne un objet $queryExecute
        $queryExecute = $this->db->prepare($query);
        /**
         * Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif.
         * PDO::PARAM_STR, représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
         * Sécurise contre les injections SQL
         */
        $queryExecute->bindValue(':quantity', $this->quantity, PDO::PARAM_STR);
        $queryExecute->bindValue(':weight', $this->weight, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_packages', $this->id_ag4fc_packages, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_donation', $this->id_ag4fc_donation, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_productCategory', $this->id_ag4fc_productCategory, PDO::PARAM_INT);
        // Execute la requête préparée et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

    /**
     * Méthode permettant la modification des informations concernant le don alimentaire dans la base de données
     */
    public function updateDonationContent() {
        $query = 'UPDATE `ag4fc_donationContent` '
                . 'SET `ag4fc_donationContent`.`quantity` = :quantity, `ag4fc_donationContent`.`weight` = :weight, `ag4fc_donationContent`.`id_ag4fc_packages` = :id_ag4fc_packages, `ag4fc_donationContent`.`id_ag4fc_productCategory` = :id_ag4fc_productCategory '
                . 'WHERE `ag4fc_donationContent`.`id_ag4fc_donation` = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $queryExecute->bindValue(':quantity', $this->quantity, PDO::PARAM_STR);
        $queryExecute->bindValue(':weight', $this->weight, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_packages', $this->id_ag4fc_packages, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_productCategory', $this->id_ag4fc_productCategory, PDO::PARAM_INT);

        // Execute la requête préparée et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

}
