<?php
require "../model/AddGradosAcademicos.model.php";

$iddoc   = $_REQUEST['iddoc1'];
$trabajo = trim(strtoupper($_REQUEST['trab']));
$cargo   = trim(strtoupper($_REQUEST['carg']));
$tiempo  = trim(strtoupper($_REQUEST['tiemp']));

$add = new AddGradosAcademicos();
$res = $add->AddGrados($iddoc,$trabajo,$cargo,$tiempo);
