<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
require_once 'models/models_users.php';
require_once 'models/models_commerce.php';
require_once 'controllers/commerceCtrl.php';
require_once 'navbar.php';

var_dump($_POST);
var_dump($commerce);
?>
<!-- BANNER -->
<?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 imgHeaderCategoryRegistration d-flex justify-content-center align-items-center">
                <h1 class="display-3">Rejoignez-nous maintenant</h1>
            </div>
        </div>
    </div>
<?php } ?>
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <div class="border-0">
                <div class="card-header text-white text-center p-0 ">
                    <h1 class="card-title mb-3">Inscription commerce</h1>
                </div>
                <div class="card-body p0">
                    <div class="row">
                        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="col-12 card border-0 bg-transparent">
                                    <div class="card-header text-center border-bottom-0 bg-light">
                                        <h2 class="ml-4 mb-0 card-title d-inline-block">Veuillez renseignez vos informations</h2>
                                    </div>
                                    <div class="row card-body pt-4">
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="civility mr-2">Civilité*</label>
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        <select class="form-control <?= isset($formErrors['civility']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="civility" name="civility">
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
                                                <?php
                                                /*
                                                 * Pour garder la saisie utilisateur, on ajoute l'attribut checked s'il a coché l'input
                                                 */
                                                ?>
                                                <p>Etes-vous un commerce ?*</p>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="roleYes" name="role" value="3" <?= isset($_POST['role']) && $_POST['role'] == '3' ? 'checked' : '' ?> class="form-check-input <?= isset($formErrors['role']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>">
                                                    <label class="form-check-label" for="roleYes">Oui</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="roleNo" name="role" value="non" <?= isset($_POST['role']) && $_POST['role'] == 'non' ? 'checked' : '' ?> class="form-check-input <?= isset($formErrors['role']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>">
                                                    <label class="form-check-label" for="roleNo">Non</label>
                                                </div>
                                                <?php if (isset($formErrors['role'])) { ?>
                                                    <div class="invalid-feedback d-block"><?= $formErrors['role'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nom de votre commerce*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" required name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"  class="form-control <?= isset($formErrors['name']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="name" placeholder="" />
                                                    <?php if (isset($formErrors['name'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['name'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="siretNumber">Numéro SIRET</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" required name="siretNumber" value="<?= isset($_POST['siretNumber']) ? $_POST['siretNumber'] : '' ?>"  class="form-control <?= isset($formErrors['siretNumber']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="siretNumber" placeholder="" />
                                                    <?php if (isset($formErrors['siretNumber'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['siretNumber'] ?></div>
                                                    <?php } ?>
                                                </div>
                                                <small><i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <em>Le numéro SIRET est composé de 14 chiffres</em>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname">Nom de famille*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <?php
                                                    /*
                                                     * On garde dans la value, $_POST['lastname'] qui est la saisie de l'utilisateur
                                                     * Permet d'éviter à l'utilisateur de resaisir ses informations
                                                     *
                                                     * On ajoute la classe is-invalid si $formErrors['lastname'] existe car cette variable n'existe qu'en cas d'erreur
                                                     * On ajoute la classe is-valid si $lastname existe car cette variable n'existe qu'en cas de saisie valide
                                                     *
                                                     * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                                                     */
                                                    ?>
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" required name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" class="form-control <?= isset($formErrors['lastname']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="lastname" placeholder="Dupont" />
                                                    <?php if (isset($formErrors['lastname'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['lastname'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname">Prénom*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" required name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"  class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="firstname" placeholder="Jean" />
                                                    <?php if (isset($formErrors['firstname'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['firstname'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Adresse*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <input type="text" required name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="address" placeholder="28 rue Alfred de Musset" />
                                                    <?php if (isset($formErrors['address'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['address'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="postalCode">Code Postal*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <input type="text" required name="postalCode" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" class="form-control <?= isset($formErrors['postalCode']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="search" placeholder="60100" />
                                                    <?php if (isset($formErrors['postalCode'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['postalCode'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="city">Ville*</label>
                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                        <select class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="city" name="city">
                                                            <option selected disabled>Saisir votre code postal</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <label for="phoneNumber">Numéro de téléphone*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    <input type="text" required name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="01 02 03 04 05" />
                                                    <?php if (isset($formErrors['phoneNumber'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mail">Adresse mail*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    <input type="mail" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                                                    <?php if (isset($formErrors['mail'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mailConfirm">Confirmer votre adresse mail*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    <input type="mail" required name="mailConfirm" value="<?= isset($_POST['mailConfirm']) ? $_POST['mailConfirm'] : '' ?>" class="form-control <?= isset($formErrors['mailConfirm']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="mailConfirm" placeholder="adresse@mail.com" />
                                                    <?php if (isset($formErrors['mailConfirm'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['mailConfirm'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mot de passe*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    <input type="password" required name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="password" placeholder="" />
                                                    <?php if (isset($formErrors['password'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordConfirm">Confirmer votre mot de passe*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    <input type="password" required name="passwordConfirm" value="<?= isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" class="form-control <?= isset($formErrors['passwordConfirm']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="passwordConfirm" placeholder="" />
                                                    <?php if (isset($formErrors['passwordConfirm'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['passwordConfirm'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="form-group border border-secondary p-2 rounded">
                                                <label for="file">Photo de profil</label>
                                                <input class="form-control" type="file" name="file" id="file" />
                                            </div>
                                            <div class="w-100"></div>
                                            <?php if (isset($formErrors['file'])) { ?>
                                                <div class="alert-danger">
                                                    <p><?= $formErrors['file'] ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12">
                                            <hr />
                                            <span class="text-danger">Vos données nominatives ne seront ni vendues ni communiquées à un tiers. Elles seront uniquement utilisées par notre association (exemple  : votre adresse sera reprise dans la fiche de don par défaut avec possibilité d’en changer…).</span>
                                        </div>
                                        <div class="col-12 form-group justify-content-end my-4">
                                            <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs" type="submit" value="Valider" />
                                        </div>
                                        <?php
                                    } else {
                                        if (isset($formSuccess)) {
                                            ?>
                                            <div class="col-8 offset-2 alert alert-success " role="alert">
                                                <p><?= $formSuccess; ?> </p>
                                                <p>Vous pouvez à présent vous connecter. </p>
                                            </div>
                                            <div class="col-12 text-center">
                                                <img src="assets/img/donateme.png" height="400px" alt="donateme">
                                                <a href="login.php" class="btn largeButton my-2" role="button"><h2 class="font-italic">Faites votre premiers dons !</h2></a>
                                            </div>
                                        <?php } ?>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>

