<?php
require_once '../../../include/config.php';
loginCheckHospital();

$obj=(object)$_REQUEST;
$obj->hospital_id=$_SESSION["id"];
$data=requestList($obj);

echo $data;

mysqli_close($con);
?>