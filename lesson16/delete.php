<?php
include_once('config.php');

$id = $_GET['id'];
$sql = "DELETE FROM movies WHERE id=:id";
$prep = $conn -> prepare($sql);
$prep -> bindParam(':id',$id);
$prep ->execute();
header('location: list_movies.php');

?>