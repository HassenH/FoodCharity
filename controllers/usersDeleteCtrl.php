<?php

$formErrors = array();

// Suppression des données de l'utilisateur

if (isset($_GET['id'])) {
    $deleteUser = new users();
    $deleteUser->id = $_SESSION['id'];
    if ($deleteUser->removeUser()) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        $message = 'Votre compte a bien été supprimé';
        exit;
    } else {
        $formErrors = 'erreur';
    }
}
var_dump($_POST);
var_dump($deleteUser);
?>
