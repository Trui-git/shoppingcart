<?php
    require('includes/package.php');
    session_start(); // starts our sessions
    //$_SESSION['login'] = "login"; // used only to display login and logput in menu bar
    //$_SESSION['isLoggedIn'] = false; // used for display login and logout 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/site.css?ts=<?=time()?>">
    <title>Computer Shop</title>
</head>
<body>
    <?php require('views/signup.php'); ?>
    <?php require('views/login.php'); ?>
    <div id="lightBackground" onclick="HideProduct();"></div>
    <header>
        <h1>Spiceman's Computer Shop</h1>
    </header>