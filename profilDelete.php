<?php
require_once 'models/models_users.php';
require_once 'controllers/usersDeleteCtrl.php';
require_once 'navbar.php';
var_dump($_POST);
?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h2 class="ml-4 mb-0 card-title d-inline-block">Voulez-vous vraiment supprimer votre compte ?</h2>
                                <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                                    <form action="" method="POST">
                                        <div class="form-group row my-4">
                                            <div class="col-6">
                                                <?php
                                                /*
                                                 * Pour garder la saisie utilisateur, on ajoute l'attribut checked s'il a coché l'input
                                                 */
                                                ?>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="removeYes" name="remove" value="oui" <?= isset($_POST['remove']) && $_POST['remove'] == 'oui' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['remove']) ? 'is-invalid' : (isset($remove) ? 'is-valid' : '') ?>">
                                                    <label class="custom-control-label" for="removeYes">Oui</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="removeNo" name="remove" value="non" <?= isset($_POST['remove']) && $_POST['remove'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['remove']) ? 'is-invalid' : (isset($remove) ? 'is-valid' : '') ?>">
                                                    <label class="custom-control-label" for="removeNo">Non</label>
                                                </div>
                                            </div>
                                            <?php if (isset($formErrors['remove'])) { ?>
                                                <div class="invalid-feedback d-block"><?= $formErrors['remove'] ?></div>
                                            <?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-4">
                        <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs btn-submit" type="submit" value="Transmettre ma demande" />
                    </div>
                <?php } ?>
                </form>
                <?php if (isset($message)) { ?>
                    <p><?= $message ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once'footer.php';
?>
