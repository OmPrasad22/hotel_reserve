<?php
$id=$_GET['id'];
$mysqli=new mysqli("localhost","root","","hotel_reserve");
date_default_timezone_set('Asia/Kolkata');
$da=date("Y-m-d");
$sql="SELECT * FROM record WHERE pid='".$id."'";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
$sql1="SELECT * FROM hotel WHERE hname='".$row['hname']."'";
$result1=mysqli_query($mysqli,$sql1);
$row1=mysqli_fetch_array($result1);
$price=$row1["rent"];
$price1='0';
if($row1['htype'] == "Luxe Hotel"){
    $price1 = (($price * 20) / 100);
}
else if($row1['htype'] == "Deluxe Hotel"){
    $price1 = (($price * 40) / 100);
}
else if($row1['htype'] == "Five Star Hotel"){
    $price1 = (($price * 60) / 100);
}
$price=$price+$price1;
$price2='0';
if($row['hrtype'] == "SingleXA Suite"){
    $price2 = (($price * 10) / 100);
}
else if($row['hrtype'] == "DoubleXA Suite"){
    $price2 = (($price * 20) / 100);
}
else if($row['hrtype'] == "QuadXA Suite"){
    $price2 = (($price * 40) / 100);
}
else if($row['hrtype'] == "Executive Suite"){
    $price2 = (($price * 50) / 100);
}
else if($row['hrtype'] == "Royal Suite"){
    $price2 = (($price * 75) / 100);
}
$sql2="SELECT * FROM user WHERE username='".$row['user']."'";
$result2=mysqli_query($mysqli,$sql2);
$row2=mysqli_fetch_array($result2);
$sql3="SELECT * FROM login WHERE username='".$row2['username']."'";
$result3=mysqli_query($mysqli,$sql3);
$row3=mysqli_fetch_array($result3);
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body onload="window.print()">
    <header>
        <img src="Components/logo.png" alt="">
        <div class="hotel">
            <label for="hname">';echo $row['hname'];echo'</label><br>
            <label for="haddr">';echo $row1['haddr'];echo'</label>
        </div>
    </header>
    <div class="billto">
        <div class="userdel">
            <label for="uname">';echo $row2['name'];echo'</label>
            <label for="mobileno">';echo $row3['mobileno'];echo'</label>
            <label for="idp">';echo $row['uveride'];echo' (';echo $row['uveri'];echo')</label>
            <label for="addr">';echo $row2['addr'];echo'</label>
        </div>
        <div class="billdat">
            <label for="rd">Receipt Date :&nbsp;&nbsp;</label>
            <label for="rdr">';echo $da;echo'</label><br>
            <label for="bd">Bill Date :&nbsp;&nbsp;</label>
            <label for="bdb">';echo $row['checkin'];echo'</label><br>
            <label for="lo">Location :&nbsp;&nbsp;</label>
            <label for="lol">';echo $row1['hloc'];echo'</label><br>
            <label for="ps">Payment Mode :&nbsp;&nbsp;</label>
            <label for="psp">';echo $row['status'];echo'</label><br>
        </div>
    </div>
    <table>
        <tr>
            <th style="width: 15%;">Sl</th>
            <th style="width: 40%;">Description</th>
            <th style="width: 15%;">Room</th>
            <th style="width: 30%;">Amount</th>
        </tr>
        <tr>
            <td rowspan="3">1</td>
            <td>Base Price</td>
            <td rowspan="3">x';echo $row['noroom'];echo'</td>
            <td>';echo $row1['rent'];echo'.00</td>
        </tr>
        <tr>
            <td>';echo $row['htype'];echo'</td>
            <td>';echo $price1;echo'.00</td>
        </tr>
        <tr>
            <td>';echo $row['hrtype'];echo'</td>
            <td>';echo $price2;echo'.00</td>
        </tr>
        <tr>
            <td colspan="4" class="tot">Total :&nbsp;&nbsp;&nbsp;';echo $row['payrup'];echo'.00</td>
        </tr>
        <tr>
            <td colspan="4" class="sign">Signature and Seal</td>
        </tr>
    </table>
    <footer>
        *Include all Taxes and Charges<br>
        **Please make checks payable to : <b>';echo $row['hname'];echo'</b>
    </footer>
</body>
</html>
';
?>