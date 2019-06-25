<?php

/*
 * Si id_ag4fc_usersGroup(id de la table usersGroup) est différent de 1 (Administrateur)
 * on redirige vers la page index
 */
if (($_SESSION['id_ag4fc_usersGroup'] != 1)) {
    header('location: index.php');
// Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}

// Instanciation de l'objet $users de la classe users
$users = new users();
// Appel de la méthode getAdminListUser() et stockage du résultat dans la variable $listAdminUsers pour afficher la liste des users
$listAdminUsers = $users->getAdminListUser();

// Instanciation de l'objet $donation de la classe donation
$donation = new donation();
// Appel de la méthode getProfilDonationAdmin() et stockage du résultat dans la variable $listAdminUsers pour afficher la liste des users
$listAdminDonation = $donation->getProfilDonationAdmin();

// Supprimer un utilisateur
if (isset($_GET['deleteUserId'])) {
    if (preg_match($regexId, $_GET['deleteUserId'])) {
        $users->id = strip_tags($_GET['deleteUserId']);
        // Appel de la méthode removeUserAdmin() pour supprimer un utilisateur
        $users->removeUserAdmin();
        // Redirection vers la page profilAccounts
        header('location:profilAccounts.php');
    }
}

// Supprimer une donation
if (isset($_GET['deleteDonationId'])) {
    if (preg_match($regexId, $_GET['deleteDonationId'])) {
        $donation->id = strip_tags($_GET['deleteDonationId']);
        // Appel de la méthode removeDonation() pour supprimer un une donation
        $donation->removeDonation();
        // Redirection vers la page profilDonationAdmin
        header('location:profilDonationAdmin.php');
    }
}