<?php

//La session se détruit, on est déconnecté
session_start();
session_destroy();

header('location:/index.php');
?>