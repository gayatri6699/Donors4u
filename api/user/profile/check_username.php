<?php
require_once '../../../include/config.php';

$username=filter_var($_REQUEST["username"], FILTER_SANITIZE_STRING);
$output=checkUser($username);

echo $output;
mysqli_close($con);
?>