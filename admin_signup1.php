<?php
    session_start();
    $aduser=$_POST['aduser'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $up=0;
    $file_name=$_FILES['img']['name'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_size=$_FILES['img']['size'];
    $file_type=strtolower(pathinfo("Components/" . basename($file_name), PATHINFO_EXTENSION));
    if($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png"){
        if($file_size != 0 && $file_size < 1001024){
            if(!file_exists("Components/" . basename($file_name))){
                $up=1;
            }
            else{
                $t = pathinfo($file_name, PATHINFO_FILENAME);
                $t = $t."1";
                $file_name = $t.".".$file_type;
                $up=1;
            }
        }
        else{
            echo '<script>
                alert("Image is too large or Invalid!");
                window.location.href="admin_signup.php";
                </script>';
            $up= 0;
        }
    }
    else{
        echo '<script>
            alert("Image is not .jpg,.png,.jpeg!");
            window.location.href="admin_signup.php";
            </script>';
        $up= 0;
    }
    if($up==1){
        $mysqli=new mysqli("localhost","root","","hotel_reserve");
        $sql1="SELECT * FROM admin WHERE aduser='".$aduser."' OR email='".$email."'";
        if($result=$mysqli->query($sql1)){
            if(mysqli_num_rows($result) == 0){
                $sql="INSERT INTO admin(aduser,password,email,mobileno,img) VALUES('".$aduser."','".$password."','".$email."','".$mobileno."','".$file_name."')";
                if($mysqli->query($sql)){
                    move_uploaded_file($file_tmp,"Components/". $file_name);
                    echo '<script>
                    alert("Successfully signed up");
                    window.location.href="admin_login.php";
                    </script>';
                    $up=0;
                }
            }
            else{
                echo '<script>
                    alert("Username or Email already exist");
                    window.location.href="admin_signup.php";
                </script>';
            }
        }
    }
    else{
        echo '<script>
            alert("Invalid error!\nPlease try again...");
            window.location.href="admin_signup.php";
        </script>';
    }
?>