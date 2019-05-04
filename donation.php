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

  if (!empty($_POST['detailsDonation'])) {
    //Ici on utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
    $detailsDonation = htmlspecialchars($_POST['detailsDonation']);
  } else {
    $formErrors['detailsDonation'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['numberDonation'])) {
    if (preg_match($regexName, $_POST['numberDonation'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $lastName = strip_tags($_POST['numberDonation']);
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

 if (!empty($_POST['weightDonation'])) {
   if (preg_match($regexName, $_POST['weightDonation'])) {
     //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
     $weightDonation = strip_tags($_POST['weightDonation']);
   } else {
     $formErrors['weightDonation'] = 'Merci de renseigner un poids valide';
   }
 } else {
   $formErrors['weightDonation'] = 'Merci de renseigner un poids';
 }

 if (!empty($_POST[''])) {
  if ($_POST[''] === 'Sac(s)' || $_POST[''] === 'Sac(s) isotherme' || $_POST[''] === 'Caisse(s)') {
    $packagesDonation = $_POST['packagesDonation'];
  } else {
    $formErrors['packagesDonation'] = 'Merci de sélectionner une réponse';
  }
} else {
  $formErrors['packagesDonation'] = 'Merci de répondre à cette question';
}

 if (!empty($_POST['deliveryDonation'])) {
  if ($_POST['deliveryDonation'] === 'Demande de collecte par une association' || $_POST['deliveryDonation'] === 'Dépôt dans une association') {
    $deliveryDonation = $_POST['deliveryDonation'];
  } else {
    $formErrors['deliveryDonation'] = 'Merci de sélectionner une option de remise';
  }
} else {
  $formErrors['deliveryDonation'] = 'Merci de répondre à cette question';
}
}
  ?>

<div class="container">
  <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
  <form action="donation.php" method="POST">
    <div class="form-group row">
      <div class="col-12 col-sm-8 col-md-8 col-lg-8 mt-4">
        <label for="titleDonation" class="font-weight-bold">Titre de l'annonce* : </label>
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
        <input type="text" name="titleDonation" value="" class="form-control" id="titleDonation" placeholder="Titre :" required />
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 mt-2">
        <div class="form-check form-check-inline text-center category-checkbox">
          <img src="assets/img/fruitlegume1.png" alt="Fruits et légumes" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(pomme, fraise, salade...)">
          <label for="form-check-label">Fruits et légumes</label>
          <input type="checkbox" name="fruitsAndVegetables" value="1" id="fruitsAndVegetables">
        </div>
        <div class="form-check form-check-inline text-center category-checkbox">
          <img src="assets/img/refregirateur.png" alt="Produits frais" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(viande,fromage,poisson...)">
          <label for="form-check-label">
            <input type="checkbox" name="coldProduct" value="3" id="coldProduct">Produits frais</label>
          </div>
          <div class="form-check form-check-inline text-center category-checkbox">
            <img src="assets/img/farine.png" alt="Produits secs" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(farine,riz...)">
            <label for="form-check-label">Produits secs</label>
            <input type="checkbox" name="dryProduct" value="4" id="dryProduct">
          </div>
          <div class="form-check form-check-inline text-center category-checkbox">
            <label for="form-check-label">Produits congelés</label>
            <img src="assets/img/frozen.png" alt="Produits congelés" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(produit congelés)">
            <input type="checkbox" name="frozenProduct" value="5" id="frozenProduct">
          </div>
          <div class="form-check form-check-inline text-center category-checkbox">
            <label for="form-check-label">Boissons</label>
            <img src="assets/img/boissons1.png" alt="Boissons" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(boissons)">
            <input type="checkbox" name="drinkProduct" value="6" id="drinkProduct">
          </div>
          <div class="form-check form-check-inline text-center category-checkbox">
            <label for="form-check-label">Autres aliments</label>
            <img src="assets/img/autresaliments.png" alt="Produits congelés" class="img-thumbnail" width="130" data-toggle="tooltip" data-placement="bottom" title="(boîtes de conserve, gâteaux)">
            <input type="checkbox" name="otherProduct" value="7" id="otherProduct">
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 mt-2">
          <label for="detailsDonation" class="font-weight-bold">Texte de l'annonce :</label>
          <textarea name="detailsDonation" class="form-control" id="detailsDonation" rows="5" required placeholder="Votre texte"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12">
          <label for="numberDonation" class="font-weight-bold">Nombre de colis* : </label>
        </div>
        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
          <input type="number" name="numberDonation" value="" id="numberDonation" min="0" required placeholder="1">
        </div>
        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
          <select class="form-control" id="packagesDonation" name="packagesDonation">
            <option selected disabled>---Choix---</option>
            <option value="">Sac(s)</option>
            <option value="">Sac(s) isotherme</option>
            <option value="">Caisse(s)</option>
            <option value="">Palette(s)</option>
            <option value="">Sans contenant</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 mt-2">
          <label for="weightDonation" class="font-weight-bold">Estimation du poids total* : </label>
        </div>
        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
          <input type="number" name="weightDonation" value="" id="weightDonation" min="0" required placeholder="1">
        </div>
        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
          <select class="form-control" id="wDonation" name="wDonation">
            <option selected disabled>---Choix---</option>
            <option value="">Kg</option>
            <option value="">g</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 mt-2">
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
    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
      <label for="deliveryDonation" class="font-weight-bold">Option de remise* :</label>
    </div>
    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
      <select class="form-control" id="" name="deliveryDonation">
        <option selected disabled>---Choix---</option>
        <option value="">Demande de collecte par une association</option>
        <option value="">Dépôt dans une association</option>
      </select>
    </div>
  </div>
  <input type="submit" name="btn btn-success" value="Etape suivante: adresse de remise">
</form>
</div>

<?php
var_dump();
include 'footer.php'
?>
