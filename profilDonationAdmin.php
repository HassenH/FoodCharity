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
$page = 'profilDonationAdmin.php';
?>

<div class="container">
    <div class="row my-5">
        <?php include 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Dons alimentaires</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card-body">
                            <!-- MODAL POUR SUPPRIMER UN DON -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title d-flex" id="exampleModalLabel">Supprimer un don</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL POUR MODIFIER UN DON -->
                            <div class="modal fade" id="donationModifyAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title d-flex" id="exampleModalLabel">Modifier un don</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                                                <form action="" method="POST">
                                                    <div class="form-group row">
                                                        <div class="col-10 offset-1 mt-2">
                                                            <label for="title" class="font-weight-bold">Titre de l'annonce : </label>
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
                                                            <input type="text" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="title" placeholder="" required />
                                                            <?php if (isset($formErrors['title'])) { ?>
                                                                <div class="invalid-feedback"><?= $formErrors['title'] ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-10 offset-1 mt-2">
                                                            <label for="category" class="font-weight-bold">Catégories : </label>
                                                            <select class="form-control <?= isset($formErrors['category']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="category" name="category">
                                                                <?php foreach ($listProductCategory as $productCategory) { ?>
                                                                    <option value="" <?= isset($_POST['category']) && $_POST['category'] == $$productCategory->id ? 'selected' : '' ?>><?= $productCategory->category ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <?php if (isset($formErrors['category'])) { ?>
                                                                <div class="invalid-feedback"><?= $formErrors['category'] ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-10 offset-1 mt-2">
                                                            <label for="date" class="font-weight-bold">Date de remise : </label>
                                                            <input type="date" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>" class="form-control <?= isset($formErrors['date']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="date" />
                                                            <?php if (isset($formErrors['date'])) { ?>
                                                                <div class="invalid-feedback"><?= $formErrors['date'] ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-10 offset-1 mt-2">
                                                            <label for="hour" class="font-weight-bold">Heure de remise :</label>
                                                            <select class="form-control <?= isset($formErrors['hour']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="hour" name="hour">
                                                                <?php //foreach ($listTimeSlot as $timeSlot) { ?>
                                                                   <!-- <option value="<?= $timeSlot->id ?>" <?= isset($_POST['hour']) && $_POST['hour'] == $timeSlot->id ? 'selected' : '' ?>><?= $timeSlot->timeSlot ?></option> -->
                                                                <?php //} ?>
                                                            </select>
                                                            <?php if (isset($formErrors['hour'])) { ?>
                                                                <div class="invalid-feedback"><?= $formErrors['hour'] ?></div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-10 offset-1 mt-2">
                                                            <label for="delivery" class="font-weight-bold">Option de remise :</label>
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
                                                    <button type="submit" class="btn btn-default">Enregistrer</button>
                                                <?php } ?>
                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Catégorie</th>
                                        <th class="text-center">Titre</th>
                                        <th class="text-center">Remise</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listAdminDonation as $donation) { ?>
                                        <tr>
                                            <th class="text-center"><?= $donation->id ?></th>
                                            <td class="text-center"><?= $donation->category ?></td>
                                            <td class="text-center"><?= $donation->title ?></td>
                                            <td class="text-center"><?= $donation->deliveryOption ?></td>
                                            <td class="text-center"><?= $donation->status ?></td>
                                            <td class="text-center"><?= $donation->creationDate ?></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><a href="donationPage.php?&id=<?= $donation->id ?>" title="Modifier un don" ><i class="fas fa-eye"></i></a> <a href="" title="Supprimer un don" data-target="#deleteModal" data-toggle="modal" data-id="<?= $donation->id ?>" data-lastname="" data-firstname=""><i class="fas fa-trash"></i></a></td>
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