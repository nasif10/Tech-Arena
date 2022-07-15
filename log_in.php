<?php 
include 'connection.php';
session_start(); 
include 'header.php';
include 'nav.php';

error_reporting(0);

if(isset($_SESSION['email'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($link, $sql) or die (mysqli_error($link));
	$noOfRows = mysqli_num_rows($result);

	if ($noOfRows>0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['userID'] = $row['userID'];
		header("Location: index.php");
	} 
	else{
		echo "<script>alert('Email or Password is Wrong!')</script>";
	}
}

?>

<div class="login-area d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-5 mx-auto">
				<div class="card">
					<div class="card-header text-center">
						<h4>Sign In</h4>
					</div>
					<div class="card-body">
						<div class="loginbox p-4"> 
							<form method="post">
								<div class="mb-3">
									<input type="email" class="form-control" placeholder="Enter Email" name="email" required>	
								</div>
								<div class="mb-3">
									<input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
								</div>
								<div class="d-grid mb-3">
									<input class="btn btn-outline-success" type="submit" name="submit" value="Login">
								</div>
								<div class="mb-3">
									<a href="sign_up.php">Don't have an account? Register</a>
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
