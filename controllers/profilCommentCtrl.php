<?php

// Instanciation de l'objet $comment de la classe comment
$comment = new comment();
// Appel de la méthode getComments() et stockage du résultat dans la variable $getComments pour afficher la liste des commentaires, selon l'utilisateur
$getComments = $comment->getComments();
$getCommentsUser = $comment->getCommentsUser();


//On vérifie que l'id est présent en paramètre d'url
if (isset($_GET['deleteCommentId'])) {
    if (preg_match($regexId, $_GET['deleteCommentId'])) {
        //On récupére l'id en paramétre d'url
        $comment->id = strip_tags($_GET['deleteCommentId']);
        // Appel de la méthode removeComment() pour supprimer un commentaire
        $comment->removeComment();
        // Redirection vers la page profilComment
        header('location:profilComment.php');
    }
}

//On vérifie que l'id de la donation est présent en paramètre d'url
if (isset($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $comment->id = strip_tags($_GET['id']);
        $getComment = $comment->getComment();
        if (count($_POST) > 0) {

            if (!empty($_POST['score'])) {
                if ($_POST['score'] === '1' || $_POST['score'] === '2' || $_POST['score'] === '3' || $_POST['score'] === '4' || $_POST['score'] === '5') {
                    $comment->score = $_POST['score'];
                } else {
                    $formErrors['score'] = 'Votre note est incorrecte';
                }
            } else {
                $formErrors['score'] = 'Merci de renseigner une note';
            }

            if (!empty($_POST['comment'])) {
                $comment->opinion = strip_tags($_POST['comment']);
            } else {
                $formErrors['comment'] = 'Merci de répondre à cette question';
            }

            if (count($formErrors) == 0) {
                if ($comment->updateComment()) {
                    // Redirection vers la page profilAccounts
                    header('location:profilComment.php');
                }
            }
        }
    }
}