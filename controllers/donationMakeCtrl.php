<?php

session_start();

/*
 * Si id_ag4fc_usersGroup(id de la table usersGroup) est différent de 2 (Particulier) ou  différent de 3 (Commerce)
 * on redirige vers le profil
 */
if (($_SESSION['id_ag4fc_usersGroup'] != 1) && ($_SESSION['id_ag4fc_usersGroup'] != 2) && ($_SESSION['id_ag4fc_usersGroup'] != 3)) {
    header('location: profil.php');
// Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}

//On initialise un tableau d'erreurs vide
$formErrors = array();

// Instanciation de l'objet $donation de la classe donation
$donation = new donation();
// Instanciation de l'objet $donationContent de la classe donationContent
$donationContent = new donationContent();
// Instanciation de l'objet $timeSlot de la classe timeSlot
$timeSlot = new timeSlot();
// On appelle la méthode getTimeSlotList() pour afficher la liste des créneaux horraires
$listTimeSlot = $timeSlot->getTimeSlotList();
// Instanciation de l'objet $association de la classe association
$association = new association();
// On appelle la méthode getAssociationList() pour afficher la liste des associations
$listAssociation = $association->getAssociationList();
// Instanciation de l'objet $delivery de la classe delivery
$delivery = new delivery();
// On appelle la méthode getDeliveryList() pour afficher la liste des options de remise pour un don alimentaire
$listDelivery = $delivery->getDeliveryList();
// Instanciation de l'objet $package de la classe packages
$package = new packages();
// On appelle la méthode getPackagesList() pour afficher la liste des contenant
$listPackage = $package->getPackagesList();
// Instanciation de l'objet $productCategory de la classe productcategory()
$productCategory = new productCategory();
// On appelle la méthode getProductCategoryList() pour afficher la liste des catégories
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
        if (preg_match($regexEts, $_POST['title'])) {
            /**
             * On associe la valeur de l'objet $donation a l'attribut title
             * Ici on utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
             */
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

    $successDoc = false;

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        if ($_FILES['file']['size'] <= 5000000) {
            $infoFIle = pathinfo($_FILES['file']['name']);
            $fileExtend = $infoFIle['extension'];
            $authExtend = ['jpg', 'png', 'jpeg'];
            if (in_array($fileExtend, $authExtend)) {
                $successDoc = true;
            } else {
                $formErrors['file'] = 'Veuillez insérer un fichier jpg, jpeg, png';
            }
        } else {
            $formErrors['file'] = 'Le fichier est trop volumineux';
        }
    } else {
        $formErrors['file'] = 'Une erreur est survenue';
    }

    /*
     * S'il n'y a pas d'erreur on upload la photo dans le dossier /uploads
     * et on appelle la méthode addUsers pour ajouter un utilisateur
     */

    if (count($formErrors) == 0 && $successDoc === true) {
        $donation->photo = 'file' . time();
        //Les fichiers sont enregistrés dans le répertoire uploads
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . basename($donation->photo));
        // On appelle la méthode getInstance de la classe dataBaseSingleton
        $database = Database::getInstance();
        /**
         * On fais appelle a setAttribute qui est une méthode de PDO, pour gérer les erreurs
         * On active les erreurs en mode exception pour que le catch puisse attraper les erreurs
         */
        $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            // On démarre la transaction pour simuler la requête
            $database->db->beginTransaction();
            // On appelle la méthode addDonation de l'objet $donation instance de la classe donation pour enregistrer les valeurs des attributs
            $donation->addDonation();
            // On récupère le dernier id inséré dans la database et on l'enregistre dans l'attribut id_ag4fc_donation de l'objet $donationContent instance de la classe $donationContent
            $donationContent->id_ag4fc_donation = $database->db->lastInsertId();
            // On appelle la méthode addDonationContent de l'objet $donationContent
            $donationContent->addDonationContent();
            // Commit valide la transaction en cours, rendant les modifications permanantes
            $database->db->commit();
            $formSuccess = 'Merci pour votre don !';
        } catch (Exception $e) {
            // Rollback annule la transaction en cours et annule sa modification
            $database->db->rollback();
            die('error : ' . $e->getMessage());
        }
    }
}