<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = 10;
    $age = 18;
    $numri = 23;

    if($num < 0){
        echo "$num is less than 0"."<br>";
    }
    if(($age < 12))&&(($age<20)){
        echo "you are a tennager"
    }else{
        echo"your are a grown man"."<br>";
    }

    if($numri<0){
        echo"the value of $numri is a negative number";     
    }else if($numri == 0){
        echo"the value of $numri is 0";
    }else{
        echo"the value of $numri is a positive number";
    }

    if($a == $b){
        echo'1';
    }else if($a > $b){
        echo'2';
    }else{
        echo'3';
    }

    switch($age2){
        case($age2>=0 && $age2<18);
        echo "you are a minor(0-18 yours old) <br>";
        break;
        case($age2>=18 && $age2<18);
        echo "you are a young adult <br>";
        break;
        case($age2>=25 && $age2<18);
        echo "you are an adult  <br>";
        break;
        default:
        echo "invalid age input.";
    }
    $day = "e enjte"
    switch($day){
        case($day == "e enjte");
    }
    ?>
</body>
</html>