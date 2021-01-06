<?php

$dsn = "mysql:host=localhost; dbname=final_1531";
$user = "root";
$pass = "";

// web-server literally tries to connect ... 
try {
    $pdo = new PDO($dsn, $user, $pass);
    //echo "CONNECTED!";
   
} catch (PDOException $err) {
    echo $err->getMessage();
}


?>