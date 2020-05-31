<?php
    //$dsn = 'mysql:host=localhost;dbname=id13760629_project_db';
    //$username = 'id13760629_rui';
    //$password = '8o_E=cgu@pGACy_>';
    $dsn = 'mysql:host=localhost;dbname=project_db';
    $username = 'rui';
    $password = 'password';
    try
    {
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        include('views/database_error.php');
        exit();
    }
?>