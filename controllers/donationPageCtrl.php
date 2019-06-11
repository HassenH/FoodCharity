<?php

$users = new users();
// Instanciation de la class
$donation = new donation();
$donationContent = new donationContent();

$timeSlot = new timeSlot();
$listTimeSlot = $timeSlot->getTimeSlotList();

$association = new association();
$listAssociation = $association->getAssociationList();

$delivery = new delivery();
$listDelivery = $delivery->getDeliveryList();

$package = new packages();
$listPackage = $package->getPackagesList();
//On initialise un tableau d'erreurs vide

$productCategory = new productCategory();
$listProductCategory = $productCategory->getProductCategoryList();

$countDonation = $donation->getStatisticDonation();

$comment = new comment();
$getComments = $comment->getComments();

$formErrors = array();

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

if (isset($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $donation->id = strip_tags($_GET['id']);
        $getDonationPage = $donation->getDonationPage();
        $getDonationAdressPage = $donation->getDonationAdressPage();


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

            if (count($formErrors) == 0) {
                if ($comment->addComment()) {
                    $formSuccess = 'Merci pour votre commentaire';
                }
            }
        }
    }
}
