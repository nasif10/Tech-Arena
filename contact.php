<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';

if(isset($_SESSION['userID'])){
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}

if(isset($_POST["sendMessage"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])){
  
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
	$message = $_POST["message"];
	
	date_default_timezone_set("Asia/Dhaka");
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO message (name, email, subject, description, date) VALUES ('".$name."', '".$email."', '".$subject."', '".$message."', '".$date."')";
    $resultInsert = mysqli_query($link, $sql);
       
    header('Location: contact.php');
}

?>


<section class="contact">
    <div class="container">
        <div class="all-tag">
            <h2>Keep in touch</h2>
         </div>

        <div class="row">
            <div class="col-md-6 mt-3 wow slideInLeft">
                <div class="contact-info rounded-3 shadow p-5">
                    <h5>Our Address</h5> <p>House #10, Road #10, Agargaon, Dhaka</p>
                    <h5>Call Us</h5> <p>+880 123 4567890<br>+880 098 7654321</p>
                    <h5>Email Us</h5> <p>consumer@techarena.com</p>
                </div>
            </div>


            <div class="col-md-6 mt-3 text-center wow slideInRight">
                <div class="rounded-3 shadow p-5">
                    <form method="post">
                        <input class="form-control mb-3" type="text" name="name" placeholder=" Name">
                        <input class="form-control mb-3" type="email" name="email" placeholder=" Email" required>
                        <input class="form-control mb-3" type="text" name="subject" placeholder=" Subject">
                        <textarea class="form-control mb-3" name="message" id="" cols="8" rows="3" placeholder=" Message" required></textarea>
                        <div class="d-grid gap-2">
                            <input class="btn btn-outline-warning" type="submit" name="sendMessage" value="Send Message"/> 
                        </div>
                    </form>
                </div>     
            </div>
        </div>
		
		<div class="all-tag pt-5">
            <h2>Location</h2>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7302.229723303562!2d90.36813317250717!3d23.77892380637304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0b0f09aac43%3A0xf86561e78ef39ed9!2z4KaG4KaX4Ka-4Kaw4KaX4Ka-4KaB4KaTLCDgpqLgpr7gppXgpr4!5e0!3m2!1sbn!2sbd!4v1637421856438!5m2!1sbn!2sbd" width="720" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
	include 'footer.php';
?>
