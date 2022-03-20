<?php
require "../model/doctor.model.php";

$nombre       = trim(strtoupper($_POST['txtnombre']));
$apellidos    = trim(strtoupper($_POST['txtapellidos']));
$username     = trim(strtolower($_POST['txtusuario']));
$email        = trim(strtolower($_POST['txtemail']));
$passwd       = trim(strtolower($_POST['txtpasswd1']));
$fecnac       = trim(strtoupper($_POST['txtfecnac']));
$sexo         = trim(strtoupper($_POST['sexo']));
$direccion    = trim(strtoupper($_POST['txtdireccion']));
$departamento = trim(strtoupper($_POST['txtdepartamento']));
$provincia    = trim(strtoupper($_POST['txtprovincia']));
$distrito     = trim(strtoupper($_POST['txtdistrito']));
$profesion    = trim(strtoupper($_POST['txtprofesion']));
$telefono     = trim($_POST['txttelefono']);
$avatar       = trim($_POST['foto']);
$biografica   = trim(strtoupper($_POST['txtbiografia']));
$numcolegiatura = trim(strtoupper($_POST['txtnumcolegiatura']));
$status       = 1;

$doctores = new Doctores();
$response = $doctores->Guardar($nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$status,$numcolegiatura);

if($response == true){
	header("Location: ../admin/doctors.php?msg=Guardado correctamente");
}else{
	header("Location: ../admin/doctors.php?msg=Hubo un error");
}