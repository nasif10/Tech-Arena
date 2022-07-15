<?php
include 'connection.php';
session_start();
include 'header.php';
include 'nav.php';

$name = '';
$email = '';
$phone = '';
$password = '';
$error = '';
$userID = $_SESSION['userID'];

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["edit"])){

    $name = clean_text($_POST["name"]);
    $email = clean_text($_POST["email"]);
    $phone = clean_text($_POST["phone"]);
    $password = clean_text(md5($_POST["password"]));
	   

    $sql = "update user set name='$name',email='$email' ,phone='$phone' ,password='$password' where userID= '$userID' ";
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $resultInsert = mysqli_query($link, $sql);

    $sql = 'select userID from user where email="'.$email.'"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userID'] = $row['userID'];

    header('Location: my_profile.php');
}

?>

<body>
<div class="login-area d-flex align-items-center">
    	<div class="container">
		<div class="row">
			<div class="col-5 mx-auto">
				<div class="card">
					<div class="card-header text-center">
						<h4>Edit Profile</h4>
					</div>
					<div class="card-body">
                        <div class="loginbox p-4">                     
                            <form method="post">
                            
                                <?php 	$sql = 'select * from user where email="'.$_SESSION['email'].'"';
                                        $result = mysqli_query($link, $sql);
                                        $row = mysqli_fetch_array($result) 
                                ?>
                                        
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="<?php echo $row['name']?>" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="<?php echo $row['email']?>" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="<?php echo $row['phone']?>" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="<?php echo $row['password']?>" required>
                                </div>
                                <div class="d-grid mb-3">
                                    <input class="btn btn-outline-success" type="submit" name="edit" value="Confirm">
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
  