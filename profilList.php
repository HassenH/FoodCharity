<?php ?>

<div class="col-12 col-sm-12 col-md-3 col-lg-3" id="nav-profile">
    <div class="list-group d-none d-md-block">
        <a href="/profil.php" class="list-group-item list-group-item-action active">Mes informations personnelles</a>
        <?php if (($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) { ?>
            <a href="/profilDonationMade.php" class="list-group-item list-group-item-action">Dons réalisés</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
            <a href="/profilDonationCollected.php" class="list-group-item list-group-item-action">Dons reçus</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 1) { ?>
            <a href="/profilAccounts.php" class="list-group-item list-group-item-action">Comptes utilisateurs</a>
            <a href="/profilDonationMade.php" class="list-group-item list-group-item-action">Dons alimentaires</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 2 || ($_SESSION['id_ag4fc_usersGroup'] == 3) || ($_SESSION['id_ag4fc_usersGroup'] == 4)) { ?>
            <a href="/profilStatistics.php" class="list-group-item list-group-item-action">Mes statistiques</a>
            <a href="/profilComment.php" class="list-group-item list-group-item-action">Commentaires</a>
            <a href="/profilDelete.php" class="list-group-item list-group-item-action">Supprimer votre compte</a>
        <?php } ?>
        <a href="/profilDeconnexion.php" class="list-group-item list-group-item-action">Deconnexion</a>
    </div>
</div>
