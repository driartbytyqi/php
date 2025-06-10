<?php
include_once('config.php');

if(isset($_post['submit'])){
    $id = $_post['movie_name'];
    $movie_desc = $_post['movie_decs'];
    $movie_quality = $_post['movie_quality'];
    $movie_reating = $_post['movie_reating'];

    $sql = "UPDATE movies SET id=:id, movie_name= :movie_name, movie_desc=:movie_desc, movie_quality=:movie_quality,movie_reating=:movie_reating WHERE id=:id";
    
    $prep = $conn -> prepare($sql);
    $prep ->bindParam(':movie_name',$movie_name);
    $prep ->bindParam(':movie_decs',$movie_decs);
    $prep ->bindParam(':movie_quality',$movie_quality);
    $prep ->bindParam(':movie_reating',$movie_reating);

    $prep->execute();
    header("location:dashboard.php");

}
?>