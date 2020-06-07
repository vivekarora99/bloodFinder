<?php
    session_start();

include_once("connection.php");
$uid=$_GET["uid1"];
$pwd=$_GET["pwd1"];
$query="select type from users where uid='$uid' and pwd='$pwd '";

$table=mysqli_query($dbcon,$query);

if(mysqli_num_rows($table)==0)
    echo "Invalid id";
else
{   
    while($row=mysqli_fetch_array($table))
    {
       $type=$row["type"];
    }
    $_SESSION["uid"]=$uid;
    echo $type;
}
?>