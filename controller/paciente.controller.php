<?php 
require "../model/paciente.model.php";

$dni       = trim(strtoupper($_POST['txtdni']));
$nombre    = trim(strtoupper($_POST['txtnombre']));
$apellidos = trim(strtoupper($_POST['txtapellidos']));
$email     = trim(strtoupper($_POST['txtemail']));
$fecnac    = trim(strtoupper($_POST['txtfecnacimiento']));
$sexo      = trim(strtoupper($_POST['txtsexo']));
$direccion = trim(strtoupper($_POST['txtdireccion']));
$distrito  = trim(strtoupper($_POST['txtdistrito']));
$provincia = trim(strtoupper($_POST['txtprovincia']));
$ciudad    = trim(strtoupper($_POST['txtciudad']));
$codpostal = "0";
$telefono  = trim(strtoupper($_POST['txttelefono']));
$foto      = trim(strtoupper($_POST['foto']));
$status    = 1;

$pacientes = new Pacientes();
$response = $pacientes->Duplicado($dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$codpostal,$telefono,$foto,$status);

echo $response;
if($response == 0){
	echo "Ningun resultado";
	$pacientes->Guardar($dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$codpostal,$telefono,$foto,$status);
	header("Location: ../view/paciente.php?msg=1");
}else{
	if($response > 0){
		echo "Hay mas de un registro";
		header("Location: ../view/paciente.php?msg=2");
	}else{
		echo "No estoy seguro";
		header("Location: ../view/paciente.php?msg=2");
	}
}
