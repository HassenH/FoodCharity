<?php
session_start();
require_once 'regex.php';
require_once 'models/models_donation.php';
require_once 'controllers/profilDonationCtrl.php';
require_once 'navbar.php';
var_dump($_SESSION);
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Comptes utilisateurs</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Prénom</th>
                                        <th class="text-center">Titre</th>
                                        <th class="text-center">Remise</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getProfilDonationCollected as $donation) { ?>
                                        <tr>
                                            <th class="text-center"><?= $donation->id ?></th>
                                            <td class="text-center"><?= $donation->category ?></td>
                                            <td class="text-center"><?= $donation->title ?></td>
                                            <td class="text-center"><?= $donation->deliveryOption ?></td>
                                            <td class="text-center"><?= $donation->status ?></td>
                                            <td class="text-center"><?= $donation->creationDate ?></td>
                                            <?php if ($donation->status == 'Validé') { ?>
                                                <td></td>
                                            <?php } ?>
                                            <td> <a href="donationPage.php?&id=<?= $donation->id ?>" title="Intervenir"><i class="fas fa-pencil-alt d-flex justify-content-center"></i></a></td>
                                        </tr>
                                    <?php } ?>

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