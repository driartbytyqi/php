<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db';


    try{
        $connect = new PDO ("mysql:host= $server; dbname= $dbname", $username, $passowrd);
    }


    catch(Exception $e){
        echo"something went wrong";
    }


?>