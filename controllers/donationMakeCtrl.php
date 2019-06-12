<?php

session_start();

//On initialise un tableau d'erreurs vide

$formErrors = array();

// Instanciation de la class donation
$donation = new donation();
// Instanciation de la class donationContent
$donationContent = new donationContent();
// Instanciation de la class timeSlot
$timeSlot = new timeSlot();
// Instanciation de la class listTimeSlot
$listTimeSlot = $timeSlot->getTimeSlotList();
// Instanciation de la class association
$association = new association();
$listAssociation = $association->getAssociationList();
// Instanciation de la class delivery
$delivery = new delivery();
$listDelivery = $delivery->getDeliveryList();
// Instanciation de la class packages
$package = new packages();
$listPackage = $package->getPackagesList();
// Instanciation de la class productCategory
$productCategory = new productCategory();
$listProductCategory = $productCategory->getProductCategoryList();


/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */
if (count($_POST) > 0) {

    /*
     * On vérifie que $_POST['title'] n'est pas vide
     * S'il est vide => on stocke l'erreur dans le tableau $formErrors
     * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
     */
    if (!empty($_POST['title'])) {
        /*
         * On vérifie si la saisie utilisateur correspond à la regex
         * Si tout va bien => on stocke dans la variable qui nous servira à afficher
         * Sinon => on stocke l'erreur dans le tableau $formErrors
         */
        if (preg_match($regexName, $_POST['title'])) {
            //Ici on utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
            $donation->title = htmlspecialchars($_POST['title']);
        } else {
            $formErrors['title'] = 'Merci de renseigner un titre valide';
        }
    } else {
        $formErrors['title'] = 'Merci de renseigner un titre';
    }

    if (!empty($_POST['details'])) {
        $donation->details = htmlspecialchars($_POST['details']);
    } else {
        $formErrors['details'] = 'Merci de répondre à cette question';
    }

    if (!empty($_POST['date'])) {
        if (preg_match($regexDate, $_POST['date'])) {
            $donation->dateDelivery = htmlspecialchars($_POST['date']);
        } else {
            $formErrors['date'] = 'Veuillez renseignez une date valide';
        }
    } else {
        $formErrors['date'] = 'Veuillez renseignez une date';
    }

    if (!empty($_POST['hour'])) {
        if (preg_match($regexId, $_POST['hour'])) {
            $donation->id_ag4fc_timeSlot = htmlspecialchars($_POST['hour']);
            /**
             * Je vérifie si l'heure de remise du don existe dans la base de données
             * On stocke le résultat de la méthode checkIfTimeSlotExist qui permet de vérifier
             * si l'heure de remise du don a déjà été enregistré dans la base de donnée
             */
            $resultCount = $donation->checkIfTimeSlotExist();
            if ($resultCount > 0) {
                $formErrors['hour'] = 'Un rendez-vous existe déja, veuillez prendre une autre heure de rendez-vous pour la remise du don !';
            }
        } else {
            $formErrors['hour'] = 'Veuillez renseignez une heure valide';
        }
    } else {
        $formErrors['hour'] = 'Veuillez renseignez une heure';
    }

    if (!empty($_POST['delivery'])) {
        if (preg_match($regexId, $_POST['delivery'])) {
            $donation->id_ag4fc_delivery = htmlspecialchars($_POST['delivery']);
        } else {
            $formErrors['delivery'] = 'Merci de sélectionner une option de remise';
        }
    } else {
        $formErrors['delivery'] = 'Merci de renseigner une option de remise';
    }

    if (!empty($_POST['association'])) {
        if (preg_match($regexId, $_POST['association'])) {
            $donation->id_ag4fc_association = htmlspecialchars($_POST['association']);
        } else {
            $formErrors['association'] = 'Merci de renseigner une association valide';
        }
    } else {
        $formErrors['association'] = 'Merci de renseigner une association';
    }

    /*
     * Class donationContent
     */

    if (!empty($_POST['quantity'])) {
        if (preg_match($regexNumberDonation, $_POST['quantity'])) {
            $donationContent->quantity = htmlspecialchars($_POST['quantity']);
        } else {
            $formErrors['quantity'] = 'Merci de renseigner un nombre de colis valide';
        }
    } else {
        $formErrors['quantity'] = 'Merci de renseigner un nombre de colis';
    }

    if (!empty($_POST['weight'])) {
        if (preg_match($regexNumberWeight, $_POST['weight'])) {
            $donationContent->weight = htmlspecialchars($_POST['weight']);
        } else {
            $formErrors['weight'] = 'Merci de renseigner un poids valide';
        }
    } else {
        $formErrors['weight'] = 'Merci de renseigner un poids';
    }

    if (!empty($_POST['packages'])) {
        if (preg_match($regexId, $_POST['packages'])) {
            $donationContent->id_ag4fc_packages = htmlspecialchars($_POST['packages']);
        } else {
            $formErrors['packages'] = 'Merci de renseigner un contenant valide';
        }
    } else {
        $formErrors['packages'] = 'Merci de renseigner un contenant';
    }

    if (!empty($_POST['category'])) {
        if (preg_match($regexId, $_POST['category'])) {
            $donationContent->id_ag4fc_productCategory = $_POST['category'];
        } else {
            $formErrors['category'] = 'Merci de sélectionner une réponse';
        }
    } else {
        $formErrors['category'] = 'Merci de répondre à cette question';
    }

    if (count($formErrors) == 0) {
        /**
         * On appelle la méthode getInstance, qui se trouve dans la classe database
         * Puisque cette methode est static il n'est pas nécessaire d'instancier un nouvel objet
         * getInstance() me retourne l'objet instancié de la classe Database
         */
        $database = Database::getInstance();
        // On fais appelle a setAttribute qui est une méthode de PDO, pour gérer les erreurs
        $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $database->db->beginTransaction();
            $donation->addDonation();
            $donationContent->id_ag4fc_donation = $database->db->lastInsertId();
            $registerDonation = $donationContent->addDonationContent();
            $database->db->commit();
            $formSuccess = 'Merci pour votre don !';
        } catch (Exception $e) {
            $database->db->rollback();
            die('error : ' . $e->getMessage());
        }
    }
}