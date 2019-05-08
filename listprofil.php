<?php
$pages = array();
$pages["profil.php"] = "profil.php";
$pages["dons-realises.php"] = "dons-realises.php";
$pages["frauensauna.php"] = "Frauensauna";
$pages["custom.php"] = "Beauty Lounge";
$pages["feiertage.php"] = "Feiertage";

$activePage1 = "profil.php";
$activePage2 = "dons-realises.php";

 ?>

<div class="col-12 col-sm-12 col-md-3 col-lg-3" id="nav-profile">
  <div class="list-group d-none d-md-block">
    <a href="/profil.php" class="list-group-item list-group-item-action active">Mes informations personnelles</a>
    <a href="/dons-realises.php" class="list-group-item list-group-item-action">Dons réalisés</a>
    <a href="/dons-collectes.php" class="list-group-item list-group-item-action">Dons collectés</a>
    <a href="/statistiques.php" class="list-group-item list-group-item-action">Mes statistiques</a>
    <a href="/suppressionprofil.php" class="list-group-item list-group-item-action">Supprimer votre compte</a>
  </div>
  <ul class="nav nav-pills nav-fill d-flex flex-column d-md-none">
    <li class="nav-item">
      <a <?php if($url === $activePage):?>class="active"<?php endif;?> href="<?php echo $url;?>">
         <?php echo $title;?>
      </a>
    </li>
    <li class="nav-item">
      <a <?php if($url === $activePage1):?>class="active"<?php endif;?> href="<?php echo $url;?>">
         <?php echo $title;?>
      </a>
    </li>
    <li class="nav-item">
      <a href="dons-realises.php" class="nav-link">Dons collectés</a>
    </li>
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
