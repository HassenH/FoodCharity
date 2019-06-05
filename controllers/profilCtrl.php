<?php

session_start();


if (isset($_POST['search'])) {
//je ne charge pas l'autoloader car il risque de rentrer en conflit
//avec les chemins pour l'appel à Ajax
//appel à la database qui est le singleton
    require_once '../models/database.php';
// appel
    require_once '../models/models_city.php';

    require_once '../regex.php';
    $city = new city();

    if (preg_match($regexSearch, $_POST['search'])) {
        echo json_encode($city->searchZipcode($_POST['search']));
    } else {
        echo $_POST['search'];
    }
} else {

//instance de la classe users
    $users = new users();
    $listUser = $users->getUserList();

    $association = new association();
    $listAssociation = $association->getAssociation();

    $commerce = new commerce();
    $listCommerce = $commerce->getCommerce();

//instance de la classe commerce
//On initialise un tableau d'erreurs vide pour les erreurs
    $formErrors = array();

    if (count($_POST) > 0) {

        /*
         * On vérifie que $_POST['title'] n'est pas vide
         * S'il est vide => on stocke l'erreur dans le tableau $formErrors
         * S'il n'est pas vide => on stocke dans la variable $title qui nous servira à afficher
         */
        if (!empty($_POST['civility'])) {
            if ($_POST['civility'] === 'Madame' || $_POST['civility'] === 'Monsieur') {
                $users->civility = $_POST['civility'];
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

        if ($_SESSION['id_ag4fc_usersGroup'] == 3) {
            if (!empty($_POST['name'])) {
                if (preg_match($regexName, $_POST['name'])) {
                    $commerce->name = htmlspecialchars($_POST['name']);
                } else {
                    $formErrors['name'] = 'Merci de renseigner une entreprise valide';
                }
            } else {
                $formErrors['name'] = 'Merci de renseigner votre association';
            }

            if (!empty($_POST['siretNumber'])) {
                if (preg_match($regexSiret, $_POST['siretNumber'])) {
                    $commerce->siretNumber = htmlspecialchars($_POST['siretNumber']);
                } else {
                    $formErrors['siretNumber'] = 'Merci de renseigner un numéro SIRET valide';
                }
            } else {
                $formErrors['siretNumber'] = 'Merci de renseigner votre numéro SIRET';
            }
        }

        if ($_SESSION['id_ag4fc_usersGroup'] == 4) {
            if (!empty($_POST['name'])) {
                if (preg_match($regexName, $_POST['name'])) {
                    $association->name = htmlspecialchars($_POST['name']);
                } else {
                    $formErrors['name'] = 'Merci de renseigner un commerce valide';
                }
            } else {
                $formErrors['name'] = 'Merci de renseigner votre commerce';
            }
        }

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

        if (!empty($_POST['address'])) {
            if (preg_match($regexAddress, $_POST['address'])) {
                $users->address = htmlspecialchars($_POST['address']);
            } else {
                $formErrors['address'] = 'Merci de renseigner une adresse valide';
            }
        } else {
            $formErrors['address'] = 'Merci de renseigner votre adresse';
        }

        if (!empty($_POST['postalCode'])) {
            if (preg_match($regexZipCode, $_POST['postalCode'])) {
                $postalCode = htmlspecialchars($_POST['postalCode']);
            } else {
                $formErrors['postalCode'] = 'Merci de renseigner une adresse valide';
            }
        } else {
            $formErrors['postalCode'] = 'Merci de renseigner votre adresse';
        }

        if (!empty($_POST['city'])) {
            if (preg_match($regexSearch, $_POST['city'])) {
                $users->id_ag4fc_city = htmlspecialchars($_POST['city']);
            } else {
                $formErrors['city'] = 'Merci de renseigner une ville valide';
            }
        } else {
            $formErrors['city'] = 'Merci de renseigner votre ville';
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
                    /**
                     * Je vérifie si l'utilisateur existe dans la base de données
                     * On stocke le résultat de la méthode checkUserExist qui permet de vérifier
                     * si l'adresse mail (login) de l'utilisateur a déjà été enregistré dans la base de donnée
                     */
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

        if (count($formErrors) == 0) {
            if ($_SESSION['id_ag4fc_usersGroup'] == 2) {
                $users->updateUsers();
                $formSuccess = 'Votre inscription a été validé';
            }
        }

        if (count($formErrors) == 0) {
            if ($_SESSION['id_ag4fc_usersGroup'] == 3) {
                // On appelle la méthode getInstance, qui se trouve dans la classe database
                // Puisque cette methode est static il n'est pas nécessaire de l'instancier un nouvel objet par rapport a la classe database
                // getInstance() me retourne l'objet instancié de la classe Database
                $database = Database::getInstance();
                // On fais appelle a setAttribute qui est une méthode de PDO, pour gérer les erreurs
                $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $database->db->beginTransaction();
                    $users->updateUsers();
                    $commerce->id_ag4fc_users = $database->db->lastInsertId();
                    $updateCommerce = $commerce->updateCommerce();
                    $formSuccess = 'Votre modification a été validé';
                    $database->db->commit();
                } catch (\Exception $e) {
                    $database->db->rollback();
                    die('error : ' . $e->getMessage());
                }
            }
        }

        if (count($formErrors) == 0) {
            if ($_SESSION['id_ag4fc_usersGroup'] == 4) {
                // On appelle la méthode getInstance, qui se trouve dans la classe database
                // Puisque cette methode est static il n'est pas nécessaire de l'instancier un nouvel objet par rapport a la classe database
                // getInstance() me retourne l'objet instancié de la classe Database
                $database = Database::getInstance();
                // On fais appelle a setAttribute qui est une méthode de PDO, pour gérer les erreurs
                $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $database->db->beginTransaction();
                    $users->updateUsers();
                    $association->id_ag4fc_users = $database->db->lastInsertId();
                    $updateAssociation = $association->updateAssociation();
                    $formSuccess = 'Votre modification a été validé';
                    $database->db->commit();
                } catch (\Exception $e) {
                    $database->db->rollback();
                    die('error : ' . $e->getMessage());
                }
            }
        }
    }
}