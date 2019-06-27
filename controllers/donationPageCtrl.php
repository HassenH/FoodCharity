<?php

// Instanciation de l'objet $donation de la classe donation
$donation = new donation();

// Instanciation de l'objet $comment de la classe comment
$comment = new comment();


//On initialise un tableau d'erreurs vide pour les erreurs
$formErrors = array();

// Récupération de la valeur de l'id dans le paramètre de l'url
if (isset($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        /**
         * On récupère l'id dans l'attribut id de l'objet $donation
         */
        $donation->id = strip_tags($_GET['id']);
        $getDonationPage = $donation->getDonationPage();
        $getDonationAdressPage = $donation->getDonationAdressPage();
        $getComment = $comment->getComment();
        $resultCount = $comment->checkIfCommentExist();


        if (count($_POST) > 0) {

            if (!empty($_POST['score'])) {
                if ($_POST['score'] === '1' || $_POST['score'] === '2' || $_POST['score'] === '3' || $_POST['score'] === '4' || $_POST['score'] === '5') {
                    $comment->score = $_POST['score'];
                } else {
                    $formErrors['score'] = 'Votre note est incorrecte';
                }
            } else {
                $formErrors['score'] = 'Merci de renseigner une note';
            }

            if (!empty($_POST['comment'])) {
                $comment->opinion = strip_tags($_POST['comment']);
            } else {
                $formErrors['comment'] = 'Merci de répondre à cette question';
            }

            /**
             * Je vérifie si un commentaire pour le don existe déja dans la base de données
             * On stocke le résultat de la méthode checkUserExist qui permet de vérifier
             * si l'adresse mail (login) de l'utilisateur a déjà été enregistré dans la base de donnée
             */
            if ($resultCount > 0) {
                $formErrors['message'] = 'Un commentaire existe déjà pour ce don';
            }

            if (count($formErrors) == 0) {
                if ($comment->addComment()) {
                    $formSuccess = 'Merci pour votre commentaire';
                }
            }
        }
    }
}

// Récupération de la valeur de l'id dans le paramètre de l'url
if (isset($_GET['deleteId'])) {
    if (preg_match($regexId, $_GET['deleteId'])) {
        $donation->id = strip_tags($_GET['deleteId']);
        $donation->removeDonation();
        header('location:profil.php');
    }
}

if (isset($_GET['validStatusId'])) {
    if (preg_match($regexId, $_GET['validStatusId'])) {
        $donation->id = strip_tags($_GET['validStatusId']);
        $donation->validDonationStatus();
        header('location:profilDonationCollected.php');
    }
}

if (isset($_GET['cancelStatusId'])) {
    if (preg_match($regexId, $_GET['cancelStatusId'])) {
        $donation->id = strip_tags($_GET['cancelStatusId']);
        $donation->cancelDonationStatus();
        header('location:profilDonationCollected.php');
    }
}

if (isset($_GET['deleteCommentId'])) {
    if (preg_match($regexId, $_GET['deleteCommentId'])) {
        $comment->id = strip_tags($_GET['deleteCommentId']);
        $comment->removeComment();
        header('location:profil.php');
    }
}
