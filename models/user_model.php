<?php
    function login($username, $password)
    {
        global $db;
        $query = "SELECT * FROM tbluser WHERE username='$username' AND password='$password'";
        $result = $db->query($query);
        return $result;
    } // end login
    
    function create_user($username, $password, $email)
    {
        global $db;
        $query = "INSERT INTO tbluser (userID, username, password, email, status)" . 
        "VALUES (NULL, '$username', '$password', '$email', 'A')";
        $result = $db->query($query);
        return $result;
    } // end create_user
?>