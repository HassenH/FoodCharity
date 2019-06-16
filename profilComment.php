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
require_once 'controllers/profilCommentCtrl.php';
require_once 'navbar.php';
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
                            <div class="modal fade" id="modifyCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="score">Veuillez noter le don sur 5 :</label>
                                                        <select class="form-control <?= isset($formErrors['score']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="score" name="score">
                                                            <option value="1" <?= isset($_POST['score']) && $_POST['score'] == '1' ? 'selected' : '' ?>>1</option>
                                                            <option value="2" <?= isset($_POST['score']) && $_POST['score'] == '2' ? 'selected' : '' ?>>2</option>
                                                            <option value="3" <?= isset($_POST['score']) && $_POST['score'] == '3' ? 'selected' : '' ?>>3</option>
                                                            <option value="4" <?= isset($_POST['score']) && $_POST['score'] == '4' ? 'selected' : '' ?>>4</option>
                                                            <option value="5" <?= isset($_POST['score']) && $_POST['score'] == '5' ? 'selected' : '' ?>>5</option>
                                                        </select>
                                                        <?php if (isset($formErrors['score'])) { ?>
                                                            <div class="invalid-feedback"><?= $formErrors['score'] ?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="comment">Commentaire : </label>
                                                            <textarea required name="comment"  class="form-control <?= isset($formErrors['comment']) ? 'is-invalid' : (isset($comment) ? 'is-valid' : '') ?>" id="comment" rows="5" placeholder=""><?= isset($_POST['comment']) ? $_POST['comment'] : $getComment->opinion ?></textarea>
                                                            <?php if (isset($formErrors['comment'])) { ?>
                                                                <div class="invalid-feedback"><?= $formErrors['comment'] ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($getComments as $comment) { ?>
                                <div class="card my-2">
                                    <div class="card-header">
                                        <p class="text-white no-border"><?= $comment->title ?></p>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>Don N° : <?= $comment->idDonation ?></p>
                                            <p>Note :<?= $comment->score ?></p>
                                            <p><?= $comment->opinion ?></p>
                                            <p><a class="dropdown-item" href="" title="Supprimer le don" data-target="#deleteCommentModal" data-toggle="modal" data-id="<?= $comment->id ?>" ><i class="fas fa-trash text-primary"></i></span></a></p>
                                            <p><a class="dropdown-item" href="profilComment.php?modifyCommentId='<?= $comment->id ?>" title="Modifier le commentaire" data-target="#modifyCommentModal" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a</p>
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