<?php


include_once("connection.php");
if($_POST["btn"]=="save")
    doSave($dbcon);
else
    doUpdate($dbcon);

function doSave($dbcon)
{
$did=$_POST["did"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $bloodgrp=$_POST["bloodgrp"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $mobile=$_POST["mobile"];
    $number=$_POST["number"];
    $medical=$_POST["medicalhistory"];

    $orgname=$_FILES["profile"]["name"];
    $tmpName=    $_FILES["profile"]["tmp_name"];
/*
if($orgname="")
{
    $orgname="nopic.jpg";
}
    else
    {
        move_uploaded_file($tmpName,"uploads/".$orgname);
}
*/
    

   

    $query="insert into blood values('$did','$name','$age','$bloodgrp','$gender','$address','$city','$mobile','$number','$medical','$orgname')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        header("location:donor-profile-response.php?msg='Record Saved Successfully'");
        else
        echo mysqli_error($dbcon);
}

function doUpdate($dbcon)
{
     $did=$_POST["did"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $bloodgrp=$_POST["bloodgrp"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $mobile=$_POST["mobile"];
    $number=$_POST["number"];
    $medical=$_POST["medicalhistory"];

    
    $orgname=$_FILES["profile"]["name"];

    $tmpName= $_FILES["profile"]["tmp_name"];
    
    if($orgname!="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgname);
    }
    else
        $orgname=$_POST["hdn"];


    $query="update blood set name='$name',age='$age',bloodgrp='$bloodgrp',gender='$gender',
    address='$address',city='$city',mobile='$mobile',number='$number',medical='$medical',orgname='$orgname' where did='$did'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        header("location:donor-profile-response.php?msg='Record updated successfully..'");
        else
        echo mysqli_error($dbcon);
}
?>
