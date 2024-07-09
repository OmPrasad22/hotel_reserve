<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql1="SELECT * FROM login WHERE username='".$username."' OR email='".$email."'";
    if($result=$mysqli->query($sql1)){
        if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO login(username,password,email,mobileno) VALUES('".$username."','".$password."','".$email."','".$mobileno."')";
            if($mysqli->query($sql)){
                $_SESSION['sup']='1';
                $sql1="INSERT INTO user(username,name,addr,img) VALUES('".$username."','','','')";
                mysqli_query($mysqli,$sql1);
                header('location: login.php');
            }
        }
        else{
            $_SESSION['sup']='0';
            header('location: signup.php');
        }
    }

?>