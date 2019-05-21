<?php
require_once'navbar.php';
require_once 'models/models_users.php';
require_once 'controllers/usersDeleteCtrl.php';
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 card border-0 bg-transparent">
                            <div class="card-header text-center border-bottom-0 bg-light">
                                <h3 class="ml-4 mb-0 card-title d-inline-block">Sélectionnez la raison de votre demande :</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row card-body pt-4">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group mb-0">
                                <!-- Button trigger modal -->
                                <button type="button" class="form-control mb-3 red border-danger font-weight-bold text-white" data-toggle="modal" data-target="#basicExampleModal">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row form-group mb-5 justify-content-end">
        <div class="col-12 mt-3">
            <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs btn-submit" type="submit" value="Transmettre ma demande" />
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <a href="profilDelete.php?id"><input type="button" name="delete" id="delete" class="btn red" data-dismiss="modal" value="" />Delete</a>
                <a href="profile.Delete.php"><input type="button" class="btn teal lighten-1" value="" />Cancel</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once'footer.php';
?>
