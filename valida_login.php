<?php

session_start();
$_SESSION['usuarioLogin2'] = $_POST['login'];

header("Location: home.php");



?>