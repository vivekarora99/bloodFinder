
<?php

include_once("connection.php");
include_once("SMS_OK_sms.php");
 $uid=$_GET["uid"];
    $pwd=$_GET["pwd"];
    $mobile=$_GET["mobile"];
    $type=$_GET["type"];

    $query="insert into users values('$uid','$pwd','$mobile','$type')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
    {
     $msg=SendSMS($mobile,"Hi,you are almost done with signup process your password=".$pwd);
        echo "Signed Up Successfully ".$msg;
    }
        else
        echo mysqli_error($dbcon);
?>