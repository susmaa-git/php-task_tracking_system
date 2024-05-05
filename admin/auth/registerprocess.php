<?php require('../connection/config.php');

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($name != "" && $email != "" && $username!= "" && $password!= ""){
        $select = "SELECT * FROM users WHERE email = '$email'";
        $get_select = mysqli_query($conn,$select);
        if($get_select->num_rows> 0){
            header('Location:../register.php?exist = Email already exist');
        }
        else{
            $insert = "INSERT INTO users(name, email, username, password)VALUES('$name','$email','$username','$password')";
            $get_insert = mysqli_query($conn,$insert);
            if($get_insert){
                header('Location:../index.php?success = Registration successful');
            }
            else{
                
                header('Location:../register.php?failed = Registration failed');
            }
        }
    }
    else{
       header('Location:../register.php?required = ALl fields are required');
    }
}








?>