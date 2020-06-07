
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

    $query="update ngo set name='$name',address='$address',city='$city',contactno='$contactno',email='$email',president='$president',presmobile='$presmobile',estd='$estd',members='$members',info='$info' where regno='$regno'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        echo "Record Updated...";
        else
        echo mysqli_error($dbcon);
?>