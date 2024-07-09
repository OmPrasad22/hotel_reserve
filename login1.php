<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql="SELECT * FROM login WHERE username='".$username."' AND password='".$password."' AND email='".$email."'";
    if($result=$mysqli->query($sql)){
        if($result->num_rows> 0){
            $_SESSION['temp']='1';
            $_SESSION['user']= $username;
            header('location: index.php');
        }else{
            $_SESSION['temp']= '0';
            header('location: login.php');
        }
    }
    else{
        echo '!!!Failed Connection';
    }
?>