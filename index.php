<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM products WHERE id={$id}";
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
        }else{
            $message="Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header.php'); ?>
</head>
<body class="">
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="furniture-container homepage-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                        <?php include('includes/side-menu.php');?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                        <div id="hero" class="homepage-slider3">
                            <!-- Carousel content -->
                        </div>

                        <div class="info-boxes wow fadeInUp">
                            <!-- Info Boxes Content -->
                        </div>

                        <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs wow fadeInUp">
                            <!-- Tabs Content -->
                        </div>

                        <!-- REMOVED FEATURED PRODUCTS SECTION -->

                    </div>
                </div>

                <!-- REMOVED FOOTER -->
                <?php include('includes/footer.php');?>
                <!-- FOOTER END -->
            </div><!-- /.furniture-container -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <!-- JS Scripts -->
    <?php include('includes/scripts.php'); ?>
</body>
</html>
