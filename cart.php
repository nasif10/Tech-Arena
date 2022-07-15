<?php
include 'connection.php';
session_start();
include 'header.php';
include 'nav.php';
?>

<body class="d-flex flex-column min-vh-100">
<div class="cart-area">
        <div class="container">
            <div class="all-tag"> 
				<h2>Cart</h2> 
			</div>
        	
        <?php
		if(isset($_SESSION['userID'])){

			$sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
			$result = mysqli_query($link, $sql);
			$count = mysqli_num_rows($result);

			if($count>0){ 
		?>
            <div class="table">
                    <table class="table">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Price/Unit</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
						<tbody>
						<tr>
						
                    <?php
                        $sl = 1;
                        $sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
                        $result = mysqli_query($link, $sql);
                        $total=0;

                        while($row = mysqli_fetch_assoc($result)){
                            $sql = 'select * from product where productID="'.$row['productID'].'"';
                            $run = mysqli_query($link, $sql);
                            $row2 = mysqli_fetch_assoc($run);
							$discountPrice=$row2['price']-($row2['price']*$row2['DiscountPercent']/100);
                            echo "<td>$sl</td>";
                            echo "<td>".$row2['name']."</td>";
                            echo "<td>".$row['productQuantity']."</td>";
                            echo "<td>".$discountPrice."</td>";
							$itemTotal=$row['productQuantity'] * $discountPrice;
                            $total = $total +$itemTotal; 
							$_SESSION['total'] = $total;
?>
                            <td style="text-align: center;"> 
                                <div class="plus-minus">
                                    <a role="button" href="cartintermediate.php?id=<?php echo $row['productID']?>&target=minus"><i class="bi bi-dash-circle-dotted px-1"></i></a>
                                    <a role="button" href="cartintermediate.php?id=<?php echo $row['productID']?>&target=add"><i class="bi bi-plus-square-dotted px-1"></i></a>
                                </div>
                            </td>
                            <td> 
								<a role="button" href="cartintermediate.php?id=<?php echo $row['productID']?>&target=remove"><i class="bi bi-trash" style="font-size: 1.2rem; color: #df4759;"></i></a> 
							</td>
                            </tr>
							
					<?php   $sl = $sl + 1; 
					    } 
					?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total</b></td>
                            <td>
                                <?php echo $total?>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
						</tbody>	
                    </table>
            </div>
            <div class="chk-btn d-flex justify-content-md-end">
				<a role="button" class="btn btn-outline-success" href="checkout.php">Check Out</a>
            </div>
      <?php }
			else{ ?>
				<h3>You haven't add any product</h3>
    <?php 	}
        }
		else{ 
            echo '<h3>Login first!</h3>';
        } ?>
</div>	
</div>

<?php 
	include "footer.php";
?>
