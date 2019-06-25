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
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Titre</th>
                                        <th class="text-center">Commentaire</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Date de création</th>
                                        <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
                                            <th class="text-center">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getComments as $comment) { ?>
                                        <tr>
                                            <th class="text-center"><?= $comment->idDonation ?></th>
                                            <td class="text-center"><?= $comment->title ?></td>
                                            <td class="text-center font-weight-bold"><?= $comment->opinion ?></td>
                                            <?php if ($comment->score == 1) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i> </td>
                                            <?php } ?>
                                            <?php if ($comment->score == 2) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i> </td>
                                            <?php } ?>
                                            <?php if ($comment->score == 3) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <?php if ($comment->score == 4) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <?php if ($comment->score == 5) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <td class="text-center"><?= $comment->creationDate ?></td>
                                            <td class="text-center"><a href="profilCommentModify.php?id=<?= $comment->idDonation ?>" title="Modifier un commentaire"><i class="fas fa-eye"></i></a> <a href="" title="Supprimer un commentaire" data-target="#deleteCommentModal" data-toggle="modal" data-id="<?= $comment->id ?>" data-lastname="" data-firstname=""><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tbody>
                                    <?php foreach ($getCommentsUser as $comment) { ?>
                                        <tr>
                                            <th class="text-center"><?= $comment->idDonation ?></th>
                                            <td class="text-center"><?= $comment->title ?></td>
                                            <td class="text-center font-weight-bold"><?= $comment->opinion ?></td>
                                            <?php if ($comment->score == 1) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i> </td>
                                            <?php } ?>
                                            <?php if ($comment->score == 2) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i> </td>
                                            <?php } ?>
                                            <?php if ($comment->score == 3) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <?php if ($comment->score == 4) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <?php if ($comment->score == 5) { ?>
                                                <td class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></td>
                                            <?php } ?>
                                            <td class="text-center"><?= $comment->creationDate ?></td>
                                            <?php if ($_SESSION['id_ag4fc_usersGroup'] == 4) { ?>
                                                <td class="text-center"><a href="profilCommentModify.php?id=<?= $comment->idDonation ?>" title="Modifier un commentaire"><i class="fas fa-eye"></i></a> <a href="" title="Supprimer un commentaire" data-target="#deleteCommentModal" data-toggle="modal" data-id="<?= $comment->id ?>" data-lastname="" data-firstname=""><i class="fas fa-trash"></i></a></td>
                                                    <?php } ?>
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
require_once 'footer.php';
?>