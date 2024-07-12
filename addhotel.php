<?php
    session_start();
    $aduser=$_SESSION['auser'];
    $hname=$_POST['hname'];
    $htype=$_POST['htype'];
    $hloc=$_POST['hloc'];
    $haddr=$_POST['haddr'];
    $hdes=$_POST['hdes'];
    $avail=$_POST['avail'];
    $rent=$_POST['rent'];
    $up=0;
    if($htype != 'na' || $hrtype != 'na'){
        $file_name=$_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $file_size=$_FILES['img']['size'];
        $file_type=strtolower(pathinfo("Components/" . basename($file_name), PATHINFO_EXTENSION));
        if($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png"){
            if($file_size < 2097152){
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
                    alert("Image is too large!");
                    window.location.href="admin_addhotel.php";
                    </script>';
                $up= 0;
            }
        }
        else{
            echo '<script>
                alert("Image is not .jpg,.png,.jpeg!");
                window.location.href="admin_addhotel.php";
                </script>';
            $up= 0;
        }
        if($up==1){
            $mysqli=new mysqli("localhost","root","","hotel_reserve");
            $sql1="SELECT * FROM hotel WHERE aduser='".$aduser."' AND hname='".$hname."'";
            if($result=$mysqli->query($sql1)){
                if(mysqli_num_rows($result) == 0){
                    $sql="INSERT INTO hotel(aduser,hname,htype,hloc,haddr,hdes,rent,img,avail) VALUES('".$aduser."','".$hname."','".$htype."','".$hloc."','".$haddr."','".$hdes."','".$rent."','".$file_name."','".$avail."')";
                    if($mysqli->query($sql)){
                        move_uploaded_file($file_tmp,"Components/". $file_name);
                        echo '<script>
                        alert("Data added successfully");
                        window.location.href="admin_addhotel.php";
                        </script>';
                    }
                    else{
                        echo '<script>
                        alert("Invalid error!\nPlease try again");
                        window.location.href="admin_addhotel.php";
                        </script>';
                    }
                }
                else{
                    echo '<script>
                    alert("Hotel name already exist");
                    window.location.href="admin_addhotel.php";
                    </script>';
                }
            }
        }
        else{
            echo '<script>
            alert("Invalid error!\nPlease try again...");
            window.location.href="admin_addhotel.php";
            </script>';
        }
    }
    else{
        echo '<script>
        alert("Please select Hotel Location or Room Type!");
        window.location.href="admin_addhotel.php";
        </script>';
    }
?>