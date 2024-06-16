<?php require('../connection/config.php');?>
<?php
//start the session
session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password ==""){
        header('Location:../index.php?required = All fields are required');
        header('refresh:2;URL = index.php');
    }
    else{
        $select = "SELECT * FROM users WHERE username = '$username'";
        $get_select = mysqli_query($conn, $select);
        if($get_select->num_rows>0){
            $data = mysqli_fetch_assoc($get_select);
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];

             header('Location:../dashboard.php?success = Login successful');
        }
        else{
            header('Location:../index.php?invalid = Invalid email');
        }
    }

}







?>