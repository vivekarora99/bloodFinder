<?php
include_once("connection.php");
$bloodgrp=$_GET["bloodgrp"];
$query="select distinct city from blood where bloodgrp='$bloodgrp'  ";
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