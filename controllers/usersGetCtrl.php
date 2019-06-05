<?php

session_start();
$users = new users();
$listUsers = $users->getUsersList();
?>

