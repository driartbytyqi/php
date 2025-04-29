<?php
$host = 'local host';
$db = 'db';
$user = 'root';
$pass = '';

try{
    $pdo = new PDO("mysql:host=$host; dbname=$db",$user,$pass);
    $sql = "CREATE TABLE user(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL)";

    $pdo -> exec($sql);
    echo "table created successfuly";
}
catch (Exception $e){
    echo "error creating table:". $e ->getMessage();
}

?>