<?php
session_start();
require_once 'regex.php';
require_once 'models/models_donation.php';
require_once 'models/models_users.php';
require_once 'models/models_productCategory.php';
require_once 'models/models_timeSlot.php';
require_once 'models/models_delivery.php';
require_once 'controllers/adminCtrl.php';
require_once 'navbar.php';
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
                            <!-- MODAL POUR SUPPRIMER UN UTILISATEUR -->
                            <div class="modal fade" id="deleteUserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title d-flex" id="exampleModalLabel">Supprimer un utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Prénom</th>
                                        <th class="text-center">Mail</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listAdminUsers as $user) { ?>
                                        <tr>
                                            <td class="text-center font-weight-bold"><?= $user->id ?></td>
                                            <?php if ($user->id_ag4fc_usersGroup == 1) { ?>
                                                <td class="text-center">Administrateur</td>
                                            <?php } ?>
                                            <?php if ($user->id_ag4fc_usersGroup == 2) { ?>
                                                <td class="text-center">Particulier</td>
                                            <?php } ?>
                                            <?php if ($user->id_ag4fc_usersGroup == 3) { ?>
                                                <td class="text-center">Commerce</td>
                                            <?php } ?>
                                            <?php if ($user->id_ag4fc_usersGroup == 4) { ?>
                                                <td class="text-center">Association</td>
                                            <?php } ?>
                                            <td class="text-center"><?= $user->lastname ?></td>
                                            <td class="text-center"><?= $user->firstname ?></td>
                                            <td class="text-center"><?= $user->mail ?></td>
                                            <?php if ($user->id_ag4fc_usersGroup == 2 || ($user->id_ag4fc_usersGroup == 3) || ($user->id_ag4fc_usersGroup == 4)) { ?>
                                                <td class="text-center"><a href="" title="Supprimer utilisateur" data-target="#deleteUserAdmin" data-toggle="modal" data-id="<?= $user->id ?>" data-lastname="<?= $user->lastname ?>" data-firstname="<?= $user->firstname ?>"><i class="fas fa-trash"></i></a></td>
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