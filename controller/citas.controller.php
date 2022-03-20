<?php
require_once "../model/citas.model.php";
$citas = new Citas();

$idpaciente    = $_POST['txtidpaciente'];
$idconsultorio = $_POST['txtidconsultorio'];
$iddoctor      = $_POST['txtiddoctor'];
$fecha         = $_POST['txtfecha'];
$hora          = $_POST['txthora'];
$emailpac      = $_POST['txtemail'];
$telefono      = $_POST['txttelefono'];
$mensaje       = $_POST['txtmensaje'];

                    
$response = $citas->Guardar($idpaciente,$idconsultorio,$iddoctor,$fecha,$hora,$emailpac,$telefono,$mensaje);

if($response == true){
	header("Location: ../view/appointments.php?msg=1");
}else{
	header("Location: ../view/appointments.php?msg=2");
}