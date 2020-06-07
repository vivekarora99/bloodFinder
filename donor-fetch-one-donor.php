<?php
include_once("connection.php");


$did=$_GET["did"];

$query="select * from blood where did='$did'";
$table=mysqli_query($dbcon,$query);
$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);
?>