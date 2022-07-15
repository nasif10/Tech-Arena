<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';
?>

<body>
<div class="about-area">
    <section class="sec1">
        <div class="container">
            <div class="about-title wow zoomIn"> 
                <h1>TECH ARENA</h1> 
            </div>
            <h3>Largest Online Tech Shopping Site In Bangladesh.</h3> 
        </div>
    </section>

    <section class="sec2">
        <h1>ABOUT US</h1>
        <p>Welcome to Tech Arena, the place to find the best tech goods for every taste and occasion. We thoroughly check the quality of our goods, working only with reliable suppliers so that you only receive the best quality product.<br>
        <br>We believe in high quality and exceptional customer service. But most importantly, we believe shopping is a right, not a luxury, so we strive to deliver the best products at the most affordable prices, and ship them to you regardless of where you are located.  </p>
    </section>


    <section class="sec3 text-center">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="inner text">
                        <h3>The Brand That Cares For You</h3>
                        <p> This is TECH ARENA! A Brand that is Truly concerned about its customers and loyally provides all the needs of the customers.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="inner">
                        <img src="https://www.gizmochina.com/wp-content/uploads/2020/11/realme-watch-s.png" alt="image">
                    </div>
                </div>
                <div class="col-4">
                    <div class="inner text">
                        <h3>our strategy</h3>
                        <p>We are a Tech-based product seller. We are providing our customers with the best quality products at the most reasonable price. We have varieties of products that our customers can choose from. </p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <div class="inner">
                        <img src="https://static1.anpoimages.com/wordpress/wp-content/uploads/2020/06/05/TCL-Android-TV.png?q=50&fit=contain&w=1500&h=&dpr=1.5" alt="image">
                    </div>
                </div>
                <div class="col-4">
                    <div class="inner text black">
                        <h3>our mission</h3>
                        <p>We are Tech Arena, and we are here to help you with all your technology needs. We aim to provide all the requirements of our customers and help them satisfy their needs, wants, and desires.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="inner">
                        <img src="https://assets.newatlas.com/dims4/default/2cacfc9/2147483647/strip/true/crop/1600x1067+0+0/resize/1200x800!/format/webp/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2F5e%2F80%2F91b128ad4ad0be5266f787cb4cfb%2F00-xiaomi.jpg" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	<section class="sec4 p-5">
        <div class="container">
            <div class="team-title wow zoomIn"> 
				<h3 class="pb-4">Meet The Team</h3> 
			</div>
			
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img src="https://hpsystems.com.tr/tema/genel/uploads/ekibimiz/vote_1.png" class="card-img-top" width="275" height="275" alt="Nasif">
                        <div class="card-body text-center">
                            <h4 class="card-title">Nasif</h4>
                            <p class="card-text">CEO & Founder</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-primary">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 20rem;"> 
                        <img src="https://cdn1.iconfinder.com/data/icons/people-49/512/_nerd_man-512.png" class="card-img-top" width="275" height="275" alt="Zahid">
                        <div class="card-body text-center">
                            <h4 class="card-title">Zahid</h4>
                            <p class="card-text">Director</p>                  
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-primary">Contact</a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
      </section>
	
    
    <section class="sec5">
        <section class="overlay2">
            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <h3>We look forward to doing great things with you  anywhere in the country.</h3>
                    </div>
                </div>
                <div class="col-md-5">
					<a href="contact.php" class="btn btn-outline-warning"  role="button" style="margin-left: 340px; margin-top: 10px;"> CONTACT US </a>
                </div>
            </div>
        </section>
    </section>
	
</div>

<?php 
	include 'footer.php';
?>
