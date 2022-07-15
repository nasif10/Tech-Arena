<?php
include 'connection.php';
session_start();
include 'header.php';
include 'nav.php';

if(isset($_POST["signup"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = md5( $_POST["password"]);


    $sql = 'INSERT INTO user (name, email, phone, password) VALUES("'.$name.'", "'.$email.'", "'.$phone.'", "'.$password.'")';
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $resultInsert = mysqli_query($link, $sql);

    $sql = 'select userID from user where email="'.$email.'"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userID'] = $row['userID'];
	$_SESSION['name'] = $row['name'];

    header('Location: index.php');
}
?>


<div class="login-area pt-5">
	<div class="container">
		<div class="row">
			<div class="col-5 mx-auto">
				<div class="card">
					<div class="card-header text-center">
						<h4>Sign Up</h4>
					</div>
					<div class="card-body">
						<div class="loginbox p-4">
							<form method="post">
								<div class="mb-3">
									<input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
								</div>
								<div class="mb-3">
									<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
								</div>
								<div class="mb-3">
									<input type="password" class="form-control" name="password" placeholder="Enter Password">
								</div>
								<div class="d-grid mb-3">
									<input class="btn btn-outline-success" type="submit" name="signup" value="Sign Up">
								</div>
								<div class="mb-3">
									<a href="log_in.php">Have an account? Login Here</a>
								</div>																									
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>				
</div>

<?php 
	include 'footer.php';
?>