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
require_once 'models/models_productCategory.php';
require_once 'controllers/donationModifyCtrl.php';
require_once 'navbar.php';

//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
?>

<div class="container my-5">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
        <form action="donationModify.php?&id=<?= $getDonationModify->idDonation ?>" method="POST">
            <div class="row">
                <?php include 'profilList.php' ?>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card border-0">
                        <div class="card-header text-white text-center p-0 border-bottom-0 ">
                            <h1 class="card-title mb-3">Modification don</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 mt-4 px-5">
                                    <label for="title" class="font-weight-bold">Titre de l'annonce* : </label>
                                    <?php
                                    /*
                                     * Dans la value nous allons utiliser une condition ternaire
                                     * Grâce a la condition ternaire nous allons déterminé si $_POST['title'] est définie  (isset($_POST['title']) ? valeur à retourner si true : valeur à retourner si false).
                                     * On garde dans la value, $_POST['title'] qui est la saisie de l'utilisateur
                                     * Permet d'éviter à l'utilisateur de resaisir ses informations
                                     *
                                     * On ajoute la classe is-invalid si $formErrors['title'] existe car cette variable n'existe qu'en cas d'erreur
                                     * On ajoute la classe is-valid si $title existe car cette variable n'existe qu'en cas de saisie valide
                                     *
                                     * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                                     */
                                    ?>
                                    <input type="text" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : $getDonationModify->title ?>" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="title" placeholder="" required />
                                    <?php if (isset($formErrors['title'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['title'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 mt-2 px-5">
                                    <label for="category" class="font-weight-bold">Catégories* (les produits ne doivent pas être périmés) : </label>
                                </div>
                            </div>
                            <div class="form-group row px-5">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <?php
                                        /*
                                         * Pour garder la saisie utilisateur, on ajoute l'attribut checked s'il a coché l'input
                                         */
                                        ?>
                                        <img src="assets/img/fruitlegume1.png" alt="Fruits et légumes" width="130" data-toggle="tooltip" data-placement="bottom" title="(viande,fromage,poisson...)" />
                                        <label for="form-check-label" class="small">Fruits et légumes</label>
                                        <input type="radio" name="category" value="1" <?= (isset($_POST['category']) && ($_POST['category'] == 1)) || ($getDonationModify->category) == 'Fruits et légumes' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="fruitsAndVegetables">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <img src="assets/img/refregirateur.png" alt="Produits frais" width="130" data-toggle="tooltip" data-placement="bottom" title="(viande,fromage,poisson...)" />
                                        <label for="form-check-label" class="small">Produits frais</label>
                                        <input type="radio" name="category" value="2" <?= (isset($_POST['category']) && ($_POST['category'] == 2)) || ($getDonationModify->category) == 'Produits frais' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="coldProduct">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <img src="assets/img/farine.png" alt="Produits secs" width="130" data-toggle="tooltip" data-placement="bottom" title="(farine,riz...)" />
                                        <label for="form-check-label" class="small">Produits secs</label>
                                        <input type="radio" name="category" value="3" <?= (isset($_POST['category']) && ($_POST['category'] == 3)) || ($getDonationModify->category) == 'Produits secs' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="dryProduct">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <img src="assets/img/frozen.png" alt="Produits congelés" width="130" data-toggle="tooltip" data-placement="bottom" title="(produit congelés)" />
                                        <label for="form-check-label" class="small">Produits congelés</label>
                                        <input type="radio" name="category" value="4" <?= (isset($_POST['category']) && ($_POST['category'] == 4)) || ($getDonationModify->category) == 'Produits congelés' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="frozenProduct">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <img src="assets/img/boissons1.png" alt="Boissons" width="130" data-toggle="tooltip" data-placement="bottom" title="(boissons)" />
                                        <label for="form-check-label" class="small">Boissons</label>
                                        <input type="radio" name="category" value="5" <?= (isset($_POST['category']) && ($_POST['category'] == 5)) || ($getDonationModify->category) == 'Boissons' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="drinkProduct">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-check text-center category-checkbox">
                                        <img src="assets/img/autresaliments.png" alt="Produits congelés" width="130" data-toggle="tooltip" data-placement="bottom" title="(boîtes de conserve, gâteaux)" />
                                        <label for="form-check-label" class="small">Autres aliments</label>
                                        <input type="radio" name="category" value="6" <?= (isset($_POST['category']) && ($_POST['category'] == 6)) || ($getDonationModify->category) == 'Autres aliments' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="otherProduct">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 px-5">
                                    <label for="details" class="font-weight-bold">Texte de l'annonce :</label>
                                    <textarea name="details" class="form-control <?= isset($formErrors['details']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="details" rows="5" required placeholder="Votre texte"><?= isset($_POST['details']) ? $_POST['details'] : $getDonationModify->details ?></textarea>
                                    <?php if (isset($formErrors['details'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['details'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 px-5">
                                    <label for="numberDonation" class="font-weight-bold">Nombre de colis* : </label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <label for="numberDonation" class="font-weight-bold">Contenant* : </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 px-5">
                                    <input type="number" name="quantity" value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : $getDonationModify->quantity ?>" class="form-control <?= isset($formErrors['quantity']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="quantity" min="0" required placeholder="0">
                                    <?php if (isset($formErrors['quantity'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['quantity'] ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <select class="form-control <?= isset($formErrors['packages']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" name="packages" id="packages" />
                                    <?php foreach ($listPackage as $package) { ?>
                                        <option value="<?= $package->id ?>" <?= isset($_POST['packages']) && $_POST['packages'] == $package->id ? 'selected' : '' ?>><?= $package->packages ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php if (isset($formErrors['packages'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['packages'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 mt-2 px-5">
                                    <label for="weight" class="font-weight-bold">Estimation du poids total en kilos* : </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 px-5">
                                    <input type="number" name="weight" value="<?= isset($_POST['weight']) ? $_POST['weight'] : $getDonationModify->weight ?>" class="form-control <?= isset($formErrors['weight']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" step="0.1" id="weight" min="0" required>
                                    <?php if (isset($formErrors['weight'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['weight'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <label for="date" class="font-weight-bold">Date de remise* :</label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <label for="hour" class="font-weight-bold">Heure de remise* :</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <input type="date" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : $getDonationModify->dateDelivery ?>" class="form-control <?= isset($formErrors['date']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="date" />
                                    <?php if (isset($formErrors['date'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['date'] ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
                                    <select class="form-control <?= isset($formErrors['hour']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="hour" name="hour">
                                        <?php foreach ($listTimeSlot as $timeSlot) { ?>
                                            <option value="<?= $timeSlot->id ?>" <?= isset($_POST['hour']) && $_POST['hour'] == $timeSlot->id ? 'selected' : '' ?>><?= $timeSlot->timeSlot ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if (isset($formErrors['hour'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['hour'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 px-5">
                                    <label for="delivery" class="font-weight-bold">Option de remise* :</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 px-5">
                                    <select class="form-control <?= isset($formErrors['delivery']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" name="delivery" id="delivery" />
                                    <?php foreach ($listDelivery as $delivery) { ?>
                                        <option value="<?= $delivery->id ?>" <?= isset($_POST['delivery']) && $_POST['delivery'] == $delivery->id ? 'selected' : '' ?>><?= $delivery->deliveryOption ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php if (isset($formErrors['delivery'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['delivery'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs btn-submit my-2" type="submit" value="Modifier" />
                                </div>
                            </div>
                            </form>
                            <?php
                        } else {
                            if (isset($formSuccess)) {
                                ?>
                                <div class="col-8 offset-2 alert alert-success " role="alert">
                                    <p><?= $formSuccess; ?> </p>
                                </div>
                                <div class="col-12 text-center">
                                    <img src="assets/img/donateme.png" height="400px" alt="donateme">
                                    <a href="profil.php" class="btn largeButton my-2" role="button"><h2><u>Retour à la page profil !</u></h2></a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include 'footer.php'
?>


