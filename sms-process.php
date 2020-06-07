<?php
include_once("SMS_OK_sms.php");
$mobile=$_GET["mobile"];
    echo SendSMS($mobile,"Done");
    ?>