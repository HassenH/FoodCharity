<?php

/*
 * Si id_ag4fc_usersGroup(id de la table usersGroup) est différent de 2 (Particulier) ou  différent de 3 (Commerce)
 * on redirige vers le profil
 */
if (($_SESSION['id_ag4fc_usersGroup'] != 1) && ($_SESSION['id_ag4fc_usersGroup'] != 2) && ($_SESSION['id_ag4fc_usersGroup'] != 3)) {
    header('location: profil.php');
// Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}

// Instance de la classe users
$users = new users();
// Instance de la classe donation
$donation = new donation();
// Instance de la classe patient
$donationContent = new donationContent();
// Instance de la classe timeSlot
$timeSlot = new timeSlot();
// Instance de la classe delivery
$delivery = new delivery();
// Instance de la classe packages
$package = new packages();
// Instance de la classe productCategory
$productCategory = new productCategory();

//On initialise un tableau d'erreurs vide
$formErrors = array();

//On vérifie que l'id est présent en paramètre d'url
if (isset($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $donation->id = strip_tags($_GET['id']);
        // On appelle la méthode getDonationModify pour afficher les données d'un don alimentaire
        $getDonationModify = $donation->getDonationModify();
        $listTimeSlot = $timeSlot->getTimeSlotList();
        $listDelivery = $delivery->getDeliveryList();
        $listPackage = $package->getPackagesList();
        $listProductCategory = $productCategory->getProductCategoryList();

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
                    // On utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
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
                     * Je vérifie si l'utilisateur existe dans la base de données
                     * On stocke le résultat de la méthode checkIfUserExist qui permet de vérifier
                     * si l'adresse mail (login) de l'utilisateur a déjà été enregistré dans la base de donnée
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
                    //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
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
                if (($_SESSION['id_ag4fc_usersGroup'] == 1) || ($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) {
                    // On appelle la méthode getInstance, qui se trouve dans la classe database
                    // Puisque cette methode est static il n'est pas nécessaire de l'instancier un nouvel objet par rapport a la classe database
                    // getInstance() me retourne l'objet instancié de la classe Database
                    $database = Database::getInstance();
                    // On fais appelle a setAttribute qui est une méthode de PDO, pour gérer les erreurs
                    $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $database->db->beginTransaction();
                        $donation->updateDonation();
                        $donationContent->id_ag4fc_donation = $database->db->lastInsertId();
                        $updateDonation = $donationContent->updateDonationContent();
                        $formSuccess = 'Votre don a été modifié.';
                        $database->db->commit();
                    } catch (\Exception $e) {
                        $database->db->rollback();
                        die('error : ' . $e->getMessage());
                    }
                }
            }
        }
    }
}