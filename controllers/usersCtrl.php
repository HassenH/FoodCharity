<?php

$user = new users();

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
  if (!empty($_POST['civility'])) {
      if ($_POST['civility'] === 'Madame' || $_POST['civility'] === 'Monsieur') {
          $user->civility = $_POST['civility'];
      } else {
          $formErrors['civility'] = 'Votre civilité est incorrecte';
      }
  } else {
      $formErrors['civility'] = 'Merci de renseigner votre civilité';
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
      $user->lastname = strip_tags($_POST['lastName']);
    } else {
      $formErrors['lastName'] = 'Merci de renseigner un nom de famille valide';
    }
  } else {
    $formErrors['lastName'] = 'Merci de renseigner votre nom de famille';
  }

  if (!empty($_POST['firstName'])) {
    if (preg_match($regexName, $_POST['firstName'])) {
      $user->firstname = strip_tags($_POST['firstName']);
    } else {
      $formErrors['firstName'] = 'Merci de renseigner un prénom valide';
    }
  } else {
    $formErrors['firstName'] = 'Merci de renseigner votre prénom';
  }

  if (!empty($_POST['birthDate'])) {
    if (preg_match($regexBirthDate, $_POST['birthDate'])) {
      $user->birthDate = strip_tags($_POST['birthDate']);
    } else {
      $formErrors['birthDate'] = 'Merci de renseigner une date de naissance valide';
    }
  } else {
    $formErrors['birthDate'] = 'Merci de renseigner votre date de naissance';
  }
  
    if (!empty($_POST['enterprise'])) {
    if (preg_match($regexName, $_POST['enterprise'])) {
      $user->enterprise = strip_tags($_POST['enterprise']);
    } else {
      $formErrors['enterprise'] = 'Merci de renseigner une entreprise valide';
    }
  } else {
    $formErrors['enterprise'] = 'Merci de renseigner une entreprise';
  }

  if (!empty($_POST['address'])) {
    if (preg_match($regexAddress, $_POST['address'])) {
      $user->address = strip_tags($_POST['address']);
    } else {
      $formErrors['address'] = 'Merci de renseigner une adresse valide';
    }
  } else {
    $formErrors['address'] = 'Merci de renseigner votre adresse';
  }

  if (!empty($_POST['country'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['country'])) {
      $user->country = strip_tags($_POST['country']);
    } else {
      $formErrors['country'] = 'Merci de renseigner une adresse valide';
    }
  } else {
    $formErrors['country'] = 'Merci de renseigner votre adresse';
  }

  if (!empty($_POST['region'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['region'])) {
      $user->region = strip_tags($_POST['region']);
    } else {
      $formErrors['region'] = 'Merci de renseigner une région valide';
    }
  } else {
    $formErrors['region'] = 'Merci de renseigner votre région';
  }

  if (!empty($_POST['city'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['city'])) {
      $user->city = strip_tags($_POST['city']);
    } else {
      $formErrors['city'] = 'Merci de renseigner une ville valide';
    }
  } else {
    $formErrors['city'] = 'Merci de renseigner votre ville';
  }

  if (!empty($_POST['postalCode'])) {
    if (preg_match($regexZipCode, $_POST['postalCode'])) {
      $user->postalCode = strip_tags($_POST['postalCode']);
    } else {
      $formErrors['postalCode'] = 'Merci de renseigner un code postal valide';
    }
  } else {
    $formErrors['postalCode'] = 'Merci de renseigner votre code postal';
  }

  if (!empty($_POST['phoneNumber'])) {
    if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
      $user->phoneNumber = strip_tags($_POST['phoneNumber']);
    } else {
      $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
    }
  } else {
    $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
  }

  if (!empty($_POST['mail'])) {
    if (preg_match($regexMail, $_POST['mail'])) {
      if($_POST['mail'] == $_POST['mailConfirm']){
        $user->mail = strip_tags($_POST['mail']);
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
        $user->mail = strip_tags($_POST['mailConfirm']);
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
     $user->password = hash('sha512', $_POST['password']);
   }else{
     $formErrors['password'] = 'Les deux mot de passe ne correspondent pas';
   }
 }else{
   $formErrors['password'] = 'Veuillez entrer un mot de passe';
 }

 if(!empty($_POST['passwordConfirm'])){
   if($_POST['password'] == $_POST['passwordConfirm']){
     $user->password = hash('sha512', $_POST['password']);
   }else{
     $formErrors['passwordConfirm'] = 'Les deux mot de passe ne correspondent pas';
   }
 }else{
   $formErrors['passwordConfirm'] = 'Veuillez entrer un mot de passe';
 }
}
if(count($formErrors)==0) {
   $user->insertUsers(); 
}

?>

