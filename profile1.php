<?php
session_start();
$user=$_SESSION['user'];
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$addr=$_POST['addr'];
$img=$_FILES['img']['name'];
$file_tmp=$_FILES['img']['tmp_name'];
$file_size=$_FILES['img']['size'];
$file_type=strtolower(pathinfo("Components/" . basename($img), PATHINFO_EXTENSION));
if($img == ''){
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql="UPDATE user SET name='".$name."',addr='".$addr."' WHERE username='".$user."'";
    if($mysqli->query($sql)){
        $sql1="UPDATE login SET mobileno='".$mobileno."',email='".$email."' WHERE username='".$user."'";
        mysqli_query($mysqli,$sql1);
        echo '<script>
        alert("Data updated successfully");
        window.location.href="profile.php";
        </script>';
    }
    else{
        echo '<script>
        alert("Invalid error!\nPlease try again");
        window.location.href="profile.php";
        </script>';
    }
}
else{
    $up=0;
    if($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png"){
        if(!file_exists("Components/" . basename($img))){
            $up=1;
        }
        else{
            $t = pathinfo($img, PATHINFO_FILENAME);
            $t = $t."1";
            $img = $t.".".$file_type;
            $up=1;
        }
    }
    else{
        echo '<script>
        alert("Image is not .jpg,.png,.jpeg!");
        window.location.href="profile.php";
        </script>';
        $up= 0;
    }
    if($up==1){
        $mysqli=new mysqli("localhost","root","","hotel_reserve");
        $sql="UPDATE user SET name='".$name."',addr='".$addr."',img='".$img."' WHERE username='".$user."'";
        if($mysqli->query($sql)){
            move_uploaded_file($file_tmp,"Components/". $img);
            $sql1="UPDATE login SET mobileno='".$mobileno."',email='".$email."' WHERE username='".$user."'";
            mysqli_query($mysqli,$sql1);
            echo '<script>
            alert("Data updated successfully");
            window.location.href="profile.php";
            </script>';
        }
    }
    else{
        echo '<script>
        alert("Invalid error!\nPlease try again");
        window.location.href="profile.php";
        </script>';
    }
}
?>