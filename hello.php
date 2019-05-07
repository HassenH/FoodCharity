<?php
include 'navbar.php';

//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();
/*
* On vérifie si le tableau $_POST est vide
* S'il est vide => le formulaire n'a pas été envoyé
* S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
*/
if (count($_POST) > 0) {
  /*
  * On vérifie que $_POST['lastName'] n'est pas vide
  * S'il est vide => on stocke l'erreur dans le tableau $formErrors
  * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
  */
  if (!empty($_POST['titleDonation'])) {
    /*
    * On vérifie si la saisie utilisateur correspond à la regex
    * Si tout va bien => on stocke dans la variable qui nous servira à afficher
    * Sinon => on stocke l'erreur dans le tableau $formErrors
    */
    if (preg_match($regexName, $_POST['titleDonation'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $lastName = strip_tags($_POST['titleDonation']);
    } else {
      $formErrors['titleDonation'] = 'Merci de renseigner un titre valide';
    }
  } else {
    $formErrors['titleDonation'] = 'Merci de renseigner un titre';
  }

  if (!empty($_POST['categoryDonation'])) {
    if ($_POST['categoryDonation'] === 'Fruits et légumes' || $_POST['categoryDonation'] === 'Produits frais' || $_POST['categoryDonation'] === 'Produits secs' || $_POST['categoryDonation'] === 'Produits congelés' || $_POST['categoryDonation'] === 'Boissons' || $_POST['categoryDonation'] === '
    Autres aliments') {
      $categoryDonation = $_POST['categoryDonation'];
    } else {
      $formErrors['categoryDonation'] = 'Merci de sélectionner une réponse';
    }
  } else {
    $formErrors['categoryDonation'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['detailsDonation'])) {
    //Ici on utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
    $detailsDonation = htmlspecialchars($_POST['detailsDonation']);
  } else {
    $formErrors['detailsDonation'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['numberDonation'])) {
    if (preg_match($regexNumberDonation, $_POST['numberDonation'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $numberDonation = strip_tags($_POST['numberDonation']);
    } else {
      $formErrors['numberDonation'] = 'Merci de renseigner un nombre de colis valide';
    }
  } else {
    $formErrors['numberDonation'] = 'Merci de renseigner un nombre de colis';
  }

  if (!empty($_POST['packagesDonation'])) {
    if ($_POST['packagesDonation'] === 'Sac(s)' || $_POST['packagesDonation'] === 'Sac(s) isotherme' || $_POST['packagesDonation'] === 'Caisse(s)' || $_POST['packagesDonation'] === 'Palette(s)' || $_POST['packagesDonation'] === 'Sans contenant') {
      $packagesDonation = $_POST['packagesDonation'];
    } else {
      $formErrors['packagesDonation'] = 'Merci de sélectionner une réponse';
    }
  } else {
    $formErrors['packagesDonation'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['weightNumberDonation'])) {
    if (preg_match($regexNumberWeight, $_POST['weightNumberDonation'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $weightNumberDonation = strip_tags($_POST['weightNumberDonation']);
    } else {
      $formErrors['weightNumberDonation'] = 'Merci de renseigner un poids valide';
    }
  } else {
    $formErrors['weightNumberDonation'] = 'Merci de renseigner un poids';
  }

  if (!empty($_POST['weightTypeDonation'])) {
    if ($_POST['weightTypeDonation'] === 'Kg' || $_POST['weightTypeDonation'] === 'g') {
      $weightTypeDonation = $_POST['weightTypeDonation'];
    } else {
      $formErrors['weightTypeDonation'] = 'Merci de sélectionner une option de remise';
    }
  } else {
    $formErrors['weightTypeDonation'] = 'Merci de renseigner une option de remise';
  }

  if (!empty($_POST['deliveryDonation'])) {
    if ($_POST['deliveryDonation'] === 'Demande de collecte par une association' || $_POST['deliveryDonation'] === 'Dépôt dans une association') {
      $deliveryDonation = $_POST['deliveryDonation'];
    } else {
      $formErrors['deliveryDonation'] = 'Merci de sélectionner une option de remise';
    }
  } else {
    $formErrors['deliveryDonation'] = 'Merci de renseigner une option de remise';
  }
}
?>
<div class="container my-5">
  <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
    <form action="hello.php" method="POST">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card border-0" id="makeDonationPage">
            <div class="card-header text-white text-center p-0 border-bottom-0">
              <h1 class="card-title mb-3 ">Faire un don</h1>
            </div>
            <div class="card-body p-0">
              <div class="row justify-content-center my-4">
                <div class="col-12 d-flex justify-content-center">
                  <img src="assets/img/multistep2.png" class="multistep" alt="Descritpion">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-8 col-md-8 col-lg-8 mt-4 px-5">
                  <label for="titleDonation" class="font-weight-bold">Titre de l'annonce* : </label>
                  <?php
                  /*
                  * Dans la value nous allons utiliser une condition ternaire
                  * Grâce a la condition ternaire nous allons déterminé si $_POST['titleDonation'] est définie  (isset($_POST['titleDonation']) ? valeur à retourner si true : valeur à retourner si false).
                  * On garde dans la value, $_POST['titleDonation'] qui est la saisie de l'utilisateur
                  * Permet d'éviter à l'utilisateur de resaisir ses informations
                  *
                  * On ajoute la classe is-invalid si $formErrors['titleDonation'] existe car cette variable n'existe qu'en cas d'erreur
                  * On ajoute la classe is-valid si $titleDonation existe car cette variable n'existe qu'en cas de saisie valide
                  *
                  * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                  */
                  ?>
                  <input type="text" name="titleDonation" value="<?= isset($_POST['titleDonation']) ? $_POST['titleDonation'] : '' ?>" class="form-control <?= isset($formErrors['titleDonation']) ? 'is-invalid' : (isset($titleDonation) ? 'is-valid' : '') ?>" id="titleDonation" placeholder="Titre :" required />
                  <?php if (isset($formErrors['titleDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['titleDonation'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 mt-2 px-5">
                  <label for="categoryDonation" class="font-weight-bold">Catégories* (les produits ne doivent pas être périmés) : </label>
                </div>
              </div>
              <div class="form-group row px-5">
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <?php
                    /*
                    * Pour garder la saisie utilisateur, on ajoute l'attribut checked s'il a coché l'input
                    */
                    ?>
                    <img src="assets/img/fruitlegume1.png" alt="Fruits et légumes" width="130" data-toggle="tooltip" data-placement="bottom" title="(pomme, fraise, salade...)" />
                    <label for="form-check-label"></label>
                    <input type="checkbox" name="categoryDonation" value="Fruits et légumes" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Fruits et légumes' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="fruitsAndVegetables">
                    <p>Fruits et légumes</p>
                  </div>
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <img src="assets/img/refregirateur.png" alt="Produits frais" width="130" data-toggle="tooltip" data-placement="bottom" title="(viande,fromage,poisson...)" />
                    <label for="form-check-label">Produits frais</label>
                    <input type="checkbox" name="categoryDonation" value="Produits frais" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Produits frais' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="coldProduct">
                  </div>
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <img src="assets/img/farine.png" alt="Produits secs" width="130" data-toggle="tooltip" data-placement="bottom" title="(farine,riz...)" />
                    <label for="form-check-label">Produits secs</label>
                    <input type="checkbox" name="categoryDonation" value="Produits secs" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Produits secs' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="dryProduct">
                  </div>
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <img src="assets/img/frozen.png" alt="Produits congelés" width="130" data-toggle="tooltip" data-placement="bottom" title="(produit congelés)" />
                    <label for="form-check-label">Produits congelés</label>
                    <input type="checkbox" name="categoryDonation" value="Produits congelés" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Produits congelés' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="frozenProduct">
                  </div>
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <img src="assets/img/boissons1.png" alt="Boissons" width="130" data-toggle="tooltip" data-placement="bottom" title="(boissons)" />
                    <label for="form-check-label">Boissons</label>
                    <input type="checkbox" name="categoryDonation" value="Boissons" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Boissons' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="drinkProduct">
                  </div>
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="form-check text-center category-checkbox">
                    <img src="assets/img/autresaliments.png" alt="Produits congelés" width="130" data-toggle="tooltip" data-placement="bottom" title="(boîtes de conserve, gâteaux)" />
                    <label for="form-check-label">Autres aliments</label>
                    <input type="checkbox" name="categoryDonation" value="Autres aliments" <?= isset($_POST['categoryDonation']) && $_POST['categoryDonation'] == 'Autres aliments' ? 'checked' : '' ?> class="form-check-label <?= isset($formErrors['categoryDonation']) ? 'is-invalid' : (isset($categoryDonation) ? 'is-valid' : '') ?>" id="otherProduct">
                  </div>
                </div>
              </div>
              <?php if (isset($formErrors['categoryDonation'])) { ?>
                <div class="invalid-feedback d-block"><?= $formErrors['categoryDonation'] ?></div>
              <?php } ?>
              <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 px-5">
                  <label for="detailsDonation" class="font-weight-bold">Texte de l'annonce :</label>
                  <textarea name="detailsDonation" class="form-control <?= isset($formErrors['detailsDonation']) ? 'is-invalid' : (isset($detailsDonation) ? 'is-valid' : '') ?>" id="detailsDonation" rows="5" required placeholder="Votre texte"><?= isset($_POST['detailsDonation']) ? $_POST['detailsDonation'] : '' ?></textarea>
                  <?php if (isset($formErrors['detailsDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['detailsDonation'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 px-5">
                  <label for="numberDonation" class="font-weight-bold">Nombre de colis* : </label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 px-5">
                  <input type="number" name="numberDonation" value="<?= isset($_POST['numberDonation']) ? $_POST['numberDonation'] : '' ?>" class="form-control <?= isset($formErrors['numberDonation']) ? 'is-invalid' : (isset($numberDonation) ? 'is-valid' : '') ?>" id="numberDonation" min="0" required placeholder="0">
                  <?php if (isset($formErrors['numberDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['numberDonation'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 px-5">
                  <select class="form-control <?= isset($formErrors['packagesDonation']) ? 'is-invalid' : (isset($packagesDonation) ? 'is-valid' : '') ?>" name="packagesDonation" id="packagesDonation" />
                    <option selected disabled>---Choix---</option>
                    <option value="Sac(s)" <?= isset($_POST['packagesDonation']) && $_POST['packagesDonation'] == 'Sac(s)' ? 'selected' : '' ?>>Sac(s)</option>
                    <option value="Sac(s) isotherme" <?= isset($_POST['packagesDonation']) && $_POST['packagesDonation'] == 'Sac(s) isotherme' ? 'selected' : '' ?>>Sac(s) isotherme</option>
                    <option value="Caisse(s)" <?= isset($_POST['packagesDonation']) && $_POST['packagesDonation'] == 'Caisse(s)' ? 'selected' : '' ?>>Caisse(s)</option>
                    <option value="Palette(s)" <?= isset($_POST['packagesDonation']) && $_POST['packagesDonation'] == 'Palette(s)' ? 'selected' : '' ?>>Palette(s)</option>
                    <option value="Sans contenant" <?= isset($_POST['packagesDonation']) && $_POST['packagesDonation'] == 'Sans contenant' ? 'selected' : '' ?>>Sans contenant</option>
                  </select>
                  <?php if (isset($formErrors['packagesDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['packagesDonation'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 mt-2 px-5">
                  <label for="weightNumberDonation" class="font-weight-bold">Estimation du poids total* : </label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 px-5">
                  <input type="number" name="weightNumberDonation" value="<?= isset($_POST['weightNumberDonation']) ? $_POST['weightNumberDonation'] : '' ?>" class="form-control <?= isset($formErrors['weightNumberDonation']) ? 'is-invalid' : (isset($weightNumberDonation) ? 'is-valid' : '') ?>" step="0.1" id="weightNumberDonation" min="0" required placeholder="0">
                  <?php if (isset($formErrors['weightNumberDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['weightNumberDonation'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 px-5">
                  <select class="form-control <?= isset($formErrors['weightTypeDonation']) ? 'is-invalid' : (isset($weightTypeDonation) ? 'is-valid' : '') ?>" id="weightTypeDonation" name="weightTypeDonation">
                    <option selected disabled>---Choix---</option>
                    <option value="Kg" <?= isset($_POST['weightTypeDonation']) && $_POST['weightTypeDonation'] == 'Kg' ? 'selected' : '' ?>>Kg</option>
                    <option value="g" <?= isset($_POST['weightTypeDonation']) && $_POST['weightTypeDonation'] == 'g' ? 'selected' : '' ?>>g</option>
                  </select>
                  <?php if (isset($formErrors['weightTypeDonation'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['weightTypeDonation'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 mt-2 px-5">
                  <label for="photoDonation" class="font-weight-bold">Photo :  </label>
                  <div class="border border-secondary p-2 rounded text-center">
                    <label>minimum 315px en largeur et 315px en hauteur</label>
                    <div id="make_donation_photo" class="d-none"><div><label> </label><div id="make_donation_photo_imageFile"><div><label for="make_donation_photo_imageFile_file"> </label><input type="file" id="make_donation_photo_imageFile_file" name="make_donation[photo][imageFile][file]" /></div>
                  </div></div>
                </div>
                <div class="w-100"></div>
                <img src="/bundles/app/img/addImage.png" alt="Photo de profil" height="50" class="manage-image mb-2" />
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 px-5">
              <label for="deliveryDonation" class="font-weight-bold">Option de remise* :</label>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 px-5">
              <select class="form-control <?= isset($formErrors['deliveryDonation']) ? 'is-invalid' : (isset($deliveryDonation) ? 'is-valid' : '') ?>" name="deliveryDonation" id="deliveryDonation" />
                <option selected disabled>---Choix---</option>
                <option value="Demande de collecte par une association" <?= isset($_POST['deliveryDonation']) && $_POST['deliveryDonation'] == 'Demande de collecte par une association' ? 'selected' : '' ?>>Demande de collecte par une association</option>
                <option value="Dépôt dans une association" <?= isset($_POST['deliveryDonation']) && $_POST['deliveryDonation'] == 'Dépôt dans une association' ? 'selected' : '' ?>>Dépôt dans une association</option>
              </select>
              <?php if (isset($formErrors['deliveryDonation'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['deliveryDonation'] ?></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 my-4 ">
      <a href="/index.php" class="btn btn-bg-red btn-lg btn-block text-wrap-xs"><i class="fas fa-arrow-left mr-2 mr-lg-5"></i></span>Annuler : retour accueil</a>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 my-4">
      <button class="btn btn-bg-red btn-lg btn-block text-wrap-xs" type="submit">Etape suivante : Adresse de remise<i class="fas fa-arrow-right ml-2 ml-lg-5"></i></button>
    </div>
  </div>
</form>
<?php } ?>
</div>
</div>
<?php
include 'footer.php'
?>
