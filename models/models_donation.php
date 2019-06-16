<?php

require_once 'models/database.php';

/* MODELE - MODEL */
/*
 * Je crée ma classe users (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

class donation {
    /*
     * Je crée mes attributs en fonction des champs de ma table users dans ma base de donnée
     * 1 attribut = 1 champs
     */

//Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
    private $db;
//Mes autres attributs sont publics car je veux pouvoir les afficher (donc les appeler en dehors de ma classe)
    public $id = 0;
    public $title = '';
    public $details = '';
    public $dateDelivery = '1970-01-01';
    public $id_ag4fc_association = 0;
    public $id_ag4fc_users = 0;
    public $id_ag4fc_timeSlot = 0;
    public $id_ag4fc_delivery = 0;
    public $id_ag4fc_status = 0;

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
    public function addDonation() {
        $query = 'INSERT INTO ag4fc_donation (`title`, `details`, `dateDelivery`, `id_ag4fc_users`, `id_ag4fc_association`, `id_ag4fc_timeSlot`, `id_ag4fc_delivery`, `id_ag4fc_status`) '
                . 'VALUES (:title , :details, :dateDelivery, :id_ag4fc_users, :id_ag4fc_association, :id_ag4fc_timeSlot, :id_ag4fc_delivery, 2)';
//$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
        $queryExecute = $this->db->prepare($query);
        /**
         * Bindvalue associe une valeur a un paramétre, ici a nos marqueurs nominatif.
         * PDO::PARAM_STR, représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
         * Sécurise contre les injections SQL
         */
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':details', $this->details, PDO::PARAM_STR);
        $queryExecute->bindValue(':dateDelivery', $this->dateDelivery, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_users', $_SESSION['id'], PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_association', $this->id_ag4fc_association, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_timeSlot', $this->id_ag4fc_timeSlot, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_delivery', $this->id_ag4fc_delivery, PDO::PARAM_INT);
