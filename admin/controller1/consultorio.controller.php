<?php 
include "../../model/consultorio.model.php";

echo $idconsultorio = trim(strtoupper($_POST['idconsultorio']));
echo $consultorio   = trim(strtoupper($_POST['txtconsultorio']));
echo $descripcion   = trim(strtoupper($_POST['txtdescripcion']));
echo $status        = trim(strtoupper($_POST['status']));

$consult  = new Consultorio();
$response = $consult->Editar($idconsultorio,$consultorio,$descripcion,$status);

if($response == true){
	
	header("Location: ../departments.php?msg=1");
}else{
	header("Location: ../departments.php?msg=2");
}