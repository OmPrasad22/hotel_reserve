<?php
    session_start();
    $aduser=$_SESSION['auser'];
    $hid=$_GET['uphname'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql="DELETE FROM hotel WHERE aduser='".$aduser."' AND hname='".$hid."'";
    if($mysqli->query($sql)){
        echo '<script>
                alert("Data deleted successfully");
                window.location.href="admin_actionhotel.php";
                </script>';
    }
    else{
        echo '<script>
                alert("Invalid error!\nPlease try again");
                window.location.href="admin_actionhotel.php";
                </script>';
    }
?>