<?php

    function get_cats(){
        global $db;
        $query = 'SELECT * FROM tblcat';
        $result = $db -> query($query);
        return $result;
    }
?>