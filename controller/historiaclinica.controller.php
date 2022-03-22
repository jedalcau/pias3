<?php
session_start();

if(isset($_SESSION['iddoctor']))
{
	require "../model/historiaclinica.model.php";

	$idpaciente     = trim(strtoupper($_POST['txtidpaciente']));
	$iddoctor       = $_SESSION['iddoctor'];
	$idconsultorio  = trim(strtoupper($_POST['cboconsultorio']));
	$numhc          = trim(strtoupper($_POST['txtdni']));
	$fecha          = trim(strtoupper($_POST['txtfecha']));
	$hora           = trim(strtoupper($_POST['txthora']));
	$edad           = trim(strtoupper($_POST['txtedad']));
	$motivo         = trim(strtoupper($_POST['txtmotivo']));
	$sintomas       = trim(strtoupper($_POST['txtsintomas']));
	$relato         = trim(strtoupper($_POST['txtrelato']));
	$vacunas        = trim(strtoupper($_POST['txtvacunas']));
	$apetito        = trim(strtoupper($_POST['txtapetito']));
	$sed            = trim(strtoupper($_POST['txtsed']));
	$sueno          = trim(strtoupper($_POST['txtsueno']));
	$orina          = trim(strtoupper($_POST['txtorina']));
	$deposicion     = trim(strtoupper($_POST['txtdeposiciones']));
	$fiebre         = trim(strtoupper($_POST['cbofiebre']));
	$viajo          = trim(strtoupper($_POST['cboviajo']));
	$lugar          = trim(strtoupper($_POST['txtlugar']));
	$tos            = trim(strtoupper($_POST['cbotos']));
	$secrecion      = trim(strtoupper($_POST['cbosecrecion']));
	$fur            = trim(strtoupper($_POST['txtfur']));
	$examenfisico   = trim(strtoupper($_POST['txtexamenfisico']));
	$temp           = trim(strtoupper($_POST['txttemperatura']));
	$pa             = trim(strtoupper($_POST['txtpresionarterial']));
	$fc             = trim(strtoupper($_POST['txtfc']));
	$fr             = trim(strtoupper($_POST['txtfr']));
	$peso           = trim(strtoupper($_POST['txtpeso']));
	$talla          = trim(strtoupper($_POST['txttalla']));
	$pabd           = trim(strtoupper($_POST['txtpabdominal']));
	$saturacion     = trim(strtoupper($_POST['txtsaturacion']));
	$diagnostico    = trim(strtoupper($_POST['txtdiagnostico']));
	$tipoexamen     = trim(strtoupper($_POST['cbotipoexamen']));
	$ciex           = trim(strtoupper($_POST['txtciex']));
	$tratamiento    = trim(strtoupper($_POST['txttratamiento']));
	$via            = trim(strtoupper($_POST['txtvia']));
	$dosis          = trim(strtoupper($_POST['txtdosis']));
	$frecuencia     = trim(strtoupper($_POST['txtfrecuencia']));
	$medidas1       = trim(strtoupper($_POST['txtmedidas1']));
	$examauxiliares = trim(strtoupper($_POST['txtexamauxiliares']));
	$preventivas    = trim(strtoupper($_POST['txtpreventivas']));
	$proximacita    = trim(strtoupper($_POST['txtproximacita']));
	$obs            = trim(strtoupper($_POST['txtobservacion']));
	$idatencion     = trim(strtoupper($_POST['idatencion']));

	$hc = new HistoriaClinica();
	$res = $hc->Guardar($numhc,$idpaciente,$fecha,$hora,$edad,$motivo,$sintomas,$relato,$vacunas,$apetito,$sed,$sueno,$orina,$deposicion,$fiebre,$viajo,$lugar,$tos,$secrecion,$fur,$examenfisico,$temp,$pa,$fc,$fr,$peso,$talla,$pabd,$saturacion,$diagnostico,$tipoexamen,$ciex,$tratamiento,$via,$dosis,$frecuencia,$medidas1,$examauxiliares,$preventivas,$proximacita,$obs,$idconsultorio,$iddoctor,$idatencion);

	header("Location: ../view/listahc.php?id=".$res);

}else{
    header("Location: ../index.html");
}
