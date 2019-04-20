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
   * On vérifie que $_POST['title'] n'est pas vide
   * S'il est vide => on stocke l'erreur dans le tableau $formErrors
   * S'il n'est pas vide => on stocke dans la variable $title qui nous servira à afficher
   */
  if (!empty($_POST['title'])) {
      if ($_POST['title'] === 'Madame' || $_POST['title'] === 'Monsieur') {
          $title = $_POST['title'];
      } else {
          $formErrors['title'] = 'Votre civilité est incorrecte';
      }
  } else {
      $formErrors['title'] = 'Merci de renseigner votre civilité';
  }
  /*
   * On vérifie que $_POST['lastName'] n'est pas vide
   * S'il est vide => on stocke l'erreur dans le tableau $formErrors
   * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
   */
  if (!empty($_POST['lastName'])) {
    /*
     * On vérifie si la saisie utilisateur correspond à la regex
     * Si tout va bien => on stocke dans la variable qui nous servira à afficher
     * Sinon => on stocke l'erreur dans le tableau $formErrors
     */
    if (preg_match($regexName, $_POST['lastName'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $lastName = strip_tags($_POST['lastName']);
    } else {
      $formErrors['lastName'] = 'Merci de renseigner un nom de famille valide';
    }
  } else {
    $formErrors['lastName'] = 'Merci de renseigner votre nom de famille';
  }

  if (!empty($_POST['firstName'])) {
    if (preg_match($regexName, $_POST['firstName'])) {
      $firstName = strip_tags($_POST['firstName']);
    } else {
      $formErrors['firstName'] = 'Merci de renseigner un prénom valide';
    }
  } else {
    $formErrors['firstName'] = 'Merci de renseigner votre prénom';
  }

  if (!empty($_POST['birthDate'])) {
    if (preg_match($regexBirthDate, $_POST['birthDate'])) {
      $birthDate = strip_tags($_POST['birthDate']);
    } else {
      $formErrors['birthDate'] = 'Merci de renseigner une date de naissance valide';
    }
  } else {
    $formErrors['birthDate'] = 'Merci de renseigner votre date de naissance';
  }

  if (!empty($_POST['address'])) {
    if (preg_match($regexAddress, $_POST['address'])) {
      $address = strip_tags($_POST['address']);
    } else {
      $formErrors['address'] = 'Merci de renseigner une adresse valide';
    }
  } else {
    $formErrors['address'] = 'Merci de renseigner votre adresse';
  }

  if (!empty($_POST['country'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['country'])) {
      $country = strip_tags($_POST['country']);
    } else {
      $formErrors['country'] = 'Merci de renseigner une adresse valide';
    }
  } else {
    $formErrors['country'] = 'Merci de renseigner votre adresse';
  }

  if (!empty($_POST['region'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['region'])) {
      $region = strip_tags($_POST['region']);
    } else {
      $formErrors['region'] = 'Merci de renseigner une région valide';
    }
  } else {
    $formErrors['region'] = 'Merci de renseigner votre région';
  }

  if (!empty($_POST['city'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['city'])) {
      $city = strip_tags($_POST['city']);
    } else {
      $formErrors['city'] = 'Merci de renseigner une ville valide';
    }
  } else {
    $formErrors['city'] = 'Merci de renseigner votre ville';
  }

  if (!empty($_POST['postalCode'])) {
    if (preg_match($regexZipCode, $_POST['postalCode'])) {
      $postalCode = strip_tags($_POST['postalCode']);
    } else {
      $formErrors['postalCode'] = 'Merci de renseigner un code postal valide';
    }
  } else {
    $formErrors['postalCode'] = 'Merci de renseigner votre code postal';
  }

  if (!empty($_POST['phoneNumber'])) {
    if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
      $phoneNumber = strip_tags($_POST['phoneNumber']);
    } else {
      $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
    }
  } else {
    $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
  }

  if (!empty($_POST['mail'])) {
    if (preg_match($regexMail, $_POST['mail'])) {
      if($_POST['mail'] == $_POST['mailConfirm']){
        $mail = strip_tags($_POST['mail']);
      }else{
        $formErrors['mail'] = 'Les deux adresse email ne correspondent pas';
      }
    } else {
      $formErrors['mail'] = 'Merci de renseigner une adresse email valide';
    }
  } else {
    $formErrors['mail'] = 'Veuillez entrer une adresse email';
  }

  if (!empty($_POST['mailConfirm'])) {
    if (preg_match($regexMail, $_POST['mailConfirm'])) {
      if($_POST['mailConfirm'] == $_POST['mail']){
        $mail = strip_tags($_POST['mailConfirm']);
      }else{
        $formErrors['mailConfirm'] = 'Les deux adresse email ne correspondent pas';
      }
    } else {
      $formErrors['mailConfirm'] = 'Merci de renseigner une adresse email valide';
    }
  } else {
    $formErrors['mailConfirm'] = 'Veuillez entrer une adresse email';
  }

  if(!empty($_POST['password'])){
   if($_POST['password'] == $_POST['passwordConfirm']){
     $password = $_POST['password'];
   }else{
     $formErrors['password'] = 'Les deux mot de passe ne correspondent pas';
   }
 }else{
   $formErrors['password'] = 'Veuillez entrer un mot de passe';
 }

 if(!empty($_POST['passwordConfirm'])){
   if($_POST['password'] == $_POST['passwordConfirm']){
     $password = $_POST['passwordConfirm'];
   }else{
     $formErrors['passwordConfirm'] = 'Les deux mot de passe ne correspondent pas';
   }
 }else{
   $formErrors['passwordConfirm'] = 'Veuillez entrer un mot de passe';
 }
}
?>

    <div class="container mt-5 mb-5 jumbotron">
      <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
       <form action="" method="POST">
          <fieldset>
            <legend>Identité</legend>
            <hr />
            <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                  <label for="title">Civilité</label>
                  <select class="form-control" id="title" name="title">
                      <option selected disabled>---Veuillez faire un choix---</option>
                      <option value="Madame"  <?= isset($_POST['title']) && $_POST['title'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
                      <option value="Monsieur"  <?= isset($_POST['title']) && $_POST['title'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
                  </select>
                  <?php if (isset($formErrors['title'])) {
                      ?>
                      <div class="alert-danger">
                          <p><?= $formErrors['title'] ?></p>
                      </div>
                  <?php }
                  ?>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="lastName">Nom de famille</label>
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
                <input type="text" required name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" class="form-control <?= isset($formErrors['lastName']) ? 'is-invalid' : (isset($lastName) ? 'is-valid' : '') ?>" id="lastName" placeholder="Dupont" />
                <?php if (isset($formErrors['lastName'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['lastName'] ?></div>
                <?php } ?>
              </div>
                </div>
              <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                <label for="firstName">Prénom</label>
                <input type="text" required name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>"  class="form-control <?= isset($formErrors['firstName']) ? 'is-invalid' : (isset($firstName) ? 'is-valid' : '') ?>" id="firstName" placeholder="Jean" />
                <?php if (isset($formErrors['firstName'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['firstName'] ?></div>
                <?php } ?>
            </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="birthDate">Date de naissance</label>
                <input type="date" required name="birthDate" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" class="form-control <?= isset($formErrors['birthDate']) ? 'is-invalid' : (isset($birthDate) ? 'is-valid' : '') ?>" id="birthDate" />
                <?php if (isset($formErrors['birthDate'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['birthDate'] ?></div>
                <?php } ?>
              </div>
            </div>
          </fieldset>
            <fieldset>
              <legend>Adresse et contact</legend>
              <hr />
              <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="address">Adresse</label>
                  <input type="text" required name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" id="address" placeholder="12 Boulevard Cambronne" />
                  <?php if (isset($formErrors['address'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['address'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="country">Région</label>
                  <input type="text" required name="country" value="<?= isset($_POST['country']) ? $_POST['country'] : '' ?>"  class="form-control <?= isset($formErrors['country']) ? 'is-invalid' : (isset($country) ? 'is-valid' : '') ?>" id="country" placeholder="France" />
                  <?php if (isset($formErrors['country'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['country'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="region">Région</label>
                  <input type="text" required name="region" value="<?= isset($_POST['region']) ? $_POST['region'] : '' ?>" class="form-control <?= isset($formErrors['region']) ? 'is-invalid' : (isset($region) ? 'is-valid' : '') ?>" id="region" placeholder="Picardie" />
                  <?php if (isset($formErrors['region'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['region'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="city">Ville</label>
                  <input type="text" required name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>"  class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (isset($city) ? 'is-valid' : '') ?>" id="city" placeholder="Noyon" />
                  <?php if (isset($formErrors['city'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['city'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="postalCode">Code Postal</label>
                  <input type="text" required name="postalCode" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" class="form-control <?= isset($formErrors['postalCode']) ? 'is-invalid' : (isset($postalCode) ? 'is-valid' : '') ?>" id="postalCode" placeholder="60400" />
                  <?php if (isset($formErrors['postalCode'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['postalCode'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="phoneNumber">Numéro de téléphone</label>
                  <input type="text" required name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="01 02 03 04 05" />
                  <?php if (isset($formErrors['phoneNumber'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                  <?php } ?>
                </div>
            </fieldset>
            <fieldset>
              <legend>Identifiant</legend>
              <hr />
              <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="mail">Adresse mail</label>
                  <input type="mail" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                  <?php if (isset($formErrors['mail'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="mailConfirm">Confimer votre adresse mail</label>
                  <input type="mail" required name="mailConfirm" value="<?= isset($_POST['mailConfirm']) ? $_POST['mailConfirm'] : '' ?>" class="form-control <?= isset($formErrors['mailConfirm']) ? 'is-invalid' : (isset($mailConfirm) ? 'is-valid' : '') ?>" id="mailConfirm" placeholder="adresse@mail.com" />
                  <?php if (isset($formErrors['mailConfirm'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['mailConfirm'] ?></div>
                  <?php } ?>
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <label for="password">Mot de passe</label>
                    <input type="password" required name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="" />
                    <?php if (isset($formErrors['password'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                    <?php } ?>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <label for="passwordConfirm">Confimer votre mot de passe</label>
                    <input type="password" required name="passwordConfirm" value="<?= isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" class="form-control <?= isset($formErrors['passwordConfirm']) ? 'is-invalid' : (isset($passwordConfirm) ? 'is-valid' : '') ?>" id="passwordConfirm" placeholder="" />
                    <?php if (isset($formErrors['passwordConfirm'])) { ?>
                      <div class="invalid-feedback"><?= $formErrors['passwordConfirm'] ?></div>
                    <?php } ?>
                  </div>
                </div>
            </fieldset>
          <input type="submit" class="btn btn-success" value="S'inscrire" />
        </form>
      <?php } else { ?>
        <div class="card border-secondary mb-3">
          <div class="card-header"><?= strtoupper($lastName) . ' ' . $firstName ?></div>
          <div class="card-body">
            <p class="card-text">
            <p>
              <span class="font-weight-bold">Date de naissance :</span></span> <?= $birthDate ?><br />
              <span class="font-weight-bold">Adresse :</span> <?= $address ?><br />
              <span class="font-weight-bold">Pays :</span> <?= $country ?><br />
              <span class="font-weight-bold">Region :</span> <?= $region ?><br />
              <span class="font-weight-bold">Ville :</span> <?= $city ?><br />
              <span class="font-weight-bold">Code Postale :</span> <?= $postalCode ?><br />
              <span class="font-weight-bold">Numéro de téléphone :</span> <?= $phoneNumber ?><br />
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
</div>
<?php
include 'footer.php';
?>
