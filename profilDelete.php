<?php
require_once 'regex.php';
require_once 'models/models_users.php';
require_once 'controllers/usersDeleteCtrl.php';
require_once 'navbar.php';
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-md-9">
            <div class="card border-0">
                <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
                    <h1 class="card-title mb-3">Demande de suppresion de compte</h1>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12 card border-0 bg-transparent">
                            <div class="card-header text-center border-bottom-0 bg-light">
                                <h2 class="ml-4 mb-0 card-title d-inline-block">Voulez-vous vraiment supprimer votre compte <?= $getUser->lastname . ' ' . $getUser->firstname ?> ?</h2>
                                <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-4">
                    <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs btn-submit" type="submit" value="Valider" data-target="#deleteUser" data-toggle="modal" data-id="<?= $getUser->id ?>" data-number="" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once'footer.php';
?>
