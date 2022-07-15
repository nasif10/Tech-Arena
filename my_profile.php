<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';
?>

<body>
<div class="profile-area py-5" >
    <div class="container">

	    <?php
		if(isset($_SESSION['userID'])){
            $sql = 'select * from user where email="'.$_SESSION['email'].'"';
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result)
        ?>
        <div class="all-tag">
            <h2><?php echo $row['name']?>'s Profile</h2> 
        </div>
    

   
        <div class="my-profile">
        <?php
            $sql = 'select * from user where email="'.$_SESSION['email'].'"';
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result)
        ?>
          
            <table class="table">
                <thead>
                    <tr>
                        <td><b>Name:</b> <?php echo $row['name']?></td>
                        <td><b>Email: </b> <?php echo $row['email']?></td>
                        <td><b>Phone: </b> <?php echo $row['phone']?></td>
                    </tr>
                </thead>
            </table>  
            
            <div class="text-end">
                <form method="post">
                    <button type="button" onClick="location.href='edit_profile.php'" class="btn btn-sm btn-outline-primary">Edit Profile</button> 
                </form>
            </div>
        </div>
    <?php
        $sql = 'select * from bill where userID="'.$_SESSION['userID'].'"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count>0){
    ?>
        <div class="pt-5 pb-3 justify-content-center">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th>Invoice. No.</th>
                            <th>Order ID</th>
                            <th>Total Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
					
                    <?php
                        $sl=1;
                        while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr>
							          <td>'.$row["Invoice No."].'</td>';
                                echo '<td>'.$row["orderID"].'</td>';
								echo '<td>'.$row["TotalAmount"].'</td>';
                                echo '<td>'.$row["datetime"].'</td>';
							echo'<tr>';                              
                        }
                    ?>					
                </table>
        </div>
		
<?php   } 
        else {
            echo '<h2>Lets start shopping with Tech Arena</h2>';
        }
    } 
	else{
		echo '<h2>Please Log in</h2>';
	} 
?>
		
</div>
</div>

	
<?php 
	include "footer.php";
?>
