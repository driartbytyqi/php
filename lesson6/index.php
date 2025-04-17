<?php
// $my_filename =  "ds.txt";

//     $my_file =fopen($my_filename,'r');

//     $size = filesize($my_filename);

//     $my_filedata = fread($my_filename,$size);
    // fclose($my_file);

//  w- write only mode


// r - read only mode


// a - write only mode. Te dhenat ne files ruhen


// w+ , r+ , a+ 
// $file = fopen("ds.txt","r");

// while(!feof($file)){
//     echo fgets($file)."<br>";
// }
// fclose($file);
// $my_file = fopen("ds.text","r");
// $my_text = "digital";
// fwrite($my_file,$my_text);
file_put_contents('ds.text',"add more text");
echo file_get_contents("ds.text");
?>
