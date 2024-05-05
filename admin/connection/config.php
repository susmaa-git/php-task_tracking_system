<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "tts";

$conn =mysqli_connect($host,$user,$password,$db);

if($conn){
    echo "Database connection successful";
}
else{
    echo "Database connection failde";
}




?>