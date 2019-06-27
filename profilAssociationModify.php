<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
require_once 'models/models_association.php';
require_once 'models/models_users.php';
require_once 'controllers/associationUpdateCtrl.php';
require_once 'navbar.php';
?>
<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-9 col-md-9 col-lg-9">
            <div class="border-0">
                <div class="card-header text-white text-center p-0 ">
                    <h1 class="card-title mb-3">Modification de votre profil</h1>
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
                                                <label for="name">Nom de votre association*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <input type="text" required name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : $listAssociation->name ?>" class="form-control <?= isset($formErrors['name']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="name" placeholder="" />
                                                    <?php if (isset($formErrors['name'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['name'] ?></div>
                                                    <?php } ?>
                                                </div>
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
                                                    <input type="text" required name="lastname" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $ListUser->lastname ?>" class="form-control <?= isset($formErrors['lastname']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="lastname" placeholder="" />
                                                    <?php if (isset($formErrors['lastname'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['lastname'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname">Prénom*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" required name="firstname" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $ListUser->firstname ?>"  class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="firstname" placeholder="" />
                                                    <?php if (isset($formErrors['firstname'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['firstname'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Adresse*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <input type="text" required name="address" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['address']) : $ListUser->address ?>" class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="address" placeholder="" />
                                                    <?php if (isset($formErrors['address'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['address'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="postalCode">Code Postal*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <input type="text" required name="postalCode" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['postalCode']) : $ListUser->postalCode ?>" class="form-control <?= isset($formErrors['postalCode']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="search" placeholder="" />
                                                    <?php if (isset($formErrors['postalCode'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['postalCode'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Ville*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    <select class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="city" name="city">
                                                        <option selected disabled>Saisir votre code postal</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="phoneNumber">Numéro de téléphone*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    <input type="text" required name="phoneNumber" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['phoneNumber']) : $ListUser->phoneNumber ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="" />
                                                    <?php if (isset($formErrors['phoneNumber'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mail">Adresse mail*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    <input type="mail" required name="mail" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $ListUser->mail ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="mail" placeholder="" />
                                                    <?php if (isset($formErrors['mail'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mailConfirm">Confirmer votre nouvelle adresse mail*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    <input type="mail" required name="mailConfirm" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $ListUser->mail ?>" class="form-control <?= isset($formErrors['mailConfirm']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="mailConfirm" placeholder="" />
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
                                                <label for="passwordConfirm">Confirmer votre nouveau mot de passe*</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    <input type="password" required name="passwordConfirm" value="<?= isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" class="form-control <?= isset($formErrors['passwordConfirm']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="passwordConfirm" placeholder="" />
                                                    <?php if (isset($formErrors['passwordConfirm'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['passwordConfirm'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />

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
                                                <p>Vos informations on été modifié. </p>
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