<?php
session_start();
include 'connection.php';

$orderid=0;

$sql = 'select * from ordertable';
$date='';

$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$orderid = $row['orderID'];
	}
	$orderid++;
	
$sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);

date_default_timezone_set("Asia/Dhaka");
$total = $_SESSION['total'];

while($row = mysqli_fetch_assoc($result)){
    $date = date('Y-m-d h:i:s a');
	$sql2 = 'select * from product where productID="'.$row['productID'].'"';
	$result2 = mysqli_query($link, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
	$Price = $row2['price']-($row2['price']*$row2['DiscountPercent']/100);
    $sql = 'insert into ordertable (orderID,userID, productID, productQuantity, Price, datetime) values ("'.$orderid.'", "'.$_SESSION['userID'].'", "'.$row['productID'].'", "'.$row['productQuantity'].'", "'.$Price.'", "'.$date.'")';
	
    $resultInsert = mysqli_query($link, $sql);
}

$sql = 'insert into bill (orderID,userID, TotalAmount, datetime) values ("'.$orderid.'","'.$_SESSION['userID'].'", "'.$total.'", "'.$date.'")';
$resultInsert = mysqli_query($link, $sql);

$sql = 'delete from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);

$_SESSION['orderid'] = $orderid;
header('Location: invoice.php');
?>