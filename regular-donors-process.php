<?php
include_once("connection.php");
$query="select * from blood  order by number desc limit 3";
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