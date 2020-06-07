<?php
include_once("connection.php");


$nid=$_GET["nid"];

$query="select * from needy where nid='$nid'";
$table=mysqli_query($dbcon,$query);
$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);
?>