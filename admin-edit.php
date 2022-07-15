<?php
include 'connection.php';
include 'header.php';

if(isset($_POST['edit'])){
    if(isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['OnSaleStatus']) && isset($_POST['DiscountPercent'])) {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $des = $_POST['description'];
        $cat = $_POST['category'];
        $img = $_POST['image'];
        $oss = $_POST['OnSaleStatus'];
        $dp = $_POST['DiscountPercent'];
        
        
		$sql = "UPDATE product SET name = '{$name}', price = '{$price}', description = '{$des}', category = '{$cat}', image = '{$img}', OnSaleStatus = '{$oss}', DiscountPercent = '{$dp}' WHERE productID = {$pid}";
        mysqli_query($link, $sql);
        header('Location: admin-edit.php');
    }
    else 
		echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
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
	<ul class="navbar-nav ms-auto mx-5">
		<li class="nav-item active">
			<a class="nav-link" href="admin.php"><b>Home</b></a>
		</li>
	</ul>	

</nav>

<section class="admin-area">
    <div class="container">
        <div class="col-md-12 grid-item pt-4 editform">
                <h3 class="pt-4 pb-3">Edit Product</h3>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="row pb-3 border-bottom">
						<label class="col-sm-2 col-form-label">Product Id</label>
						<div class="col-sm-8">
							<input class="form-control" type="text"  name="pid" placeholder="Product Id" required>	
						</div>	
						<div class="col-sm-2" style="text-align: right;">
							<input class="btn btn-outline-info mb-3 mx-auto" type="submit" name="showbtn" value="Show">	
						</div>
					</div>
				</form>

				<?php
					if(isset($_POST['showbtn']) || (isset($_GET['id']))){
						$pid = isset($_GET['id']) ? $_GET['id'] : '';
							if($pid){
								$pid = $_GET['id'];
							}else{
								$pid = $_POST['pid'];
							}				        

							$sql = "SELECT * FROM product WHERE productID = {$pid}";
							$result = mysqli_query($link, $sql) or die("Query Unsuccessful.");

							if(mysqli_num_rows($result) > 0)  {
								while($row = mysqli_fetch_assoc($result)){
					?>						

                    <form method="post" enctype="multipart/form-data">
						<div class="mb-4 pt-3">
							<div class="row">
								<input class="form-control" type="hidden" name="pid"  value="<?php echo $row['productID']; ?>" />
							</div>	
							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="col-sm-2 col-form-label">Name</label>
									<input class="form-control" type="text"  name="name" value="<?php echo $row['name']; ?>" required>			
								</div>
								<div class="col-md-6 mb-3">
									<label class="col-sm-2 col-form-label">Price</label>
									<input class="form-control" type="number"  name="price" value="<?php echo $row['price']; ?>" required>
								</div>

								<div class="col-md-6 mb-2">	
									<label class="col-sm-2 col-form-label">Category</label>		
									<select class="form-select "name="category">
										<option value="" disabled selected>Select category</option>													
										<?php
											$sql = "select categoryname from category";
											$result = mysqli_query($link, $sql);
											$count = mysqli_num_rows($result);

											while ($row1 = mysqli_fetch_assoc($result)) {
												if($row['category'] == $row1['categoryname']){
													$select = "selected";
												}
												else $select = "";
												echo "<option {$select} value='{$row1['categoryname']}' style='text-transform: capitalize;'>{$row1['categoryname']}</option>";
											} 
										?>																														
									</select>	
								</div>
								<div class="col-md-6 mb-2">
									<label class="col-sm-2 col-form-label">Image URL</label>	
									<input class="form-control mb-3" type="text" name="image" value="<?php echo $row['image']; ?>">	
								</div>

								<div class="col-12 mb-2">
									<div class="row">
									<label class="col-sm-2 col-form-label">Description</label>	
										<div class="col-sm-10">	
											<textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
										</div>
									</div>
								</div>


								<div class="col-md-6">
									<div class="row">	
										<label class="col-sm-4 col-form-label">On Sale Status</label>
										<div class="col-sm-8">	
											<input class="form-control" type="number" name="OnSaleStatus" value="<?php echo $row['OnSaleStatus']; ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
										<label class="col-sm-4 col-form-label">Discount Percent</label>
										<div class="col-sm-8">	
											<input class="form-control" type="number" name="DiscountPercent" value="<?php echo $row['DiscountPercent']; ?>">
										</div>
									</div>
								</div>

							</div>		
						</div>	
			
                        <input class="btn btn-success" type="submit" name="edit" value="Update"> 
			    </form>
				<?php
						}
					}
				}
				?>
        </div> 
    </div>
</section>   