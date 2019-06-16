<?php

$comment = new comment();
$getComments = $comment->getComments();
$getComment = $comment->getComment();

if (isset($_GET['modifyCommentId'])) {
    if (preg_match($regexId, $_GET['modifyCommentId'])) {
        $comment->id = strip_tags($_GET['modifyCommentId']);
        $comment->updateComment();
        header('location:profilDonationCollected.php');
    }
}