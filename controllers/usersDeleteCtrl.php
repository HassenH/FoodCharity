<?php

session_start();
$users = new users();
$formErrors = array();
var_dump($_SESSION);
/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */

if (count($_POST) > 0) {
    /*
     * On vérifie que $_POST['title'] n'est pas vide
     * S'il est vide => on stocke l'erreur dans le tableau $formErrors
     * S'il n'est pas vide => on stocke dans la variable $title qui nous servira à afficher
     */
    if (!empty($_POST['remove'])) {
        if ($_POST['remove'] === 'oui' || $_POST['remove'] === 'non') {
            $remove = $_POST['remove'];
        } else {
            $formErrors['remove'] = 'Merci de sélectionner une réponse';
        }
    } else {
        $formErrors['remove'] = 'Merci de répondre à cette question';
    }
    /*
     * Suppression des données de l'utilisateur
     */
    if ($remove == 'oui') {
        $users->removeUser();
        session_destroy();
        $message = 'Votre compte a bien été supprimé';
    }
}
var_dump($_POST);
?>
