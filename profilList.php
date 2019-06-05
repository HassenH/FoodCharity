<?php ?>

<div class="col-12 col-sm-12 col-md-3 col-lg-3" id="nav-profile">
    <div class="list-group d-none d-md-block">
        <a href="/profil.php" class="list-group-item list-group-item-action active">Mes informations personnelles</a>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 2 && 3) { ?>
            <a href="/profilMakeDonation.php" class="list-group-item list-group-item-action">Dons réalisés</a>
        <?php } ?>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
            <a href="/profilCollectedDonation.php" class="list-group-item list-group-item-action">Dons collectés</a>
        <?php } ?>
        <a href="/profilStatistics.php" class="list-group-item list-group-item-action">Mes statistiques</a>
        <a href="/profilDelete.php" class="list-group-item list-group-item-action">Supprimer votre compte</a>
        <a href="/profilDeconnexion.php" class="list-group-item list-group-item-action">Deconnexion</a>

    </div>
    <ul class="nav nav-pills nav-fill d-flex flex-column d-md-none">
        <li class="nav-item">
            <a <?php if ($url === $activePage): ?>class="active"<?php endif; ?> href="<?php echo $url; ?>">
                <?php echo $title; ?>
            </a>
        </li>
        <li class="nav-item">
            <a <?php if ($url === $activePage1): ?>class="active"<?php endif; ?> href="<?php echo $url; ?>">
                <?php echo $title; ?>
            </a>
        </li>
        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
            <li class="nav-item">
                <a href="dons-realises.php" class="nav-link">Dons collectés</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a href="dons-collectes.php" class="nav-link">Mes statistiques</a>
        </li>
        <li class="nav-item">
            <a href="/profil/devenir-benevole" class="nav-link">Devenir bénévole</a>
        </li>
        <li class="nav-item">
            <a href="/suppressionprofil.php" class="nav-link">Supprimer votre compte</a>
        </li>
    </ul>
</div>
