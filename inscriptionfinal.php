<?php
include 'navbar.php';

require_once 'models/users.php';
require_once 'controllers/usersCtrl.php';

var_dump($_POST);
var_dump($user);

?>
<div class="container">
  <div class="row my-5">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="border-0">
        <div class="card-header text-white text-center p-0 ">
          <h1 class="card-title mb-3">Inscription</h1>
        </div>
        <div class="card-body p0">
          <div class="row">
            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
              <form action="" method="POST">
                <div class="col-12 card border-0 bg-transparent">
                  <div class="card-header text-center border-bottom-0 bg-light">
                    <h2 class="ml-4 mb-0 card-title d-inline-block">Veuillez renseignez vos informations</h2>
                  </div>
                  <div class="row card-body pt-4">
                    <div class="col-12 col-sm-6">
                      <div class="form-group row">
                        <div class="col-12">
                          <label for="title mr-2">Civilité*</label>
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <select class="form-control <?= isset($formErrors['civility']) ? 'is-invalid' : (isset($civility) ? 'is-valid' : '') ?>" id="civility" name="civility">
                    <option selected disabled>---Choix---</option>
                    <option value="Madame" <?= isset($_POST['civility']) && $_POST['civility'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
                    <option value="Monsieur" <?= isset($_POST['civility']) && $_POST['civility'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
                  </select>
                  <?php if (isset($formErrors['civility'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['civility'] ?></div>
                  <?php } ?>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastName">Nom de famille*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <?php
                          /*
                          * On garde dans la value, $_POST['lastName'] qui est la saisie de l'utilisateur
                          * Permet d'éviter à l'utilisateur de resaisir ses informations
                          *
                          * On ajoute la classe is-invalid si $formErrors['lastName'] existe car cette variable n'existe qu'en cas d'erreur
                          * On ajoute la classe is-valid si $lastName existe car cette variable n'existe qu'en cas de saisie valide
                          *
                          * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                          */
                          ?>
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" required name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" class="form-control <?= isset($formErrors['lastName']) ? 'is-invalid' : (isset($lastName) ? 'is-valid' : '') ?>" id="lastName" placeholder="Dupont" />
                          <?php if (isset($formErrors['lastName'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['lastName'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="firstName">Prénom*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" required name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>"  class="form-control <?= isset($formErrors['firstName']) ? 'is-invalid' : (isset($firstName) ? 'is-valid' : '') ?>" id="firstName" placeholder="Jean" />
                          <?php if (isset($formErrors['firstName'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['firstName'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="birthDate">Date de naissance*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-table"></i></span>
                          <input type="date" required name="birthDate" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" class="form-control <?= isset($formErrors['birthDate']) ? 'is-invalid' : (isset($birthDate) ? 'is-valid' : '') ?>" id="birthDate" />
                          <?php if (isset($formErrors['birthDate'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['birthDate'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="enterprise">Nom du commerce</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                          <input type="text" name="enterprise" value="<?= isset($_POST['enterprise']) ? $_POST['enterprise'] : '' ?>" class="form-control <?= isset($formErrors['enterprise']) ? 'is-invalid' : (isset($enterprise) ? 'is-valid' : '') ?>" id="enterprise" placeholder="" />
                          <?php if (isset($formErrors['enterprise'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['enterprise'] ?></div>
                          <?php } ?>
                        </div>
                        <small><i class="fa fa-info-circle" aria-hidden="true"></i>
                          <em>Si vous avez un commerce, veuillez l'indiquer ci-dessus</em>
                        </small>
                      </div>
                      <div class="form-group">
                        <label for="address">Adresse*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                          <input type="text" required name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" id="address" placeholder="28 rue Alfred de Musset" />
                          <?php if (isset($formErrors['address'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['address'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="country">Pays*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-globe"></i></i></span>
                          <input type="text" required name="country" value="<?= isset($_POST['country']) ? $_POST['country'] : '' ?>"  class="form-control <?= isset($formErrors['country']) ? 'is-invalid' : (isset($country) ? 'is-valid' : '') ?>" id="country" placeholder="France" />
                          <?php if (isset($formErrors['country'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['country'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="region">Région*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                          <input type="text" required name="region" value="<?= isset($_POST['region']) ? $_POST['region'] : '' ?>" class="form-control <?= isset($formErrors['region']) ? 'is-invalid' : (isset($region) ? 'is-valid' : '') ?>" id="region" placeholder="Picardie" />
                          <?php if (isset($formErrors['region'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['region'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group text-left">
                        <label for="city">Ville*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                          <input type="text" required name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>"  class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (isset($city) ? 'is-valid' : '') ?>" id="city" placeholder="Creil" />
                          <?php if (isset($formErrors['city'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['city'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label for="postalCode">Code Postal*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-home"></i></span>
                          <input type="text" required name="postalCode" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" class="form-control <?= isset($formErrors['postalCode']) ? 'is-invalid' : (isset($postalCode) ? 'is-valid' : '') ?>" id="postalCode" placeholder="60100" />
                          <?php if (isset($formErrors['postalCode'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['postalCode'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phoneNumber">Numéro de téléphone*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          <input type="text" required name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="01 02 03 04 05" />
                          <?php if (isset($formErrors['phoneNumber'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mail">Adresse mail*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                          <input type="mail" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                          <?php if (isset($formErrors['mail'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mailConfirm">Confimer votre adresse mail*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                          <input type="mail" required name="mailConfirm" value="<?= isset($_POST['mailConfirm']) ? $_POST['mailConfirm'] : '' ?>" class="form-control <?= isset($formErrors['mailConfirm']) ? 'is-invalid' : (isset($mailConfirm) ? 'is-valid' : '') ?>" id="mailConfirm" placeholder="adresse@mail.com" />
                          <?php if (isset($formErrors['mailConfirm'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['mailConfirm'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password">Mot de passe*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="password" required name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="" />
                          <?php if (isset($formErrors['password'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="passwordConfirm">Confimer votre mot de passe*</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="password" required name="passwordConfirm" value="<?= isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" class="form-control <?= isset($formErrors['passwordConfirm']) ? 'is-invalid' : (isset($passwordConfirm) ? 'is-valid' : '') ?>" id="passwordConfirm" placeholder="" />
                          <?php if (isset($formErrors['passwordConfirm'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['passwordConfirm'] ?></div>
                          <?php } ?>
                        </div>
                      </div>
                      <hr />
                      <div class="form-group text-center">
                        <div class="row">
                          <div class="col-12">
                            <div class="border border-secondary p-2 rounded">
                              <label>Photo de profil : minimum 200px en largeur et 200px en hauteur</label>
                              <div id="app_user_update_photo" class="d-none"><div><label> </label><div id="app_user_update_photo_imageFile"><div><label for="app_user_update_photo_imageFile_file"> </label><input type="file" id="app_user_update_photo_imageFile_file" name="app_user_update[photo][imageFile][file]" /></div>
                            </div></div>
                          </div>
                          <div class="w-100"></div>
                          <img src="/assets/img/parcourir.png" alt="Photo de profil" height="100" class="manage-image mb-2" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <hr />
                  <span class="text-danger">Vos données nominatives ne seront ni vendues ni communiquées à un tiers. Elles seront uniquement utilisées par notre association (exemple  : votre adresse sera reprise dans la fiche de don par défaut avec possibilité d’en changer…).</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row form-group mb-5 justify-content-end">
        <div class="col-12 mt-3">
          <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs" type="submit" value="Modifier" />
        </form>
      <?php } ?>
    </div>
  </div>
</div>
</div>
</div>

<?php
include 'footer.php';
?>
