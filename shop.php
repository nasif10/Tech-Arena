<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';
?>

<section class="product-area">
	<div class="container">
		<div class="row py-4">
			<div class="col">
				<div class="btn-group filter-button-group" role="group">	
					<a href="/Tech-Arena/shop.php" class="btn btn-outline-primary">All</a>		
					<?php
						$sql = "select DISTINCT category from product";
						$result = mysqli_query($link, $sql);
						$count = mysqli_num_rows($result);

						while ($row = mysqli_fetch_assoc($result)) { 
							echo '<a href="/Tech-Arena/shop.php?category='.$row['category'].'" class="btn btn-outline-primary" style="text-transform: capitalize;">'.$row["category"].'</a>';
						} 

						
						if(isset($_SESSION['userID'])){
							echo '<a href="/Tech-Arena/shop.php?OnSaleStatus=1" class="btn btn-outline-success">On Sale</a>';                                  
						}
					?>
				</div>
			</div>
			
			<div class="col col-3">
				<form class="d-flex justify-content-end" action="" method="get">
				<input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>

		<div class="marq">
		<?php
			if(!isset($_SESSION['userID'])){
				echo '<h4 style="color:red; background-color: lightblue; margin-bottom: 40px;"><marquee direction="left" height="30px" scrollamount="12"> Log in to see products On Sale !</marquee></h4>';
			}
			?> 
		</div>


		<div class="row">
		<?php
			$sql = '';

			if (isset($_GET['category'])) {
				$category = $_GET['category'];
				$sql = "select * from product where category = '{$category}' and OnSaleStatus=0";
			}
			else if(isset($_GET['search']) && !isset($_SESSION['userID'])){
				$src = $_GET['search'];
				$sql = "select * from product where name LIKE '%$src%' AND OnSaleStatus=0";
			}
			else if(isset($_GET['search']) && isset($_SESSION['userID'])){
				$src = $_GET['search'];
				$sql = "select * from product where name LIKE '%$src%'";
			}
			else if(isset($_GET['OnSaleStatus']) && isset($_SESSION['userID'])){
				$sql="select *from product where OnSaleStatus = 1";
			}	
			else if(isset($_GET['OnSaleStatus']) && !(isset($_SESSION['userID']))){
				header("Location: shop.php");;
			}	
			else{
				$sql = "select * from product where OnSaleStatus=0";
			}

			$result = mysqli_query($link, $sql);
			$count = mysqli_num_rows($result);
			
			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
		?>
				<div class="col-md-3 pb-3">
					<div class="card h-100">
						<img src="<?php echo $row['image'] ?>" class="img-fluid" alt="pic">
							
						<div class="card-body">
							<h5 class="card-title"><?php echo $row['name'] ?></h5>
								
							<?php
								if($row['OnSaleStatus']==1){
									$discountedPrice = $row['price']-$row['price']*$row['DiscountPercent']/100;							
									echo '<p class="card-text">Price: <s>'.$row['price'].'</s> '.$discountedPrice.'</p>';										
								}
								else
									echo '<p class="card-text">Price: '.$row['price'].'</p>';
							?>	

							<div class="d-flex">
								<a href="product.php?id=<?php echo $row['productID']; ?>" class="btn btn-sm btn-outline-secondary">Details</a>	
								<div class="ms-auto">
									<?php  	if(isset($_SESSION['userID'])){
												echo '<a href="cartintermediate.php?id='.$row['productID'].'&target=add" class="btn btn-sm btn-outline-success card-link">Add to cart</a>';
											}else{
									?>
												<button type="button" class="btn btn-sm btn-outline-success" name="addcart" title="Add to Cart" onclick="alert('Login to continue')">Add to cart</button>
									<?php }
									?>																		
								</div>
							</div>
							</div>
						</div>
					</div>
					<?php
				}
			} 
			else{
				echo '<h3>There is no product to show</h3>';
			} 
		?>

		</div>
	</div>	
</section>

<?php include 'footer.php'; ?>