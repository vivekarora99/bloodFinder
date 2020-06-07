<?php
include_once("connection.php");

$bloodgrp=$_GET["bloodgrp"];
$city=$_GET["city"];

$query="select * from blood where bloodgrp='$bloodgrp' && city='$city'";
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);
$ary=array();
if($count!=0)
{
    while($rows=mysqli_fetch_array($table))
    {
        $ary[]=$rows;
    }
    echo json_encode($ary);
}
?>