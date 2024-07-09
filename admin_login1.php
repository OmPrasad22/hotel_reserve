<?php
    $aduser=$_POST['aduser'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql="SELECT * FROM admin WHERE aduser='".$aduser."' AND password='".$password."' AND email='".$email."'";
    if($result=$mysqli->query($sql)){
        if($result->num_rows > 0){
            $sql1="SELECT img FROM admin WHERE aduser='".$aduser."' AND password='".$password."' AND email='".$email."'";
            $result1=$mysqli->query($sql1);
            $data=mysqli_fetch_array($result1);
            session_start();
            $_SESSION['auser'] = $aduser;
            $_SESSION['aimg'] = $data['img'];
            header('location: admin.php');
        }
        else{
            echo '<script>
                alert("Wrong username or password...");
                window.location.href="admin_login.php";
                </script>';
        }
    }
?>