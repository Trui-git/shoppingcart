<?php
    require('views/header.php');
    $prod_count = 0;
    if(isset($_GET['catID']))
	{
		$cat_type = $_GET['catID'];
        $products = get_products($cat_type);  
        $prod_count = count(array($products));
	}
	else
	{ 
        $cat_type = 0;
	}
?>

<?php 
    require('views/nav.php');
?>

<main>
    <form method="post" action="product.php">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php if($prod_count > 0) { ?>
                        <?php $count = 0; ?>       
                        <?php $productIDs = get_product_id_by_cat($cat_type);?>
                        <?php foreach($productIDs as $productID) : ?>
                        <?php $images = get_product_image($productID['productID']);?>
                        <?php $productInfo = get_product_info_by_id($productID['productID']);?>
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="<?php echo 'assets/images/' . $images[0]; ?>" />
                                <h4><?php echo $productInfo['productName']; ?></h4>
                                <h4><?php echo '$' . $productInfo['price']; ?></h4>
                            </div> 
                            <div class="card-body">                               
                                <a class="btn btn-primary" href="product.php?productID=<?php echo $productID['productID']; ?>">
                                    View more...               
                                </a>
                            </div>                               
                        </div>                          
                        <?php $count++; ?>
                        <?php endforeach; ?>
                        <?php } ?>                    
                    </div>
                </div> <!-- end of col-md-12 -->
            </div>  <!-- end of row -->
        </div> <!-- end of container-fluid -->
    </form>  <!-- end of form -->

</main>

<?php
    require('views/footer.php');
?>