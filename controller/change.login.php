<?php
require "../model/doctor.model.php";

$iddoc        = $_POST['iddoctor'];
$username     = trim(strtolower($_POST['txtusuario']));
$passwd       = trim(strtolower($_POST['txtpasswd1']));


$doctores = new Doctores();
$response = $doctores->ChangeLogin($iddoc,$username,$passwd);

if($response == true){
	header("Location: ../view/doctors.php?msg=4");
}else{
	header("Location: ../view/doctors.php?msg=2");
}