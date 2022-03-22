<?php
require "Conexion.php";

class Login extends Conexion
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Validar($user, $pass)
	{
        $sql ="SELECT iddoctor, idpersonal,nivel,activo FROM login WHERE username='$user' and passwd = MD5('$pass')";
        
        $res = $this->conn->ConsultaArray($sql);
		return $res;
		mysqli_close($this->conn);
	}

	function Doctor($iddoctor){
		$sql = "SELECT concat(nombre,' ',apellidos) as nomdoc, avatar FROM doctor WHERE iddoc = ".$iddoctor;
		$doctor = $this->conn->ConsultaArray($sql);
		return $doctor;
	}

}
