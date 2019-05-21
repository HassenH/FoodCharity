<?php

$users = new users();
$association = new association();
$resultCount = $user->checkIfUsersIsFree();

//On initialise un tableau d'erreurs vide
$formErrors = array();
$formSuccess = array();
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
            $association->civility = $_POST['civility'];
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
    if (!empty($_POST['lastname'])) {
        /*
         * On vérifie si la saisie utilisateur correspond à la regex
         * Si tout va bien => on stocke dans la variable qui nous servira à afficher
         * Sinon => on stocke l'erreur dans le tableau $formErrors
         */
        if (preg_match($regexName, $_POST['lastname'])) {
            //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
            $users->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $formErrors['lastname'] = 'Merci de renseigner un nom de famille valide';
        }
    } else {
        $formErrors['lastname'] = 'Merci de renseigner votre nom de famille';
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
            $users->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formErrors['firstname'] = 'Merci de renseigner un prénom valide';
        }
    } else {
        $formErrors['firstname'] = 'Merci de renseigner votre prénom';
    }

    if (!empty($_POST['name'])) {
        if (preg_match($regexName, $_POST['name'])) {
            $association->name = htmlspecialchars($_POST['name']);
        } else {
            $formErrors['name'] = 'Merci de renseigner une association valide';
        }
    } else {
        $formErrors['name'] = 'Merci de renseigner votre association';
    }

    if (!empty($_POST['address'])) {
        if (preg_match($regexAddress, $_POST['address'])) {
            $users->address = htmlspecialchars($_POST['address']);
        } else {
            $formErrors['address'] = 'Merci de renseigner une adresse valide';
        }
    } else {
        $formErrors['address'] = 'Merci de renseigner votre adresse';
    }

    if (!empty($_POST['region'])) {
        if (preg_match($regexCountryAndNationnality, $_POST['region'])) {
            $users->region = htmlspecialchars($_POST['region']);
        } else {
            $formErrors['region'] = 'Merci de renseigner une région valide';
        }
    } else {
        $formErrors['region'] = 'Merci de renseigner votre région';
    }

    if (!empty($_POST['city'])) {
        if (preg_match($regexCountryAndNationnality, $_POST['city'])) {
            $users->city = htmlspecialchars($_POST['city']);
        } else {
            $formErrors['city'] = 'Merci de renseigner une ville valide';
        }
    } else {
        $formErrors['city'] = 'Merci de renseigner votre ville';
    }

    if (!empty($_POST['postalCode'])) {
        if (preg_match($regexZipCode, $_POST['postalCode'])) {
            $users->postalCode = htmlspecialchars($_POST['postalCode']);
        } else {
            $formErrors['postalCode'] = 'Merci de renseigner un code postal valide';
        }
    } else {
        $formErrors['postalCode'] = 'Merci de renseigner votre code postal';
    }

    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
            $users->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
        }
    } else {
        $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
    }

    if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            if ($_POST['mail'] == $_POST['mailConfirm']) {
                $users->mail = htmlspecialchars($_POST['mail']);
            } else {
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
            if ($_POST['mailConfirm'] == $_POST['mail']) {
                $users->mail = htmlspecialchars($_POST['mailConfirm']);
            } else {
                $formErrors['mailConfirm'] = 'Les deux adresse email ne correspondent pas';
            }
        } else {
            $formErrors['mailConfirm'] = 'Merci de renseigner une adresse email valide';
        }
    } else {
        $formErrors['mailConfirm'] = 'Veuillez entrer une adresse email';
    }

    if (!empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['passwordConfirm']) {
            $users->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = 'Les deux mot de passe ne correspondent pas';
        }
    } else {
        $formErrors['password'] = 'Veuillez entrer un mot de passe';
    }

    if (!empty($_POST['passwordConfirm'])) {
        if ($_POST['password'] == $_POST['passwordConfirm']) {
            $users->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['passwordConfirm'] = 'Les deux mot de passe ne correspondent pas';
        }
    } else {
        $formErrors['passwordConfirm'] = 'Veuillez entrer un mot de passe';
    }
    if (count($formErrors) == 0 && $resultCount == 0) {
        $database = dataBaseSingleton::getInstance();
        $database->db->beginTransaction();
        if ($users->addAssociation()) {
            $formSuccess = 'Votre inscription a été validé';
        } else {
            $formErrors['add'] = 'Une erreur est survenue';
        }
    }
}
?>
