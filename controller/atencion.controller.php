<?php
require "../model/atencion.model.php";

$numhistoria  = trim(strtoupper($_REQUEST['historia']));
$codsis       = trim(strtoupper($_REQUEST['codigosis']));
$nombres      = trim(strtoupper($_REQUEST['nombres']));
$edad         = trim(strtoupper($_REQUEST['edad']));
$tipusuario   = trim(strtoupper($_REQUEST['tipousuario']));
$tipatencion  = trim(strtoupper($_REQUEST['tipoatencion']));
$especialidad = trim(strtoupper($_REQUEST['especialidad']));
$otros        = trim(strtoupper($_REQUEST['otro']));
$idhc         = 0;
$iddoc        = $_REQUEST['iddoctor'];
$idpaciente   = $_REQUEST['idpaciente'];

$atencion = new Atencion();
$response = $atencion->Guardar($numhistoria,$codsis,$nombres,$edad,$tipusuario,$tipatencion,$especialidad,$otros,$idhc,$iddoc,$idpaciente);

//echo "Ultimo: ".$response['idatencion'];
$ruta = "hc2.php?dni=".$numhistoria."&nombre=".$nombres."&id=".$idpaciente."&idatencion=".$response['idatencion']."&edad=".$edad;
header("Location: ../view/".$ruta);
	