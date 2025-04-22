<?php 
$host ='localhost';
$user = 'root';
$pass = '';


try{
    $conn = new PDO ("mysql:host=$host" , $user, $pass );
    $sql = 'Create database test3B1';
    $conn -> exec($sql);
    echo 'Database is created';
}


catch (Exception $e){
    echo 'database not created, something went wrong;';
}


?>