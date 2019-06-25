<?php
session_start();
require_once 'regex.php';
require_once 'models/models_users.php';
require_once 'models/models_donation.php';
require_once 'models/models_comment.php';
require_once 'controllers/profilCommentCtrl.php';
require_once 'navbar.php';
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Modifier votre commentaire</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center">Commentaire N° <?= $getComment->id ?></h2>
                                    <hr>
                                    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="score">Veuillez noter le don sur 5 :</label>
                                                <select class="form-control <?= isset($formErrors['score']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="score" name="score">
                                                    <option value="1" <?= isset($_POST['score']) && $_POST['score'] || ($getComment->score) == '1' ? 'selected' : '' ?>>1</option>
                                                    <option value="2" <?= isset($_POST['score']) && $_POST['score'] || ($getComment->score) == '2' ? 'selected' : '' ?>>2</option>
                                                    <option value="3" <?= isset($_POST['score']) && $_POST['score'] || ($getComment->score) == '3' ? 'selected' : '' ?>>3</option>
                                                    <option value="4" <?= isset($_POST['score']) && $_POST['score'] || ($getComment->score) == '4' ? 'selected' : '' ?>>4</option>
                                                    <option value="5" <?= isset($_POST['score']) && $_POST['score'] || ($getComment->score) == '5' ? 'selected' : '' ?>>5</option>
                                                </select>
                                                <?php if (isset($formErrors['score'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['score'] ?></div>
                                                <?php } ?>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="comment">Commentaire : </label>
                                            <textarea required name="comment"  class="form-control <?= isset($formErrors['comment']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="comment" rows="5" placeholder="Votre commentaire ..."><?= isset($_POST['comment']) ? $_POST['comment'] : $getComment->opinion ?></textarea>
                                            <?php if (isset($formErrors['comment'])) { ?>
                                                <div class="invalid-feedback"><?= $formErrors['comment'] ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-outline-dark btn-md">Envoyer</button>
                                    </div>
                                <?php } ?>
                                </form>
                            </div>
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