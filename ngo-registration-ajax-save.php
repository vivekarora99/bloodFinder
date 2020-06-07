<?php

include_once("connection.php");
 $regno=$_GET["regno"];
    $name=$_GET["name"];
    $address=$_GET["address"];
    $city=$_GET["city"];
$contactno=$_GET["contactno"];
$email=$_GET["email"];
$president=$_GET["president"];
$presmobile=$_GET["presmobile"];
$estd=$_GET["estd"];
$members=$_GET["members"];
$info=$_GET["info"];
    $query="insert into ngo values('$regno','$name','$address','$city','$contactno','$email','$president','$presmobile','$estd','$members','$info')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        echo "Record Saved....";
        else
        echo mysqli_error($dbcon);
?>