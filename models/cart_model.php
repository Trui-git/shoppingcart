<?php
   // check for cart
   function check_for_cart($userId)
   {
       global $db;
       $query = "SELECT * FROM tblcart WHERE userID = '$userId' AND status = 'A'";
       $result = $db -> query($query);
       return $result;
   }

   //  create cart
   function create_cart($userId)
   {
       global $db;
       $date = date('Y/m/d');
       $query = "INSERT INTO tblcart (openDate, closeDate, status, userID) VALUES ('$date', '$date', 'A', '$userId')";
       $result = $db -> query($query);
       return $result;
   }

   // close cart
   function close_cart($cartId)
   {
       global $db;
       $query = "UPDATE tblcart SET status = 'C' WHERE cartID = '$cartId'";
       $result = $db -> query($query);
       return $result;
   }
?>