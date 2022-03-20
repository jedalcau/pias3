<?php
require "../model1/doctor.model.php";
$doctor = new Doctor();

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
$numcolegiatura = trim(strtoupper($_POST['txtnumcolegiatura']));
$telefono     = trim($_POST['txttelefono']);
$avatar       = "./assets/img/user.jpg";
$biografica   = trim(strtoupper($_POST['txtbiografia']));


$duplicado = $doctor->Duplicado($nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$status,$numcolegiatura);
print_r($duplicado);

if($duplicado == 2){
	# No hay duplicados
	$response = $doctor->Guardar($nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$status,$numcolegiatura);	
	
	if($response == true){
		header("Location: ../doctors.php?msg=1");
	}else{
		header("Location: ../doctors.php?msg=3");
	}
}

if($duplicado == 1){
	
	header("Location: ../doctors.php?msg=2");
	
}