<?php
// try{
// $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");
//  $username = "jack";
//  $password = password_hash("my password", PASSWORD_DEFAULT);
//  $sql = "INSERT INTO users(username,password)VALUES ('$username','$password')";
//  $pdo -> exec($sql);
//  echo"new record created succseffuly." .$last_id;

// }

// catch (PDOException $e){

//     echo $e ->getMessage();

// }
// try{
//     $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");
//     $sql = "ALTER TABLE products DROP column NAME";

//     $pdo -> exec($sql);
//     echo "column droped succesfully";
// }

// catch(PDOException $e){
//     echo $e -> getMessage();
// }
try{
    $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");
    $sql = "ALTER TABLE products DROP column NAME";

    $pdo -> exec($sql);
    echo "column droped succesfully";
}

catch(PDOException $e){
    echo $e -> getMessage();
}
?>
