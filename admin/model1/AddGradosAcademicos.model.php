<?php 
require "Conexion.php";

class AddGradosAcademicos
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	
	function AddGrados($iddoc,$trabajo,$cargo,$tiempo)
	{
		$sql = "INSERT INTO educacion VALUES (null,'$iddoc','$trabajo','$cargo','$tiempo')";
		
		$data = $this->conn->ConsultaSin($sql);
		return $data;
	}

	function AddExperiencia($iddoc,$centrabajo,$fechainicio,$fechafin,$totalanios,$totalmeses)
	{
		$sql = "INSERT INTO experiencia VALUES (null,'$iddoc','$centrabajo','$fechainicio','$fechafin','$totalanios','$totalmeses');";
		
		$data = $this->conn->ConsultaSin($sql);
		return $data;
	}

}