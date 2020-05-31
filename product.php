<?php
    require('views/header.php');

    $productID = 0;
    if(isset($_GET['productID']))
	{
        $productID = $_GET['productID'];  
        $_SESSION['productID'] = $_GET['productID']; // $productID is lost when Form posting some value
        $images = get_product_image($productID);
        $images_count = count($images);
	}
    
    if(isset($_POST['qty'])) {
        if(isset($_SESSION['sessionUserID'])) {
            if($_SESSION['sessionUserID'] != "")
            {
                $cartID = 0;
                $userID = $_SESSION['sessionUserID'];
                // get any open carts for user
                $cart = check_for_cart($_SESSION['sessionUserID']);
                $result = $cart->fetch();
                if($result)
                {
                    $cartID = $result[0];
                    add_item($_POST['qty'], $_SESSION['productID'], $cartID);
                }
                else
                {
                    // no cart for you potter
                    create_cart($_SESSION['sessionUserID']);
                    add_item($_POST['qty'], $_SESSION['productID'], $cartID);
                }
            }   
        }     
    }
?>

<?php
    require('views/nav.php');
?>

<main>
    <form method="post" action="product.php?productID=<?php echo $_SESSION['productID']?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php if($productID > 0) { ?>                  
                           
                        <div class="col-sm-6">    
                            <?php $productInfo = get_product_info_by_id($productID);?>

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    <?php 
                                        for($i=0; $i<$images_count; $i++)  
                                        {
                                            if ($i==0)
                                                $active = "active";
                                            else
                                            $active = "";
                                    ?>
                                        <div class="carousel-item <?php echo $active?> ">
                                            <img src="<?php echo 'assets/images/' . $images[$i]; ?>">
                                        </div>  
                                    <?php } ?>  

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>  <!-- end of col-sm-6 -->     
                                                  
                        <div class="col-sm-6">
                            <h4><?php echo $productInfo['productName']; ?></h4>
                            <h4><?php echo '$' . $productInfo['price']; ?></h4>
                            <p><?php echo $productInfo['productDesc']; ?></p>
                            <div class="cart-body">          
                                <div class="product-button">
                                    <input id="qty" type="number" value='1' name="qty" min="1">
                                    <button class="btn btn-primary" type="submit">Add to Cart </button>
                                </div>                                       
                            </div> 
                        </div>  <!-- end of col-sm-6 -->      
                        <?php } ?> <!-- end of if($productID > 0) -->                   
                    </div>
                </div> <!-- end of col-md-12 -->
            </div> <!-- end of row -->
        </div> <!-- end of container-fluid -->
    </form> <!-- end of form -->
</main>
<?php
    require('views/footer.php');
?>