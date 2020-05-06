<?php 

     $dsn = 'mysql:host=ehc1u4pmphj917qf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=z4lwhm9kotsqv1ou';
     $username = 's4lxdecuymmf8e4o';
     $password = 'wlm9zl7vpj7hdirt';


    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
