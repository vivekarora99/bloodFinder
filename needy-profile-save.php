<?php


include_once("connection.php");

if($_POST["btn"]=="save")
    doSave($dbcon);
else
    doUpdate($dbcon);

function doSave($dbcon)
{
$nid=$_POST["nid"];
    $name=$_POST["name"];
    $idproof=$_POST["idproof"];
    $orgname=$_FILES["profile"]["name"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $tmpName=    $_FILES["profile"]["tmp_name"];

    
move_uploaded_file($tmpName,"uploads/".$orgname);


    $query="insert into needy values('$nid','$name','$idproof','$orgname','$mobile','$address','$city')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        header("location:needy-profile-response.php?msg='Record Saved Successfully'");
        else
        echo mysqli_error($dbcon);
}

function doUpdate($dbcon)
{
    $nid=$_POST["nid"];
    $name=$_POST["name"];
    $idproof=$_POST["idproof"];
    $orgname=$_FILES["profile"]["name"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $tmpName=    $_FILES["profile"]["tmp_name"];

    if($orgname!="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgname);
    }
    else
        $orgname=$_POST["hdn"];


    $query="update needy set name='$name',idproof='$idproof',orgname='$orgname',mobile='$mobile',
    address='$address',city='$city' where nid='$nid'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        header("location:needy-profile-response.php?msg='Record updated successfully..'");
        else
        echo mysqli_error($dbcon);
}
?>
