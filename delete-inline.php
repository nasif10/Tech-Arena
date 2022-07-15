<?php
include 'connection.php';

$pid = $_GET['pid'];

$sql = "DELETE FROM product WHERE productID = {$pid}";
$result = mysqli_query($link, $sql) or die("Query Unsuccessful.");

header("Location: admin.php");
?>
