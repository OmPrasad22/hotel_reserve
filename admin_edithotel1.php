<?php
    session_start();
    $aduser=$_SESSION['auser'];
    $hid=$_GET['honame'];
    $hname=$_POST['hname'];
    $htype=$_POST['htype'];
    $hloc=$_POST['hloc'];
    $haddr=$_POST['haddr'];
    $hdes=$_POST['hdes'];
    $rent=$_POST['rent'];
    $avail=$_POST['avail'];
    $img=$_FILES['img']['name'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_size=$_FILES['img']['size'];
    $file_type=strtolower(pathinfo("Components/" . basename($img), PATHINFO_EXTENSION));
    if($img == ''){
        $mysqli=new mysqli("localhost","root","","hotel_reserve");
        $sql="UPDATE hotel SET hname='".$hname."',htype='".$htype."',hloc='".$hloc."',haddr='".$haddr."',hdes='".$hdes."',rent='".$rent."',avail='".$avail."' WHERE aduser='".$aduser."' AND hname='".$hid."'";
        if($mysqli->query($sql)){
            echo '<script>
            alert("Data updated successfully");
            window.location.href="admin_actionhotel.php";
            </script>';
        }
        else{
            echo '<script>
            alert("Invalid error!\nPlease try again");
            window.location.href="admin_edithotel.php?uphname=';echo $hid;echo'";
            </script>';
        }
    }
    else{
        $up=0;
        if($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png"){
            if($file_size < 2097152){
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
                alert("Image is too large!");
                window.location.href="admin_edithotel.php?uphname=';echo $hid;echo'";
                </script>';
                $up= 0;
            }
        }
        else{
            echo '<script>
            alert("Image is not .jpg,.png,.jpeg!");
            window.location.href="admin_edithotel.php?uphname=';echo $hid;echo'";
            </script>';
            $up= 0;
        }
        if($up==1){
            $mysqli=new mysqli("localhost","root","","hotel_reserve");
            $sql="UPDATE hotel SET hname='".$hname."',htype='".$htype."',hloc='".$hloc."',haddr='".$haddr."',hdes='".$hdes."',rent='".$rent."',img='".$img."',avail='".$avail."' WHERE aduser='".$aduser."' AND hname='".$hid."'";
            if($mysqli->query($sql)){
                move_uploaded_file($file_tmp,"Components/". $img);
                echo '<script>
                alert("Data updated successfully");
                window.location.href="admin_actionhotel.php";
                </script>';
            }
        }
        else{
            echo '<script>
            alert("Invalid error!\nPlease try again");
            window.location.href="admin_edithotel.php?uphname=';echo $hid;echo'";
            </script>';
        }
    }
?>