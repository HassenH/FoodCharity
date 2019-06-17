<?php
require_once 'models/models_users.php';
require_once 'models/models_association.php';
require_once 'models/models_commerce.php';
require_once 'controllers/profilCtrl.php';
require_once 'navbar.php';
?>
<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <?php if ($_SESSION['id_ag4fc_usersGroup'] == 1) { ?>
                        <h1 class="card-title mb-3">Tableau de bord</h1>
                    <?php } else { ?>
                        <h1 class="card-title mb-3">Mon compte</h1>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body text-center">
                            <img src="/uploads/<?= $listUser->photo ?>" class="img-fluid rounded-circle imgProfil mt-2" alt="">
                            <h2 class="card-title"><?= $listUser->lastname . ' ' . $listUser->firstname ?></h2>
                            <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
                                <p class = "card-text"><span class = "font-weight-bold">Nom de votre association : </span><span class="text-uppercase"><?= $listAssociation->name ?></span></p>
                            <?php } ?>
                            <?php if ($_SESSION['id_ag4fc_usersGroup'] == 3) { ?>
                                <p class = "card-text"><span class = "font-weight-bold">Nom de votre commerce : </span><span class="text-uppercase"><?= $listCommerce->name ?></span></p>
                                <p class = "card-text"><span class = "font-weight-bold">Numéro SIRET : </span> <?= $listCommerce->siretNumber ?></p>
                            <?php } ?>
                            <p class="card-text"><span class="font-weight-bold">Email : </span> <?= $listUser->mail ?></p>
                            <p class="card-text"><span class="font-weight-bold">Téléphone mobile : </span> <?= $listUser->phoneNumber ?></p>
                            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Voir plus d'informations</a>
                            <div class="collapse" id="collapseExample">
                                <p class="card-text"><span class="font-weight-bold"> Adresse : </span><?= $listUser->address ?></p>
                                <p class="card-text"><span class="font-weight-bold"> Ville : </span><?= $listUser->city ?></p>
                                <p class="card-text"><span class="font-weight-bold"> Code postal : </span><?= $listUser->postalCode ?></p>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-12">
                                <a class="btn btn-md btn-block btn-profil text-white my-3" href="/profilModify.php" title="Modification du compte"><i class="fas fa-pencil-alt"></i> Modifier vos informations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php'
?>
