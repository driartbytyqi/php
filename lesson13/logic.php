<?php 
    include_once('config.php');

    if(isset ($_POST['submit'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email - $_POST('email');
        $tempPass = $_POST['password'];
        $password = password_hash($tempPass, PASSWORD_DEFALT);
        
    }