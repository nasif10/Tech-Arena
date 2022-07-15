<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';

if(isset($_SESSION['userID']))
	$orderID = $_SESSION['orderid'];
$totalAmount=0;
?>

<body>
<div class="invoice-area py-5">
    <div class="container">
        <div class="all-tag">
            <h2>Invoice</h2> 
        </div>
	
    <?php
	if(isset($_SESSION['userID'])){
		$sql = 'select * from ordertable where userID="'.$_SESSION['userID'].'" and orderID = "'.$orderID.'"';
		$result = mysqli_query($link, $sql);
		$count = mysqli_num_rows($result);
			
		if($count>0){
	?>
			
		<div class="invoice pb-4">	
			<table class="table table-bordered">
				<thead class="table-success">
					<tr> 
						<th>No.</th> 
						<th>Order ID</th> 
						<th>Order Time</th> 
						<th>Product Name</th>  
						<th>Product Quantity</th> 
						<th>Product Price</th> 
					</tr>
				</thead>
				<tbody>
						
				<?php
					$sl=1;
					$sql = 'select * from ordertable where userID="'.$_SESSION['userID'].'"and orderID = "'.$orderID.'"';
					$result = mysqli_query($link, $sql);

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr><td>'.$sl.'</td>';
						echo '<td>'.$row["orderID"].'</td>';
						echo '<td>'.$row["datetime"].'</td>';

						$sql2 = 'select * from product where productID="'.$row['productID'].'"';
						$result2 = mysqli_query($link, $sql2);
						$row2 = mysqli_fetch_assoc($result2);
						echo '<td>'.$row2["name"].'</td>';
						$totalItemPrice= $row['Price']*$row["productQuantity"];
						$totalAmount+=$totalItemPrice;
						echo '<td>'.$row["productQuantity"].'</td>';
						echo '<td>TK. '.$totalItemPrice.'</td></tr>';
						$sl = $sl + 1;
					} 
				?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan=5 class="text-center">Total</th>
						<th>TK. <?php echo $totalAmount; ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<?php
            $sql = 'select * from user where email="'.$_SESSION['email'].'"';
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result)
        ?>
		
		
		<div class="payment pt-5">		
			<div class="card px-4">
				<p class="h8 py-3">Payment Details</p>
					<div class="row gx-3">
						<div class="col-12">
								<div class="d-flex flex-column">
									<p class="text mb-1">Person Name</p> <input class="form-control mb-3" type="text" placeholder="Name" value="<?php echo $row['name']?>">
								</div>
						</div>
						<div class="col-12">
								<div class="d-flex flex-column">
									<p class="text mb-1">Card Number</p> <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
								</div>
						</div>
						<div class="col-6">
								<div class="d-flex flex-column">
									<p class="text mb-1">Expiry</p> <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
								</div>
						</div>
						<div class="col-6">
								<div class="d-flex flex-column">
									<p class="text mb-1">CVV/CVC</p> <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
								</div>
						</div>
						<div class="col-12">
								<a href="my_profile.php" class="btn btn-primary mb-3"> <span class="ps-3">Pay <?php echo''.$totalAmount.''.' ৳'; ?></span> <span class="bi bi-arrow-right-circle"></span> </a>
						</div>
					</div>
			</div>	
		</div>
            
<?php  
 	} 
	else{
            echo '<h2>Lets start shopping with Tech Arena :)</h2>';
        }
	} 
	else {
            echo '<h2>Please Log in</h2>';
    } 
?>
	</div>
</div>

<?php include 'footer.php'; ?>