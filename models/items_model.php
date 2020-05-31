<?php

    //  add item
    function add_item($qty, $productID, $cartID)
    {
        global $db;
        // check to see if the productID is already in the items table with that cartID
        $query = "SELECT productID, cartID FROM tblitems WHERE productID = '$productID' AND cartID = '$cartID'";
        $result = $db -> query($query);

        if($result -> rowCount() > 0)
        {
            // add current qty to existing qty
            $query = "UPDATE tblitems SET qty = qty + '$qty' WHERE productID = '$productID' AND cartID = '$cartID'";
            $db -> query($query); 
        }
        else
        {
            $query = "INSERT INTO tblitems (qty, productID, cartID) VALUES ('$qty', '$productID', '$cartID')";
            $db -> query($query);
        }
    }

    // gets all the cart items
    function get_cart_items($cartID)
    {
        global $db;
        $query = "SELECT * FROM tblitems WHERE cartID = '$cartID'";
        $result = $db -> query($query);
        return $result;
    }

    function get_item_detail($cartID)
    {
        global $db;
        //$query = "SELECT it.qty, pr.productName, pr.price, pi.imageURL FROM tblitems AS it JOIN tblproduct AS pr ON it.productID = pr.productID JOIN tblproductimages AS pi ON pr.productID = pi.productID WHERE it.cartID = '$cartID' GROUP BY pi.productID";
        $query = "SELECT it.qty, pr.productName, pr.price, pi.imageURL, it.cartID, pr.productID FROM tblitems AS it JOIN tblproduct AS pr ON it.productID = pr.productID JOIN tblproductimage AS pi ON pr.productID = pi.productID WHERE it.cartID = '$cartID' GROUP BY pi.productID";
        $result = $db -> query($query);
        return $result;
    }

    // gets cart ID from userID
    function get_cart_id($userID)
    {
        global $db;
        $query = "SELECT cartID FROM tblcart WHERE userID = '$userID'";
        $result = $db -> query($query);
        return $result;
    }

    // gets qtys from one cart items
    function get_qtys_by_cart($cartID)
    {
        global $db;
        $query = "SELECT SUM(qty) FROM tblitems WHERE cartID = '$cartID'";
        $result = $db -> query($query);
        return $result;
    }

    //  delete item
    function delete_item($qty, $productID, $cartID)
    {
        global $db;
        // check to see if the productID is already in the items table with that cartID
        $query = "SELECT productID, cartID, qty FROM tblitems WHERE productID = '$productID' AND cartID = '$cartID'";
        $result = $db -> query($query);
        $result = $result->fetch();

        // check qty is existing 
        if ($result['qty'] >= $qty)
        {
            $query = "UPDATE tblitems SET qty = qty - '$qty' WHERE productID = '$productID' AND cartID = '$cartID'";
            $db -> query($query); 
        }
    }

    function total_price($cartID)
    {
        global $db;
        // check to see if the productID is already in the items table with that cartID
        //$query = "SELECT pr.price, it.qty, it.productID FROM tblitems AS it JOIN tblproduct AS pr WHERE AND cartID = '$cartID'";
        $query = "SELECT sum(pr.price*it.qty) AS total FROM tblitems AS it JOIN tblproduct AS pr WHERE it.productID = pr.productID AND cartID = '$cartID' GROUP BY it.cartID";
        $result = $db -> query($query);
        $result = $result->fetch();
        return $result[0];
    }


?>