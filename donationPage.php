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
require_once 'models/models_comment.php';
require_once 'models/models_productCategory.php';
require_once 'controllers/donationPageCtrl.php';
require_once 'navbar.php';

var_dump($_POST);
var_dump($comment);
?>
<div class="container my-5">
    <div class="row">
        <?php require_once 'profilList.php' ?>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card border-0">
                <div class="card-header text-white text-center p-0 border-bottom-0 ">
                    <h1 class="card-title mb-3">Don</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-5 justify-content-between my-2">
                            <!-- MODAL SUPPRIMER UNE DONATION -->
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
                            <!-- MODAL VALIDER UNE DONATION -->
                            <div class="modal fade" id="validDonationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Valider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL POUR ANNULER UNE DONATION -->
                            <div class="modal fade" id="cancelDonationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Valider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="validDonationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Valider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <img class="custom-border-img border border-dark" src="/assets/img/panierfraise.jpg" width="270" alt="Donation Image">
                            <div class="form-inline">
                                <p class="text-uppercase my-3 font-weight-bold"><?= $getDonationPage->title ?></p>
                            </div>
                            <div>
                                <ul class="list-unstyled">
                                    <li class="my-2"><u>N° don</u> :<?= $getDonationPage->idDonation ?> </li>
                                    <li class="my-2"><u>Description</u> : <?= $getDonationPage->details ?>  </li>
                                    <li class="my-2"><u>Date de l’annonce</u> : <?= $getDonationPage->creationDate ?></li>
                                    <li class="my-2"><u>Date de remise</u> : <?= $getDonationPage->dateDelivery . ' ' . $getDonationPage->timeSlot ?></li>
                                    <li class="my-2"><u>Contenu du don</u> : <?= $getDonationPage->category ?></li>
                                    <li class="my-2"><u>Nombre de colis</u> : <?= $getDonationPage->quantity . ' ' . $getDonationPage->packages ?></li>
                                    <li class="my-2"><u>Statut</u> : <?= $getDonationPage->status ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 my-0 my-5">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-lg buttonOption dropdown-toggle dropdown-toggle-split w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Intervenir
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-left w-100" aria-labelledby="dropdownMenuButton">
                                            <?php if (($_SESSION['id_ag4fc_usersGroup'] == 2) || ($_SESSION['id_ag4fc_usersGroup'] == 3)) { ?>
                                                <a class = "dropdown-item" href ="donationModify.php?&id=<?= $getDonationPage->idDonation ?>" title = "Modifier le don"><i class = "fas fa-pen"></i> Modifier le don</a>
                                                <a class="dropdown-item" href="" title="Supprimer le don" data-target="#deleteModal" data-toggle="modal" data-id="<?= $getDonationPage->idDonation ?>" data-number="<?= $getDonationPage->idDonation ?>"><i class="fas fa-trash-alt"></i></span> Supprimer le don</a>
                                            <?php } ?>
                                            <?php if (($_SESSION['id_ag4fc_usersGroup'] == 4)) { ?>
                                                <a class="dropdown-item" href="" title="Valider le don" data-target="#validDonationModal" data-toggle="modal" data-id="<?= $getDonationPage->idDonation ?>" data-number="<?= $getDonationPage->idDonation ?>"><i class="fas fa-check"></i></span> Valider</a>
                                                <a class="dropdown-item" href="" title="Annuler le don" data-target="#cancelDonationModal" data-toggle="modal" data-id="<?= $getDonationPage->idDonation ?>" data-number="<?= $getDonationPage->idDonation ?>"><i class="fas fa-times"></i></span> Annuler</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 my-3">
                                    <button class="btn btn-lg buttonShare"  data-toggle="modal" data-target="#shareDonation">
                                        <span class="oi oi-envelope-closed mr-2"></span>Envoyer à un ami</button>
                                </div>
                            </div>
                            <div class="row">
                                <ul class="col-12 list-unstyled">
                                    <li class="mb-3">
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <i class="fas fa-dolly fa-2x"></i>
                                            </div>
                                            <div class="col-10 align-self-center">
                                                <span><?= $getDonationPage->deliveryOption ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <?php if ($getDonationPage->deliveryOption == 'Demande de collecte par une association') { ?>
                                                <div class="col-10 align-self-center">
                                                    <p class="m-0"><?= $getDonationPage->address ?></p>
                                                    <p class="m-0"><?= $getDonationPage->city . ' ' . $getDonationPage->postalCode ?></p>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-10 align-self-center">
                                                    <p class="m-0 text-uppercase"><?= $getDonationAdressPage->name ?></p>
                                                    <p class="m-0"><?= $getDonationAdressPage->address ?></p>
                                                    <p class="m-0"><?= $getDonationAdressPage->city . ' ' . $getDonationAdressPage->postalCode ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <i class="fas fa-balance-scale fa-2x"></i>
                                            </div>
                                            <div class="col-10 align-self-center">
                                                <span><?= $getDonationPage->weight ?> Kg</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if (($_SESSION['id_ag4fc_usersGroup'] == 4)) { ?>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                                    <form action="donationPage.php?id=<?= $getDonationPage->idDonation ?>" method="POST">
                                        <div class="form-group">
                                            <label for="score">Veuillez noter le don sur 5 :</label>
                                            <select class="form-control <?= isset($formErrors['score']) ? 'is-invalid' : (count($_POST) > 0 ? 'is-valid' : '') ?>" id="score" name="score">
                                                <option value="1" <?= isset($_POST['score']) && $_POST['score'] == '1' ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= isset($_POST['score']) && $_POST['score'] == '2' ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= isset($_POST['score']) && $_POST['score'] == '3' ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= isset($_POST['score']) && $_POST['score'] == '4' ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= isset($_POST['score']) && $_POST['score'] == '5' ? 'selected' : '' ?>>5</option>
                                            </select>
                                            <?php if (isset($formErrors['score'])) { ?>
                                                <div class="invalid-feedback"><?= $formErrors['score'] ?></div>
                                            <?php } ?>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="comment">Commentaire : </label>
                                        <textarea required name="comment"  class="form-control <?= isset($formErrors['comment']) ? 'is-invalid' : (isset($comment) ? 'is-valid' : '') ?>" id="comment" rows="5" placeholder="Si j'étais un super-héros je serai ... parce que ..."><?= isset($_POST['comment']) ? $_POST['comment'] : '' ?></textarea>
                                        <?php if (isset($formErrors['comment'])) { ?>
                                            <div class="invalid-feedback"><?= $formErrors['comment'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- Si le commentaire existe déja, un message d'erreur apparait-->
                                <div class="col-12">
                                    <?php if (isset($formErrors['message'])) {
                                        ?>
                                        <div class="alert-danger">
                                            <p><?= $formErrors['message'] ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-dark btn-md">Envoyer</button>
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
                                        <a href="login.php" class="btn largeButton my-2" role="button"><h2><u>Faites votre premiers dons !</u></h2></a>
                                    </div>
                                <?php } ?>
                            <?php }
                            ?>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>
