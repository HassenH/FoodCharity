<?php

session_start();
$users = new users();

if (isset($_GET['deleteId'])) {
    if (preg_match($regexId, $_GET['deleteId'])) {
        $users->id = strip_tags($_GET['deleteId']);
        $users->removeUser();
        header('location:index.php');
        session_destroy();
    }
}

$getUser = $users->getUserList();
