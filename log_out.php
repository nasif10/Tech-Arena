<?php
session_start();
include 'connection.php';

$_SESSION['Cart']=null;
unset($_SESSION);
session_destroy();
header('Location: index.php');
?>