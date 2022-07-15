<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';
?>


<body>
    <div class="header-bottom">
        <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                       <img class="d-block w-100" src="https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                       <img class="d-block w-100" src="https://www.itl.cat/pngfile/big/296-2960659_best-smartwatch-wallpaper-apple-watch-with-black-background.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                       <img class="d-block w-100" src="https://c4.wallpaperflare.com/wallpaper/834/602/559/computer-keyboards-wallpaper-preview.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                       <img class="d-block w-100" src="https://wallpaperaccess.com/full/829212.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                       <img class="d-block w-100" src="http://cdn.miscellaneoushi.com/4608x3072/20121018/headphones%20black%20red%20gray%20sony%20nikon%20still%20life%204608x3072%20wallpaper_www.miscellaneoushi.com_19.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next"  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>


    <div class="policy-area py-5">
        <div class="container">
            <div class="all-tag">
                <h2>Our Policy</h2>
            </div>
            
            <div class="row">
            <?php
                $sql = "SELECT * FROM policy";
                $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="col-md-3 col-12">
                    <div class="feature_box">
                        <img src="<?php echo $row['image']?>" class="feature_image">
                        <h6><?php echo $row['name']?></h6>
                        <p><?php echo $row['detail']?></p>
                    </div>
                </div>
            <?php 
                } 
            ?>
            
            </div>
        </div>
    </div>
	

    <div class="hot-product py-5">
        <div class="container">
            <div class="all-tag"> 
			   <h2>Feature Product</h2> 
			</div>
            <div class="row">
			
            <?php
                $sql = 'select * from featureproduct';
                $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $sql = 'select * from product where productID="'.$row['productID'].'"';
                    $result2 = mysqli_query($link, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    ?>

                    <div class="col-md-4">
                        <div class="hot-item-top"> <img src="<?php echo $row2['image']; ?>" class="img-fluid" alt="pic">
							<div class="hot-item-bottom">
								<h5><?php echo $row2['name']; ?></h5>
								<h6><?php echo $row2['price']; ?></h6> 

							<?php if(isset($_SESSION['userID'])){ ?>
								<a class="btn btn-sm btn-success mt-2 mb-3" role="button" href="cartintermediate.php?id=<?php echo $row2['productID']; ?>&target=add">Add to cart</a>
							<?php }else{?>
								<a class="btn btn-sm btn-warning mt-2 mb-3" role="button" onclick="alert('Login to continue')">Add to cart</a>
							<?php }?>
								<a class="btn btn-sm btn-info mt-2 mb-3" role="button" href="product.php?id=<?php echo $row2['productID']; ?>">Details</a>
							</div>
                        </div>						                       
                    </div>
            <?php 
                } 
            ?>
              
            </div>
            <div class="text-end">
                <a href="shop.php" class="btn btn-outline-primary" role="button" aria-disabled="true"> See More</a>				
            </div>			
        </div>
    </div>


    <section class="sliderb py-5">
        <div class="container">
            <div class="all-tag">
                <h2>Exclusive Product</h2> 
            </div>

            <div class="owl-carousel owl-theme">
            <?php
                $sql = 'select * from sliderbottom';
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    $sql = 'select * from product where productID="'.$row['productID'].'"';
                    $result2 = mysqli_query($link, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    ?>

                    <div id="item"> 
                        <img src="<?php echo $row2['image'];?>" alt="slide" class="img-fluid">
                        <?php if(isset($_SESSION['userID'])){ ?>
                            <a class="btn btn-sm btn-success mt-4 mb-3" role="button" href="cartintermediate.php?id=<?php echo $row2['productID']; ?>&target=add">Add to cart</a>&nbsp;&nbsp;&nbsp;
                        <?php } else{?>
                            <a class="btn btn-sm btn-warning mt-4 mb-3" role="button" onclick="alert('Login to continue')">Add to cart</a>
                        <?php }?>
                            <a class="btn btn-sm btn-info mt-4 mb-3" role="button" href="product.php?id=<?php echo $row2['productID']; ?>">Details</a>
                    </div>
            <?php 
                } 
            ?>
            </div>
        </div>
    </section>


    <div class="review-area">
        <div class="container">
            <div class="all-tag">
                <h2>Product Review</h2></div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="review-video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/wIaZ2bYRxUk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="promo sp-120">
        <div class="promo-overlay">
            <div class="container">
                <div class="promo-content">
                    <h2> <marquee scrollamount="12">Lets starts shopping now. <span><b>your bliss is just a click away! </marquee></b></span></h2>
                    <p>Leading Online Tech Shoping Site in Bangladesh.</p>
                </div>
            </div>
        </div>
    </section>

<?php 
	include 'footer.php';
?>
