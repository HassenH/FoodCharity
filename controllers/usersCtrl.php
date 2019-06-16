<?php

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
    $users = new users();
//On initialise un tableau d'erreurs vide pour les erreurs
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

        if (!empty($_POST['role'])) {
            if ($_POST['role'] === '2') {
                $users->id_ag4fc_usersGroup = $_POST['role'];
            } else {
                $formErrors['role'] = 'Veuillez changez de formulaire si vous n\'êtes pas un particulier';
            }
        } else {
            $formErrors['role'] = 'Merci de répondre à cette question';
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
                    $resultCount = $users->checkIfUserExist();
                    if ($resultCount > 0) {
                        $formErrors['mail'] = 'Un compte avec ce mail existe déjà. Veuillez modifier l\'adresse mail';
                    }
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

        if (isset($_FILES['file'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//Vérifie si le fichier image est une image réelle ou une image factice
            if (isset($_POST['submit'])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if ($check !== false) {
                    $formErrors['file'] = "Le fichier est une image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $formErrors['file'] = "Le fichier n'est pas une image.";
                    $uploadOk = 0;
                }
            }
// Vérifie si le fichier existe déjà
            if (file_exists($target_file)) {
                $formErrors['file'] = "Désolé, le fichier existe déjà.";
                $uploadOk = 0;
            }
// Vérifie la taille du fichier
            if ($_FILES["file"]["size"] > 5000000) {
                $formErrors['file'] = "Désolé, votre fichier est trop volumineux.";
                $uploadOk = 0;
            }
// Autoriser certains formats de fichier
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $formErrors['file'] = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                $uploadOk = 0;
            }
// Vérifie si $ uploadOk est défini sur 0 par une erreur
            if ($uploadOk == 0) {
                $formErrors['img'] = "Désolé, votre fichier n'a pas été téléchargé.";
// Si tout va bien, l'upload du fichier peut commencé
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $users->photo = basename($_FILES["file"]["name"]);
                } else {
                    $formErrors['file'] = "Désolé, une erreur s'est produite lors de l'envoi de votre fichier.";
                }
            }
        }

        if (count($formErrors) == 0) {
            if ($users->addUsers()) {
                $formSuccess = 'Votre inscription a été validé';
            }
        }
    }
}
