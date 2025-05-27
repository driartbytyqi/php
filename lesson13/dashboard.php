<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td,th{
            padding: 10px 20px;
        }
        </style>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
    </a>
  </div>
</nav>

    <?php
    include_once("config.php");
    $sql = "SELECT = * FROM users";
    $getusers = $conn -> prepare($sql);
    $getusers -> execute();


    $users = $getusers -> fetchAll();
    <?php iclude("header.php")?>
    <style>
    table,tr,th,td{
        border:1px solid black;
    }
    table,tr,td{
        border-collapse:collapse;
    }
    td{
        padding:15px;
    }
    </style>

    ?>

    <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>surname</th>
            <th>email</th>
            <th>delete</th>
            <th>update</th>
        </thead>
        
        <tbody>
            <?php
            foreach($users as $user){
            ?>
            <tr>
                <td>
                    <?=$user['id']?>
                </td>
                <td>
                    <?=$user['name']?>
                </td>
                <td>
                    <?=$user['surname']?>
                </td>
                <td>
                    <?=$user['email']?>
                </td>
                <td>
                    <?= "<a href='delete.php?id=$user[id]'>delete</a>"?>
                </td>
                <td>
                    <?= "<a href='update.php?id=$user[id]'>update</a>"?>
                </td>
            </tr>


            <?php
                        }
            ?>
        </tbody>
    </table>

    <a href="add.php">app</a>
</body>
</html>