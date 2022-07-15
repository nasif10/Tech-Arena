<?php
include 'connection.php';
include 'header.php';


if(isset($_POST['addc'])){
    if(isset($_POST['category'])){
        $sql = 'insert into category (categoryname) values ("'.$_POST['category'].'")';
        mysqli_query($link, $sql);
    }
}

if(isset($_POST['remove'])){
    if(isset($_POST['id'])){
        $sql = 'delete from product where productID="'.$_POST['id'].'"';
        mysqli_query($link, $sql);
    }
}

?>

<body style="background: #f4f5f9;">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark bg-gradient">
	<div class="col-md-2 ms-2">
		<div class="logo animation wow zoomIn">
            <a class="navbar-brand" href="">
                <img src="image/logo.png" alt="" class="rounded" width="100" height="65">
            </a>			 
		</div>
	</div>
	<h3 class="navbar-text ms-auto pe-3" style="color:#FFFFFF;font-family: Arial, Helvetica, sans-serif;font-weight: 700;">
        Welcome Admin
    </h3>
</nav>


<section class="admin-area">
    <div class="container">      
        <div class="btn-group filter-button-group pb-2 pt-4" role="group">
            <button class="btn btn-outline-primary" data-filter="*" class="active">All</button>
			<button class="btn btn-outline-primary" data-filter=".dash">Dashboard</button>
            <button class="btn btn-outline-primary" data-filter=".atable">Product Table</button>
			<button class="btn btn-outline-primary" data-filter=".addcategory">Add Category</button>
            <button class="btn btn-outline-primary"><a href="admin-add.php" style="text-decoration: none;">Add Product</a></button>			
            <button class="btn btn-outline-primary"><a href="admin-edit.php" style="text-decoration: none;">Edit Product</a></button>
			<button class="btn btn-outline-primary" data-filter=".removeform">Remove product</button>
			<button class="btn btn-outline-primary" data-filter=".incometable">Income</button>
			<button class="btn btn-outline-primary" data-filter=".msg">Messages</button>
        </div>
		
        <div class="row grid">
			<div class="col-md-12 grid-item dash">
                <h3 class="pt-4 pb-3">Dashboard</h3>
				 <div class="row">
					<div class="col-md-4">
						<?php
							$sql = 'select COUNT(productID) from product';
							$result = mysqli_query($link, $sql);
							$row = mysqli_fetch_assoc($result);
						?>	
						<div class="detail-box">
							<span class="count"><?php echo $row['COUNT(productID)']; ?></span>
							<span class="count-tag">Products</span>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="detail-box">
							<?php
								$sql = 'select COUNT(brandID) from brand';
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_assoc($result);
							?>
							<span class="count"><?php echo $row['COUNT(brandID)']; ?></span>
							<span class="count-tag">Brands</span>
						</div>
					</div>
					
					<div class="col-md-4">
						<?php
							$sql = 'select COUNT(categoryID) from category';
							$result = mysqli_query($link, $sql);
							$row = mysqli_fetch_assoc($result);
						?>
						<div class="detail-box">
							<span class="count"><?php echo $row['COUNT(categoryID)']; ?></span>
							<span class="count-tag">Categories</span>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="detail-box">
							<?php
								$sql = 'select COUNT(OnSaleStatus) from product where OnSaleStatus="1"';
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_assoc($result);
							?>
							<span class="count"><?php echo $row['COUNT(OnSaleStatus)']; ?></span>
							<span class="count-tag">Products On Sale</span>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="detail-box">
							<?php
								$sql = 'select COUNT(orderID) from ordertable';
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_assoc($result);
							?>
							<span class="count"><?php echo $row['COUNT(orderID)']; ?></span>
							<span class="count-tag">Orders</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="detail-box">
							<?php
								$sql = 'select COUNT(userID) from user';
								$result = mysqli_query($link, $sql);
								$row = mysqli_fetch_assoc($result);
							?>
							<span class="count"><?php echo $row['COUNT(userID)']; ?></span>
							<span class="count-tag">Customers</span>
						</div>
					</div>
				</div>	
            </div>
		
		
            <div class="col-md-12 grid-item atable">
				<h3 class="pt-4 pb-3">Product Table</h3> 
                <div class="admin-table" style="overflow: auto;height: 300px;">             
                    <table class="table" cellpadding="7">
                        <thead class="table-success">
                            <th>#</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price/Unit</th>
							<th>On Sale Status</th>
							<th>Discount </th>
							<th></th>
                        </thead>
                        <?php
                        $sql = 'select * from product';
                        $result = mysqli_query($link, $sql);
                        $sl = 1;

                        while($row = mysqli_fetch_assoc($result)) {
						?>	
                        <tr>
                            <td><?php echo $sl; ?> </td>
                            <td><?php echo $row['productID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['price']; ?></td>
							<td><?php echo $row['OnSaleStatus']; ?></td>
							<td><?php echo $row['DiscountPercent']; ?></td>
							<td>
								<a role="button" href='admin-edit.php?id=<?php echo $row['productID']; ?>'><i class="bi bi-pencil-square" style="padding: 0px 5px; color: Orange;"></i></a>
								<a role="button" href='delete-inline.php?pid=<?php echo $row['productID']; ?>'><i class="bi bi-trash" style="padding: 0px 5px; color: #df4759;"></i></a>
							</td>
                        </tr>
                            
						<?php
							$sl = $sl + 1;
						}
                        ?>
                    </table>
									
                </div>
            </div>
			
			
			<div class="col-md-12 grid-item pt-3 addcategory">
                <h3 class="pt-4 pb-3">Add Category</h3>
                <form method="post">
                      <input class="form-control mb-3" type="text" name="category" placeholder="Category" required>
                      <input class="btn btn-outline-success" type="submit" name="addc" value="Add Category"> 
				</form>
            </div>
											
            <div class="col-md-12 grid-item pt-4 removeform">
                    <h3 class="pt-4 pb-3">Remove Product</h3>
                    <form method="post">
                        <input class="form-control mb-3" type="number" name="id" placeholder="Product ID" required>
                        <input class="btn btn-warning" type="submit" name="remove" value="Remove" style="margin-bottom: 50px;"> 
					</form>
            </div>
			
			
			
			<div class="col-md-12 grid-item incometable">
                    <h3 class="pt-4 pb-3">Income</h3> 

                    <table class="table" cellpadding="8">
                        <thead class="table-info">
                            <th scope="col">Invoice No.</th>
							<th scope="col">Date</th>
							<th scope="col">Amount</th>
                        </thead>
                        <?php
                        $sql2 = 'select * from bill';
                        $result2 = mysqli_query($link, $sql2);

                        while($row = mysqli_fetch_assoc($result2)) {
                            echo '<tr>';
                            echo '<td>'.$row['Invoice No.'].'</td>';
                            echo '<td>'.$row['datetime'].'</td>';
							echo '<td>'.$row['TotalAmount'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
					
					<div class="mt-5">
                    <?php
                        $sql3 = 'select SUM(TotalAmount) from bill';
                        $result3 = mysqli_query($link, $sql3);
						$row = mysqli_fetch_assoc($result3);
                        echo "<h4 class='border border-info p-1' style='text-align: center;'>Total Income : ".$row['SUM(TotalAmount)']."</h4>";
                    ?>					
					</div>
            </div>
			
			<div class="col-md-12 grid-item pt-3 msg">
                    <h3 class="pt-4 pb-3">Messages</h3>
                    <table class="table" cellpadding="8">
                        <thead class="table-secondary">
                            <th scope="col">No.</th>
							<th scope="col">Date/Time</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Subject</th>
							<th scope="col">Description</th>
                        </thead>
                        <?php
                        $sql2 = 'select * from message';
                        $result2 = mysqli_query($link, $sql2);

                        while($row = mysqli_fetch_assoc($result2)) {
                            echo '<tr>';
								echo '<td>'.$row['messageID'].'</td>';
								echo '<td>'.$row['date'].'</td>';
								echo '<td>'.$row['name'].'</td>';
								echo '<td>'.$row['email'].'</td>';
								echo '<td>'.$row['subject'].'</td>';
								echo '<td>'.$row['description'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
            </div>
			
			
        </div>
    </div>
    
</section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="css/main.js"></script>
    <script> new WOW().init(); </script>
</body>

</html>	