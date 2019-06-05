<?php
session_start();
require_once 'regex.php';
require_once 'models/models_donation.php';
require_once 'controllers/donationMadeCtrl.php';
require_once 'navbar.php';
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Mes dons réalisés</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body">
                            <a class="cursor-pointer" href="donation.php" title="Faire un don"><i class="fas fa-plus m-3"></i>Faire un don</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" data-width="5%" class="text-center">N°</th>
                                        <th scope="col-1" data-width="30%" class="text-center">Catégorie(s)</th>
                                        <th scope="col-6" class="text-center">Titre</th>
                                        <th scope="col" class="text-center">Remise</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center">Note</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($getDonation as $donation) { ?>
                                            <th class="text-center"><?= $donation->id ?></th>
                                            <td class="text-center"><?= $donation->category ?></td>
                                            <td class="text-center"><?= $donation->title ?></td>
                                            <td class="text-center"><?= $donation->deliveryOption ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><?= $donation->creationDate ?></td>
                                            <td></td>
                                            <td> <a href="/donationPage.php" title="Intervenir"><i class="fas fa-pencil-alt d-flex justify-content-center"></i></a></td>
                                                <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
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
