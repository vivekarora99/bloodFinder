<?php

include_once("connection.php");
$query="select distinct bloodgrp from blood";
$table=mysqli_query($dbcon,$query);

$ary=array( );

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);
?>