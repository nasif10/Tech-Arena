<?php
include 'connection.php';
include 'header.php';

$name = '';
$price = '';
$category = '';
$image = '';
$description = '';

if(isset($_POST['add'])){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['OnSaleStatus']) && isset($_POST['DiscountPercent'])) {
        	 
		$sql = 'insert into product (name, price, description, category, image, OnSaleStatus, DiscountPercent) values ("' . $_POST['name'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '", "' . $_POST['category'] . '", "' . $_POST['image'] . '", "' . $_POST['OnSaleStatus'] . '", "' . $_POST['DiscountPercent'] . '")';
        mysqli_query($link, $sql);
        header('Location: admin-add.php');
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
			<div class="col-md-12 grid-item pt-4 addform">
                <h3 class="pt-4 pb-3">Add Product</h3> 
                <form method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<div class="row">
								<div class="col">
									<input class="form-control" type="text"  name="name" placeholder="Product Name" required>
								</div>
								<div class="col">
									<input class="form-control" type="number"  name="price" placeholder="Price" required>
								</div>
							</div>		
						</div>	
						
						<div class="mb-3">
							<div class="row">
								<div class="col">				
									<select class="form-select "name="category">
										<option value="" disabled selected>Select category</option>													
										<?php
										 $sql = "select categoryname from category";
										 $result = mysqli_query($link, $sql);
										 $count = mysqli_num_rows($result);

										 while ($row = mysqli_fetch_assoc($result)) { ?>
												 <option value="<?php echo $row['categoryname'] ?>" style="text-transform: capitalize;"><?php echo $row['categoryname'] ?></option>
										<?php } ?>																														
									</select>
								</div>
								<div class="col">
									<input class="form-control mb-3" type="text" name="image" placeholder="Image URL">
								</div>
							</div>		
						</div>
					   
					   <div class="mb-3">
							<textarea class="form-control" name="description" id="" rows="3" placeholder="Desceiption"></textarea>
					   </div>
					   
					   <div class="mb-3">
							<div class="row">
								<div class="col">
									<input class="form-control mb-3" type="number" name="OnSaleStatus" placeholder="On Sale Status">
								</div>
								<div class="col">
									<input class="form-control mb-3" type="number" name="DiscountPercent" placeholder="Discount Percent"></textarea>
								</div>
							</div>		
						</div>
                        <input class="btn btn-success" type="submit" name="add" value="Add Product"> 
				</form>
        	</div>     
	</div>
</section>