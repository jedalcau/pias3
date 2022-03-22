<?php
require "../model/doctor.model.php";
//$iddoc        = $_SESSION['iddoctor'];
$iddoc        = $_POST['iddoctor'];
$nombre       = trim(strtoupper($_POST['txtnombre']));
$apellidos    = trim(strtoupper($_POST['txtapellidos']));
$username     = trim(strtolower($_POST['txtusuario']));
$email        = trim(strtolower($_POST['txtemail']));
$passwd       = trim(strtolower($_POST['txtpasswd1']));
$fecnac       = trim(strtoupper($_POST['txtfecnac']));
$sexo         = trim(strtoupper($_POST['txtsexo']));
$direccion    = trim(strtoupper($_POST['txtdireccion']));
$departamento = trim(strtoupper($_POST['txtdepartamento']));
$provincia    = trim(strtoupper($_POST['txtprovincia']));
$distrito     = trim(strtoupper($_POST['txtdistrito']));
$profesion    = trim(strtoupper($_POST['txtprofesion']));
$telefono     = trim($_POST['txttelefono']);
$avatar       = trim($_POST['foto']);
$biografica   = trim(strtoupper($_POST['txtbiografia']));
$numcolegiatura = trim(strtoupper($_POST['txtnumcolegiatura']));

$doctores = new Doctores();
$response = $doctores->Actualizar($iddoc,$nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$numcolegiatura);

if($response == true){
	header("Location: ../admin/doctors.php?msg=3");
}else{
	header("Location: ../admin/doctors.php?msg=2");
}