<?php

session_start();
/**
 * On instancie l'objet $user
 */
$user = new users();

$formErrors = array();

if (count($_POST) > 0) {
    /**
     * Si $_POST['email'] existe et n'est pas vide, on protège des injections sql avec htmlspecialchars et on met le résultat dans l'objet $user->mail
     * Sinon on enregistre un message dans le tableau des erreurs
     */
    if (!empty($_POST['mail'])) {

        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
            $user->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Merci de renseigner un mail valide';
        }
    } else {
        $formErrors['mail'] = 'Merci de renseigner votre mail';
    }
    // Comme on enregistre pas de données dans la BDD, il n'est  pas nécessaire d'utiliser le password_hash pour la connexion
    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    } else {
        $formErrors['password'] = 'Veuillez entrer un mot de passe';
    }
}

if (count($_POST) > 0 && count($formErrors) == 0) {
    /*
     * On appelle la méthode readUserByMail, et on stock les informations dans la variable $dataUser
     */
    $dataUser = $user->userConnect();
    if ($dataUser) {
        /**
         * password_verify — Vérifie qu'un mot de passe correspond à un hachage
         */
        if (password_verify($user->password, $dataUser->password)) {
            $_SESSION['id'] = $dataUser->id;
            $_SESSION['mail'] = $dataUser->mail;
            $_SESSION['id_ag4fc_usersGroup'] = $dataUser->idGroup;
            header('location:profil.php');
        } else {
            $formErrors['password'] = 'Votre mot de passe n\'est pas disponible dans notre base de données';
        }
        // Si false je stocke une erreur, dans $formErrors['mail']
    } else {
        $formErrors['mail'] = 'Votre mail n\'est pas disponible dans notre base de données';
    }
}