<?php
require('connection/config.php');
session_start();
if(isset($_SESSION['email'])){

}
else{
    header('Location:index.php');
}
?>