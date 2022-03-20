<?php
require "../model/AddGradosAcademicos.model.php";

$iddoc       = $_REQUEST['iddoc1'];
$centrabajo  = trim(strtoupper($_REQUEST['centrabajo']));
$fechainicio = trim(strtoupper($_REQUEST['fechainicio']));
$fechafin    = trim(strtoupper($_REQUEST['fechafin']));
$totalanios  = trim(strtoupper($_REQUEST['totalanios']));
$totalmeses  = trim(strtoupper($_REQUEST['totalmeses']));

$add = new AddGradosAcademicos();
$res = $add->AddExperiencia($iddoc,$centrabajo,$fechainicio,$fechafin,$totalanios,$totalmeses);