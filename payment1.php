<?php
    session_start();
    $aduser=$_POST['aduser'];
    $user=$_SESSION['user'];
    $hname=$_POST['hname'];
    $htype=$_POST['htype'];
    $hrtype=$_POST['hrtype'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $mno=$_POST['mno'];
    $uveri=$_POST['uveri'];
    $uveride=$_POST['uveride'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
    $status=$_POST['status'];
    $payrup=$_POST['payrup'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql3= "SELECT * FROM hotel WHERE aduser='".$aduser."'AND hname='".$hname."'";
    $result3=mysqli_query($mysqli,$sql3);
    $row3=mysqli_fetch_array($result3);
    $noroom=$_POST['noroom'];
    $upav=$row3['avail']-$noroom;
    if($hrtype != 'na'){
        if($upav>=0){
            if($status == 'Cash'){
                $mysqli=new mysqli("localhost","root","","hotel_reserve");
                $sql="INSERT INTO record(aduser,user,hname,htype,hrtype,noroom,uveri,uveride,checkin,checkout,status,payrup) VALUES('".$aduser."','".$user."','".$hname."','".$htype."','".$hrtype."','".$noroom."','".$uveri."','".$uveride."','".$checkin."','".$checkout."','".$status."','".$payrup."')";
                if($mysqli->query($sql)){
                    $sql1="SELECT * FROM record ORDER BY pid DESC LIMIT 1";
                    $result1=mysqli_query($mysqli,$sql1);
                    $row1=mysqli_fetch_array($result1);
                    foreach($name as $index=>$names)
                    {
                        $dname=$names;
                        $dage=$age[$index];
                        $dgender=$gender[$index];
                        $dmno=$mno[$index];
                        $sql2="INSERT INTO record_per(pid,name,age,gender,mno) VALUES('".$row1['pid']."','".$dname."','".$dage."','".$dgender."','".$dmno."')";
                        $mysqli->query($sql2);
                    }
                    $sql5="UPDATE hotel SET avail='".$upav."' WHERE aduser='".$aduser."'AND hname='".$hname."'";
                    $mysqli->query($sql5);
                    echo '<script>
                        alert("Room booked successfully");
                        window.location.href="hotel.php";
                        </script>';
                }
                else{
                    echo '<script>
                        alert("Invalid error!\nPlease try again");
                        window.location.href="payment.php?uphname=';echo $hname;echo '";
                        </script>';
                }
            }
            else{
                $file_name=$_FILES['rept']['name'];
                $file_tmp=$_FILES['rept']['tmp_name'];
                $mysqli=new mysqli("localhost","root","","hotel_reserve");
                $sql="INSERT INTO record(aduser,user,hname,htype,hrtype,noroom,uveri,uveride,checkin,checkout,status,payrup,rect) VALUES('".$aduser."','".$user."','".$hname."','".$htype."','".$hrtype."','".$noroom."','".$uveri."','".$uveride."','".$checkin."','".$checkout."','".$status."','".$payrup."','".$file_name."')";
                if($mysqli->query($sql)){
                    move_uploaded_file($file_tmp,"Components/". $file_name);
                    $sql1="SELECT * FROM record ORDER BY pid DESC LIMIT 1";
                    $result1=mysqli_query($mysqli,$sql1);
                    $row1=mysqli_fetch_array($result1);
                    foreach($name as $index=>$names)
                    {
                        $dname=$names;
                        $dage=$age[$index];
                        $dgender=$gender[$index];
                        $dmno=$mno[$index];
                        $sql2="INSERT INTO record_per(pid,name,age,gender,mno) VALUES('".$row1['pid']."','".$dname."','".$dage."','".$dgender."','".$dmno."')";
                        $mysqli->query($sql2);
                    }
                    $sql4="UPDATE hotel SET avail='".$upav."' WHERE aduser='".$aduser."'AND hname='".$hname."'";
                    $mysqli->query($sql4);
                    echo '<script>
                        alert("Room booked successfully");
                        window.location.href="hotel.php";
                        </script>';
                }
                else{
                    echo '<script>
                        alert("Invalid error!\nPlease try again");
                        window.location.href="payment.php?uphname=';echo $hname;echo '";
                        </script>';
                }
            }
        }
        else{
            echo '<script>
                alert("';echo $row3['avail'];echo ' room available");
                window.location.href="hotel.php";
                </script>';
        }
    }
    else{
        echo '<script>
            alert("Please select Room Type");
            window.location.href="payment.php?uphname=';echo $hname;echo '";
            </script>';
    }
?>