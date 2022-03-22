<?php
require "../model/paciente.model.php";

$idpac     = $_POST['idpac'];
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
$telefono  = trim(strtoupper($_POST['txttelefono']));
$avatar    = trim(strtoupper($_POST['foto']));

$pacientes = new Pacientes();
$response = $pacientes->Actualizar($idpac,$dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$telefono,$avatar);

if($response == true){
	header("Location: ../view/paciente.php?msg=Actualizado correctamente");
}else{
	header("Location: ../view/paciente.php?msg=Ocurrio un error");
}
