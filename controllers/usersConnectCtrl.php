<?php

// J'instancie ma classe users
$user = new users();

$formErrors = array();

if (count($_POST) > 0) {
    /*
     * On vérifie que $_POST['mail'] n'est pas vide
     * S'il est vide => on stocke l'erreur dans le tableau $formErrors
     * S'il n'est pas vide => on stocke dans la variable $user->mail
     */

    if (!empty($_POST['mail'])) {
        /*
         * On vérifie si la saisie utilisateur correspond à la regex
         * Si tout va bien => on stocke dans la variable qui nous servira à afficher
         * Sinon => on stocke l'erreur dans le tableau $formErrors
         */
        if (preg_match($regexMail, $_POST['mail'])) {
            //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
            $user->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Merci de renseigner un mail valide';
        }
    } else {
        $formErrors['mail'] = 'Merci de renseigner votre mail';
    }
    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    } else {
        $formErrors['password'] = 'Veuillez entrer un mot de passe';
    }
}

if (count($_POST) > 0 && count($formErrors) == 0) {
    // J'appelle ma méthode readUserByMail
    // Je stock les informations dans $dataUser
    $dataUser = $user->readUserByMail();
    $password = $dataUser->password;
    //Si les informations on été stocké dans DataUser alors il est égal à true, sinon a False
    if ($dataUser) {
        /**
         * password_verify — Vérifie qu'un mot de passe correspond à un hachage
         */
        if (password_verify($user->password, $dataUser->password)) {
            $_SESSION['id'] = $dataUser->id;
            $_SESSION['mail'] = $dataUser->mail;
        } else {
            $formErrors['password'] = 'Votre mot de passe n\'est pas disponible dans notre base de données';
        }
        // Si false je stocke une erreur, dans $formErrors['mail']
    } else {
        $formErrors['mail'] = 'Votre mail n\'est pas disponible dans notre base de données';
    }
}
?>

