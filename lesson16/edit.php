<?php
session_start();
include_once('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM movies WHERE id=:id";

$selectUsers = $conn -> prepare($sql);
$selectUsers -> bindParam(':id',$sql);
$selectUsers -> execute();
$user_data = $selectUsers -> fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>edit users details</h2>
    <div class="table-responsive">
        <form action="updateUsers.php" method="post">
            <div class="form-floating">
                <input type="number" class="form-control" placeholder="id" name="id" value="<?php echo $user_data['id']?>">
                <label for="id">id</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" placeholder="emri" name="emri" value="<?php echo $user_data['emri']?>">
                <label for="id">emri</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" placeholder="username" name="username" value="<?php echo $user_data['username']?>">
                <label for="id">username</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" placeholder="email" name="email" value="<?php echo $user_data['email']?>">
                <label for="id">email</label>
            </div>
            <br>
            <button class="w-1-- btn btn-lg btn-primary" type="sub"
        </form>
    </div>
</body>
</html>