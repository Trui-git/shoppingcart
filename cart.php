<?php 

    require('views/header.php');
    $item_count = 0;

    // check if button increase or decrease pressed 
    if(isset($_POST['increase']) || 
        isset($_POST['decrease']) ||
        isset($_POST['delete'])){

        $productID = 0;
        $qty = 0;
        $cartID = 0;

        if(isset($_POST['cartID'])){
            // it post a name/value paar
            $data = $_POST['cartID'];
            foreach($data as $x => $x_value)
            {
                $cartID = $x;
            }
        }


        if(isset($_POST['increase'])){
            $data = $_POST['increase'];
            foreach($data as $x => $x_value)
            {
                $productID = $x;
            }
            add_item(1, $productID, $cartID );
        }

       
        if(isset($_POST['decrease'])){
            $data = $_POST['decrease'];
            foreach($data as $x => $x_value)
            {
                $productID = $x;
            }
            delete_item(1, $productID, $cartID );
        }

        if(isset($_POST['delete'])){
            $data = $_POST['delete'];
            foreach($data as $x => $x_value)
            {
                $productID = $x;
                $qty = $x_value;
            }
            delete_item($qty, $productID, $cartID );
        }


        /*
        // not able to post a name/value paar , don't know why, loop throught array
        if(isset($_POST['qty'])){
            // it post a item/value paar
            $data = $_POST['qty'];
            foreach($data as $x => $x_value)
            {
                $productID_key = $x;
                $product_qty = $x_value;
                if ($productID == $productID_key){
                    $qty = $product_qty;
                }
            }
        }
        */        
    }
    

    // userID
    $total_price = 0;
    if(isset($_SESSION['sessionUserID'])){
        if($_SESSION['sessionUserID'] != "")
        {
            $userID = $_SESSION['sessionUserID'];
            // get any open carts for user
            $cart = check_for_cart($_SESSION['sessionUserID']);
            $result = $cart->fetch();
            if($result)
            {
                $cartID = $result[0];
                // get all the items for that cart
                $items = get_item_detail($cartID);
                $items = $items->fetchAll();
                $item_count = count($items);

                $total_price = total_price($cartID);
            }
        }
    }
?>
<?php require('views/nav.php'); ?>



<main>
    <form method="POST" action="cart.php">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive-xl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-1 cart-head">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-1 cart-head">
                                        <div class="p-2 px-3 text-uppercase">Name</div>
                                    </th>
                                    <th scope="col" class="border-1 cart-head">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-1 cart-head th-lg">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-1 cart-head th-lg">
                                        <div class="py-2 text-uppercase">Modify</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($item_count > 0) { ?>
                                    <?php foreach($items as $item) : ?>
                                        <?php if($item["qty"] > 0) { ?>
                                            <tr>
                                                <th scope="row" class="border-1">
                                                    <div class="p-2">
                                                        <img class="cartImg img-fluid rounded shadow-sm" src="<?php echo 'assets/images/' . $item['imageURL']; ?>" alt="product">
                                                    </div>
                                                </th>
                                                <td class="border-1 align-middle"><strong><?php echo $item['productName']; ?></strong></td>
                                                <td class="border-1 align-middle">
                                                    <strong><?php echo '$'.number_format($item['price'], 2); ?></strong> </br></br>
                                                    <strong>sub total: <?php echo '$'.number_format($item['price']*$item['qty'], 2); ?>
                                                </td>
                                                <td class="border-1 align-middle th-lg">
                                                    <div class="cart-button">

                                                        <input type="hidden" 
                                                            name="cartID[<?php echo $item["cartID"];?>]" 
                                                            value="<?php echo $item["qty"]; ?>">

                                                        <button class="btn btn-default toggle-button" 
                                                            type="submit" 
                                                            name="decrease[<?php echo $item["productID"];?>]" 
                                                            value ="<?php echo $item["qty"];?>">-</button>

                                                        <input id="qty" type="text"  
                                                            name="qty[<?php echo $item['productID']; ?>]" 
                                                            value="<?php echo $item['qty']; ?>" readonly>

                                                        <button class="btn btn-default toggle-button" 
                                                            type="submit" 
                                                            name="increase[<?php echo $item["productID"];?>]" 
                                                            value ="<?php echo $item["qty"];?>">+</button>

                                                    </div>
                                                </td>
                                                <td class="border-1 align-middle">
                                                    <button class="btn btn-primary" type="submit" 
                                                    name="delete[<?php echo $item["productID"];?>]" 
                                                    value ="<?php echo $item["qty"];?>">Delete</button>
                                                </td>
                                            <tr>
                                        <?php } ?>  <!-- end of if($item["qty"] > 0) -->    
                                    <?php endforeach; ?>
                                <?php } ?> <!-- end of if($item_count > 0) -->  

                                <tr>
                                    <th scope="row" class="border-1"></th>
                                    <td class="border-1 align-middle"><strong>The total amount of</strong></td>
                                    <td class="border-1 align-middle"><strong><?php echo '$'.number_format($total_price, 2); ?></strong></td>
                                    <td class="border-1 align-middle">                                    
                                        <div class="cart-button">
                                            <button class="btn btn-warning checkout" type="submit" name="" value ="">Check Out</button>
                                        </div>                                    
                                    </td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end of col-md-12 -->
            </div> <!-- end of row -->
        </div> <!-- end of container-fluid -->
    </form> <!-- end of form -->
</main>

<?php
    require('views/footer.php');
?>