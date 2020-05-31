<?php

    function get_products($cat_id) // gets all products by catID
    {
        global $db;
        $query = "SELECT * FROM tblproduct WHERE catID = '$cat_id'";
        $result = $db -> query($query);
        return $result;
    }

    function get_product_image($product_id)
    {
        global $db;
        $query = "SELECT * FROM tblproductimage WHERE productID = '$product_id'";
        $results = $db -> query($query);
        // need to take the result and convert into a string
        // then return that string!
        $images = array();
        foreach($results as $image) {
            array_push($images, $image['imageURL']);
        }
        return $images;
    }

    // gets single product by productID, parse it and convert to a php JSON object.
    function get_product_info($id)
    {
        global $db;
        $_SESSION['theProductID'] = $id;
        //$query = "SELECT pr.productID, pr.productName, pr.productDesc, pr.price, GROUP_CONCAT(imageURL) AS imgURLs FROM tblproduct AS pr JOIN tblproductimages AS pi ON pr.productID = pi.productID WHERE pr.productID = '$id'";
        $query = "SELECT pr.productID, pr.productName, pr.productDesc, pr.price, GROUP_CONCAT(imageURL) AS imgURLs FROM tblproduct AS pr JOIN tblproductimage AS pi ON pr.productID = pi.productID WHERE pr.productID = '$id'";
        $rows = [];
        $query_result = $db->query($query);
        while( $row = $query_result->fetch(PDO::FETCH_ASSOC) ) 
        {
            $rows[] = $row; // adds each row to the $rows array
        }
        // convert the $rows array to a php JSON object
        $json = json_encode($rows);
        
        // this would optionally convert the $rows into an array
        // $json = json_encode($rows, true); 
        return $json;
    }

    // gets all product ids from one cat id
    // used for display all product when specificall category is selected
    function get_product_id_by_cat($cat_id)     
    {
        global $db;
        $query = "SELECT productID FROM tblproduct WHERE catID = '$cat_id'";
        $result = $db -> query($query);
        return $result;
    }

    function get_product_info_by_id($product_id)     
    {
        global $db;
        $query = "SELECT * FROM tblproduct WHERE productID = '$product_id'";
        $result = $db -> query($query);
        $result = $result->fetch();
        return $result;
    }



?>