<?php
include 'connection.php';
session_start();

include 'header.php';
include 'nav.php';


$id = $_GET['id'];

$sql = 'select * from product where productID="'.$id.'"';
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if($row['OnSaleStatus']==1 && !(isset($_SESSION['userID'])))
header("Location: shop.php");


if(isset($_POST["addCart"])){
    if(isset($_SESSION["userID"]))
        header('Location: cartintermediate.php?id='.$id.'&target=add'); 
}

?>

<body>
<div class="our-products">
        <div class="container">
            <div class="all-tag pt-5">
                <h2>Product details</h2>
            </div>
            <?php 
                if($count>0){ 
            ?>
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="product-image">
                            <img src="<?php echo $row['image'];?>" class="img-fluid rounded-start" alt="pic">
                        </div>    
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ms-5">
                            <h2 class="card-title border-bottom pb-3"><?php echo $row['name'];?></h2>
                            <p class="card-text pt-3"> <b>Details : </b><?php echo $row['description']; ?></p>

                            <?php
                                if($row['OnSaleStatus']==1) {
                                    $discountedPrice = $row['price'] - $row['price'] * $row['DiscountPercent']/100;
                                    echo '<h3 class="card-title pt-3">TK. <s>'.$row['price'].'</s> '.$discountedPrice.'</h3>';							 
                                }
                                else{
                                    echo '<h3 class="card-title pt-3">TK. '.$row['price'].'</h3>';
                                }
                        ?>
                                

                            <form method="post">
                            <?php if(isset($_SESSION['userID'])){ 
                            ?>
                                <input class="btn btn-sm btn-outline-primary mt-4" type="submit" name="addCart" value="Add to cart">
                            <?php } 
                                else{
                            ?>
                                <input class="btn btn-sm btn-outline-primary mt-4" type="submit" name="addCart" onclick="alert('Login to continue')" value="Add to cart">
                            <?php }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    <?php 
        } 
        else{ 
            echo '<h3>No product found</h3>';
        }
    ?>

</div>

<?php include 'footer.php'; ?>