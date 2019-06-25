<?php ?>

<div class="col-12 col-sm-12 col-md-3 col-lg-3" id="nav-profile">
    <div class="list-group d-none d-md-block">
        <a href="/profil.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profil.php') ? 'active' : '' ?>"><i class="fas fa-info"></i> Mes informations personnelles</a>
        <?php if (($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) { ?>
            <a href="/profilDonationMade.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilDonationMade.php') ? 'active' : '' ?>"><i class="fas fa-hand-holding-heart"></i> Dons réalisés</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
            <a href="/profilDonationCollected.php" class="list-group-item list-group-item-action  <?= ($_SERVER['PHP_SELF'] == '/profilDonationCollected.php') ? 'active' : '' ?>"><i class="fas fa-hand-holding-heart"></i> Dons collectés</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 1) { ?>
            <a href="/profilAccounts.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilAccounts.php') ? 'active' : '' ?>"><i class="fas fa-users"></i> Comptes utilisateurs</a>
            <a href="/profilDonationAdmin.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilDonationAdmin.php') ? 'active' : '' ?>"><i class="fas fa-hand-holding-heart"></i> Dons alimentaires</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 2 || ($_SESSION['id_ag4fc_usersGroup'] == 3) || ($_SESSION['id_ag4fc_usersGroup'] == 4)) { ?>
            <a href="/profilStatistics.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilStatistics.php') ? 'active' : '' ?>"><i class="fas fa-chart-line"></i> Mes statistiques</a>
            <a href="/profilComment.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilComment.php') ? 'active' : '' ?>"><i class="fas fa-comments"></i> Commentaires</a>
            <a href="/profilDelete.php" class="list-group-item list-group-item-action <?= ($_SERVER['PHP_SELF'] == '/profilDelete.php') ? 'active' : '' ?>"><i class="fas fa-user-slash"></i> Supprimer votre compte</a>
        <?php } ?>
        <a href="/profilDeconnexion.php" class="list-group-item list-group-item-action"><i class="fas fa-power-off"></i> Deconnexion</a>
    </div>
</div>
<ul class="nav nav-pills nav-fill d-flex d-md-none mb-2">
    <li class="nav-item">
        <a href="/profil.php" class="text-decoration-none nav-link <?= ($_SERVER['PHP_SELF'] == '/profil.php') ? 'active' : '' ?>">Mes informations personnelles</a>
    </li>
    <?php if (($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) { ?>
        <li class="nav-item">
            <a href="/profilDonationMade.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilDonationMade.php') ? 'active' : '' ?>">Dons réalisés</a>
        </li>
    <?php } ?>
    <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
        <li class="nav-item">
            <a href="/profilDonationCollected.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilDonationCollected.php') ? 'active' : '' ?>">Dons collectés</a>
        </li>
    <?php } ?>
    <?php if ($_SESSION['id_ag4fc_usersGroup'] == 1) { ?>
        <li class="nav-item">
            <a href="/profilAccounts.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilAccounts.php') ? 'active' : '' ?>">Comptes utilisateurs</a>
        </li>
        <li class="nav-item">
            <a href="/profilDonationAdmin.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilDonationAdmin.php') ? 'active' : '' ?>">Dons alimentaires</a>
        </li>
    <?php } ?>
    <?php if ($_SESSION['id_ag4fc_usersGroup'] == 2 || ($_SESSION['id_ag4fc_usersGroup'] == 3) || ($_SESSION['id_ag4fc_usersGroup'] == 4)) { ?>
        <li class="nav-item">
            <a href="/profilStatistics.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilStatistics.php') ? 'active' : '' ?>">Mes statistiques</a>
        </li>
        <li class="nav-item">
            <a href="profilComment.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilComment.php') ? 'active' : '' ?>">Commentaires</a>
        </li>
        <li class="nav-item">
            <a href="profilDelete.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilDelete.php') ? 'active' : '' ?>">Supprimer votre compte</a>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a href="/profilDeconnexion.php" class="nav-link <?= ($_SERVER['PHP_SELF'] == '/profilDeconnexion.php') ? 'active' : '' ?>">Deconnexion</a>
    </li>
</ul>