// Execute la requête préparée et retourne le résultat dans la bdd
        return $queryExecute->execute();
    }

    /**
     * Méthode permettant de vérifier si le rendez vous existe déjà avant de le créer.
     * Retour possible : false -> la requête ne s'est pas exécutée.
     *                   0     -> l'utilisateur est disponible.
     *                   1     -> l'utilisateur existe déja.
     * @return boolean
     */
    public function checkIfTimeSlotExist() {
// On créé une variable de type booléen
        $state = false;
// On vérifie si le mail existe déja, dans la table ag4fc_users
        $query = 'SELECT COUNT(`id`) AS `count` FROM `ag4fc_donation` '
                . 'WHERE `id_ag4fc_timeSlot` = :id_ag4fc_timeSlot AND `dateDelivery` = :dateDelivery AND `id_ag4fc_association` = :id_ag4fc_association';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_ag4fc_timeSlot', $this->id_ag4fc_timeSlot, PDO::PARAM_INT);
        $queryExecute->bindValue(':dateDelivery', $this->dateDelivery, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_association', $this->id_ag4fc_association, PDO::PARAM_INT);


// Si la méthode (ici $queryExecute)->execute() = true
        if ($queryExecute->execute()) {
            $result = $queryExecute->fetch(PDO::FETCH_OBJ);
            $state = $result->count;
        }
        return $state;
    }

    public function getProfilDonationMade() {
        $query = 'SELECT `ag4fc_donation`.`id`, `ag4fc_donation`.`title`, DATE_FORMAT(`ag4fc_donation`.`creationDate`, \'%d/%m/%Y %H:%i\') AS `creationDate`, `ag4fc_productCategory`.`category`, `ag4fc_delivery`.`deliveryOption`, `ag4fc_status`.`status` '
                . 'FROM `ag4fc_users` '
                . 'INNER JOIN `ag4fc_donation` ON `ag4fc_users`.`id` = `ag4fc_donation`.`id_ag4fc_users` '
                . 'INNER JOIN `ag4fc_donationContent` ON `ag4fc_donation`.`id` = `ag4fc_donationContent`.`id_ag4fc_donation` '
                . 'INNER JOIN `ag4fc_productCategory` ON `ag4fc_productCategory`.`id` = `ag4fc_donationContent`.`id_ag4fc_productCategory` '
                . 'INNER JOIN `ag4fc_delivery` ON `ag4fc_delivery`.`id` =`ag4fc_donation`.`id_ag4fc_delivery` '
                . 'INNER JOIN `ag4fc_status` ON `ag4fc_status`.`id` = `ag4fc_donation`.`id_ag4fc_status` '
                . 'WHERE `ag4fc_users`.`id` = :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProfilDonationCollected() {
        $query = 'SELECT `ag4fc_donation`.`id`, `ag4fc_donation`.`title`, DATE_FORMAT(`ag4fc_donation`.`creationDate`, \'%d/%m/%Y %H:%i\') AS `creationDate`, `ag4fc_productCategory`.`category`, `ag4fc_delivery`.`deliveryOption`, `ag4fc_status`.`status` '
                . 'FROM `ag4fc_users` '
                . 'INNER JOIN `ag4fc_association` ON `ag4fc_users`.id = `ag4fc_association`.`id_ag4fc_users` '
                . 'INNER JOIN `ag4fc_donation` ON `ag4fc_association`.`id` = `ag4fc_donation`.`id_ag4fc_association` '
                . 'INNER JOIN `ag4fc_donationContent` ON `ag4fc_donation`.`id` = `ag4fc_donationContent`.`id_ag4fc_donation` '
                . 'INNER JOIN `ag4fc_productCategory` ON `ag4fc_donationContent`.`id_ag4fc_productCategory` = `ag4fc_productCategory`.`id` '
                . 'INNER JOIN `ag4fc_delivery` ON `ag4fc_donation`.`id_ag4fc_delivery` = `ag4fc_delivery`.`id` '
                . 'INNER JOIN `ag4fc_status` ON `ag4fc_donation`.`id_ag4fc_status` = `ag4fc_status`.`id` '
                . 'WHERE `ag4fc_users`.`id` = :id ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant l'affichage du don alimentaire
     */
    public function getDonationPage() {
        $query = 'SELECT `ag4fc_users`.`id`, `ag4fc_users`.`firstname`, `ag4fc_users`.`lastname`, `ag4fc_users`.`address`, `ag4fc_users`.`photo`, `ag4fc_users`.`phoneNumber`, DATE_FORMAT(`ag4fc_users`.`creationDate`, \'%d/%m/%Y\' ) AS registrationDate , `ag4fc_city`.`city`, `ag4fc_city`.`postalCode`, `ag4fc_donation`.`title`, `ag4fc_donation`.`id` AS idDonation, `ag4fc_donation`.`details`, DATE_FORMAT(`ag4fc_donation`.`dateDelivery`, \'%d/%m/%Y\' ) AS `dateDelivery`, DATE_FORMAT(`ag4fc_donation`.`creationDate`, \'%d/%m/%Y %H:%i\' ) AS `creationDate`, `ag4fc_donationContent`.`quantity`, `ag4fc_donationContent`.`weight`, `ag4fc_delivery`.`deliveryOption`, `ag4fc_timeSlot`.`timeSlot`, `ag4fc_status`.`status`, `ag4fc_productCategory`.`category`, `ag4fc_packages`.`packages` '
                . 'FROM `ag4fc_users` '
                . 'INNER JOIN `ag4fc_city` ON `ag4fc_users`.`id_ag4fc_city` = `ag4fc_city`.`id` '
                . 'INNER JOIN`ag4fc_donation` ON `ag4fc_donation`.`id_ag4fc_users` = `ag4fc_users`.`id` '
                . 'INNER JOIN `ag4fc_delivery` ON  `ag4fc_delivery`.`id` = `ag4fc_donation`.`id_ag4fc_delivery` '
                . 'INNER JOIN `ag4fc_timeSlot` ON `ag4fc_timeSlot`.`id` = `ag4fc_donation`.`id_ag4fc_timeSlot` '
                . 'INNER JOIN `ag4fc_status` ON `ag4fc_status`.`id` = `ag4fc_donation`.`id_ag4fc_status` '
                . 'INNER JOIN `ag4fc_donationContent` ON `ag4fc_donationContent`.`id_ag4fc_donation` = `ag4fc_donation`.`id` '
                . 'INNER JOIN `ag4fc_productCategory` ON  `ag4fc_productCategory`.`id` = `ag4fc_donationContent`.`id_ag4fc_productCategory` '
                . 'INNER JOIN  `ag4fc_packages` ON `ag4fc_packages`.`id` = `ag4fc_donationContent`.`id_ag4fc_packages` '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Methode pour récupérer l'adresse de l'association selon l'option de remise du don
     */
    public function getDonationAdressPage() {
        $query = 'SELECT `ag4fc_donation`.`id`, `ag4fc_association`.`name`, `ag4fc_users`.`address`, `ag4fc_city`.`city`, `ag4fc_city`.`postalCode` '
                . 'FROM `ag4fc_donation` '
                . 'INNER JOIN `ag4fc_association` ON `ag4fc_donation`.`id_ag4fc_association` = `ag4fc_association`.`id` '
                . 'INNER JOIN `ag4fc_users` ON `ag4fc_users`.`id` = `ag4fc_association`.`id_ag4fc_users` '
                . 'INNER JOIN `ag4fc_city` ON `ag4fc_city`.`id` = `ag4fc_users`.`id_ag4fc_city` '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function getDonationModify() {
        $query = 'SELECT `ag4fc_users`.`id`, `ag4fc_users`.`firstname`, `ag4fc_users`.`lastname`, `ag4fc_users`.`address`, `ag4fc_users`.`photo`, `ag4fc_users`.`phoneNumber`, `ag4fc_city`.`city`, `ag4fc_city`.`postalCode`, `ag4fc_donation`.`title`, `ag4fc_donation`.`id` AS idDonation, `ag4fc_donation`.`details`, `ag4fc_donation`.`dateDelivery`, `ag4fc_donation`.`creationDate`, `ag4fc_donationContent`.`quantity`, `ag4fc_donationContent`.`weight`, `ag4fc_delivery`.`deliveryOption`, `ag4fc_timeSlot`.`timeSlot`, `ag4fc_productCategory`.`category`, `ag4fc_packages`.`packages` '
                . 'FROM `ag4fc_users` '
                . 'INNER JOIN `ag4fc_city` ON `ag4fc_users`.`id_ag4fc_city` = `ag4fc_city`.`id` '
                . 'INNER JOIN`ag4fc_donation` ON `ag4fc_users`.`id` = `ag4fc_donation`.`id_ag4fc_users` '
                . 'INNER JOIN `ag4fc_donationContent` ON `ag4fc_donation`.`id` = `ag4fc_donationContent`.`id_ag4fc_donation` '
                . 'INNER JOIN `ag4fc_delivery` ON `ag4fc_delivery`.`id` = `ag4fc_donation`.`id_ag4fc_delivery` '
                . 'INNER JOIN `ag4fc_timeSlot` ON `ag4fc_donation`.`id_ag4fc_timeSlot` = `ag4fc_timeSlot`.`id` '
                . 'INNER JOIN `ag4fc_productCategory` ON `ag4fc_donationContent`.`id_ag4fc_productCategory` = `ag4fc_productCategory`.`id` '
                . 'INNER JOIN  `ag4fc_packages` ON `ag4fc_donationContent`.`id_ag4fc_packages` = `ag4fc_packages`.`id` '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function validDonationStatus() {
        $query = 'UPDATE `ag4fc_donation` SET `ag4fc_donation`.`id_ag4fc_status` = 1 '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    public function cancelDonationStatus() {
        $query = 'UPDATE `ag4fc_donation` SET `ag4fc_donation`.`id_ag4fc_status` = 3 '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    /**
     * Méthode permettant la modification des informations concernant le don alimentaire dans la base de données
     */
    public function updateDonation() {
        $query = 'UPDATE `ag4fc_donation` '
                . 'SET `ag4fc_donation`.`title` = :title, `ag4fc_donation`.`details` = :details, `ag4fc_donation`.`dateDelivery` = :dateDelivery, `ag4fc_donation`.`id_ag4fc_timeSlot` = :id_ag4fc_timeSlot, `ag4fc_donation`.`id_ag4fc_delivery` = :id_ag4fc_delivery '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':details', $this->details, PDO::PARAM_STR);
        $queryExecute->bindValue(':dateDelivery', $this->dateDelivery, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_ag4fc_timeSlot', $this->id_ag4fc_timeSlot, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_ag4fc_delivery', $this->id_ag4fc_delivery, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    public function getStatisticDonation() {
        $query = 'SELECT COUNT(`ag4fc_donation`.`id`) AS `numberDonation`, `ag4fc_users`.`lastname`, `ag4fc_users`.`firstname`, `ag4fc_users`.`photo`, DATE_FORMAT(`ag4fc_users`.`creationDate`, \'%d/%m/%Y\' ) AS registrationDate '
                . 'FROM `ag4fc_donation` '
                . 'INNER JOIN `ag4fc_users` ON `ag4fc_donation`.`id_ag4fc_users` = `ag4fc_users`.`id` '
                . 'WHERE `ag4fc_donation`.`id_ag4fc_users` =  :id';

        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $queryExecute->execute();

        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode removeDonation pour supprimer une donation
     */
    public function removeDonation() {
        $query = 'DELETE FROM `ag4fc_donation` '
                . 'WHERE `ag4fc_donation`.`id` = :id';

        $delete = $this->db->prepare($query);
        $delete->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $delete->execute();
    }

}
