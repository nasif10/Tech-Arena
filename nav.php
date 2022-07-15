<nav class="navbar navbar-expand-sm navbar-dark bg-secondary bg-gradient">
	
	<div class="col-md-2 ms-2">
		<div class="logo animation wow zoomIn">
            <a class="navbar-brand" href="index.php">
                <img src="image/logo.png" alt="" class="rounded" width="80" height="52">
            </a>			 
		</div>
	</div>
	
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
    </button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ms-auto mx-5">
			<li class="nav-item active">
				<a class="nav-link" href="index.php"><b>Home</b></a>
			</li> 
			<li class="nav-item">
				<a class="nav-link" href="about_us.php"><b>About Us</b></a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="shop.php"><b>Shop</b></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="contact.php"><b>Contact</b></a>
			</li>
					 
			<?php
				if(isset($_SESSION['email'])){
					echo '<li class="nav-item"><a class="nav-link" href="my_profile.php"><b>My Profile</b></a></li>';					
				}

				if (isset($_SESSION['userID'])) {
					echo '<li class="nav-item"><a class="nav-link" href="log_out.php"><b>Logout</b></a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="cart.php"><i class="bi bi-cart-check"></i></a></li>';					
				} 
				else{
					echo '<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="log_in.php" data-bs-toggle="dropdown" aria-expanded="false"><b>Login</b></a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="log_in.php">Login</a></li>
									<li><a class="dropdown-item" href="sign_up.php">Sign Up</a></li>
								</ul>
						  </li>';
				} 
			?>
		</ul>
	</div>
 </nav>
 