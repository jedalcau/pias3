<?php 
require "Conexion.php";

class Atencion
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Guardar($numhistoria,$codsis,$nombres,$edad,$tipusuario,$tipatencion,$especialidad,$otros,$idhc,$iddoc,$idpaciente)
	{
		$feccreate = date('Y-m-d H:i:s');

		//Insertar
        $sql ="INSERT INTO atencion VALUES (null,'$numhistoria','$codsis','$nombres','$edad','$tipusuario','$tipatencion','$especialidad','$otros','$idhc','$feccreate','$iddoc','$idpaciente')";
		
        $this->conn->ConsultaSin($sql);

        $sql_ultimo = "SELECT idatencion FROM atencion order by idatencion desc LIMIT 1";
		$ultimo = $this->conn->ConsultaArray($sql_ultimo);
		return $ultimo;
		mysqli_close($this->conn);
	}

	
}
