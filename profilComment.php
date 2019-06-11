<?php
session_start();
require_once 'regex.php';
require_once 'models/models_users.php';
require_once 'models/models_donation.php';
require_once 'models/models_association.php';
require_once 'models/models_timeSlot.php';
require_once 'models/models_delivery.php';
require_once 'models/models_donationContent.php';
require_once 'models/models_packages.php';
require_once 'models/models_comment.php';
require_once 'models/models_productCategory.php';
require_once 'controllers/donationPageCtrl.php';
require_once 'navbar.php';
var_dump($getComments);
var_dump($_SESSION);
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Mes commentaires</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body">
                            <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($getComments as $comment) { ?>
                                <div class="card my-2">
                                    <div class="card-header">
                                        <h2 class="text-white"><?= $comment->title ?></h2>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>Don N° : <?= $comment->idDonation ?></p>
                                            <p>Note :<?= $comment->score ?></p>
                                            <p><?= $comment->opinion ?></p>
                                            <p><a class="dropdown-item" href="" title="Valider le don" data-target="#deleteCommentModal" data-toggle="modal" data-id="<?= $comment->id ?>" ><i class="fas fa-trash text-primary"></i></span></a></p>
                                            <footer class="blockquote-footer"><?= $comment->creationDate ?></footer>
                                        </blockquote>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>