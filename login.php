<?php
require_once 'navbar.php';
require_once 'regex.php';
require_once 'models/models_users.php';
require_once 'controllers/usersConnectCtrl.php';
?>

<div class="container">
  <div class="row my-5">
    <div class="col-12 col-sm-12 offset-md-2 col-md-9 col-lg-9">
      <div class="card border-0">
        <div class="card-header text-white text-center p-0 border-bottom-0 ">
          <h1 class="card-title mb-3">Se connecter</h1>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
              <form action="login.php" method="POST">
                <div class="form-group">
                  <label for="mail">Votre email*</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>"  class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="Jean" />
                    <?php if (isset($formErrors['mail'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                    <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe*</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" required name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"  class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="Jean" />
                    <?php if (isset($formErrors['password'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                    <?php } ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-6 offset-3">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Se connecter</button>
                  </div>
                </div>
                <p class="hint-text"><a href="#">Mot de passe oublié ?</a></p>
              </form>
            </div>
            <div class="modal-footer">Vous n'avez pas de compte ?  <a href="#"> Creér le votre</a></div>
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</div>
</div>
<?php
require_once 'footer.php';
?>
