<?php
session_start();
require_once 'regex.php';
require_once 'models/models_donation.php';
require_once 'controllers/profilStatisticCtrl.php';
require_once 'navbar.php';
var_dump($statisticInfo);
?>
<div class="container">
    <div class="row my-5">
        <?php require_once('profilList.php'); ?>
        <div class="col-12 col-md-9">
            <div class="card border-0">
                <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
                    <h1 class="card-title mb-3">Mes Statistiques</h1>
                </div>
                <div class="card-body p-0">
                    <div class="row align-items-center">
                        <div class="col-sm-6 text-center">
                            <img src="/uploads/<?= $statisticInfo->photo ?>" class="img-fluid rounded-circle imgProfil mt-2" alt="">
                            <h2 class="mt-2s"><?= $statisticInfo->lastname . ' ' . $statisticInfo->firstname ?></h2>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled ml-3">
                                <li class="my-2">Inscrit le <?= $statisticInfo->registrationDate ?></li>
                                <li class="my-2">
                                    <div class="form-inline">
                                        <span class="mr-2">Dons réalisés : <?= $statisticInfo->numberDonation ?></span>
                                    </div>
                                </li>
                                <li class="my-2">
                                    <div class="form-inline">
                                        <span class="mr-2">Dons collectés : Aucun</span>
                                    </div>
                                </li>
                                <?php if (($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) { ?>
                                    <li class="my-2">
                                        <div class="form-inline">
                                            <span class="mr-2">
                                                <?php if ($statisticInfo->numberDonation == 0 || $statisticInfo->numberDonation <= 10) { ?><span class="badge badge-warning"> Bon donateur </span><?php } ?>
                                                <?php if ($statisticInfo->numberDonation > 10 && $statisticInfo->numberDonation <= 30) { ?><span class="badge badge-primary"> Top donateur </span><?php } ?>
                                                <?php if ($statisticInfo->numberDonation > 20) { ?><span class="badge badge-success"> Super donateur </span><?php } ?>
                                            </span>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>