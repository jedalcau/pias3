<?php 
require_once "Conexion.php";

class Consultorio
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Guardar($consultorio,$descripcion,$status)
	{
		$fecCreate = date('Y-m-d H:i:s');

		$sqlduplicado = "SELECT idconsultorio FROM consultorio WHERE consultorio = '$consultorio' AND descripcion = '$descripcion'";
		
		$res1 = $this->conn->ConsultaCon($sqlduplicado);
		$num = $res1->num_rows;
        	
        	if($num > 0){
        		#echo "Dato duplicado";
        		return false;
        	}else{
	        		//Insertar
        		$sqlinsert ="INSERT INTO consultorio (idconsultorio,consultorio,descripcion,status) VALUES (null,'$consultorio','$descripcion','$status');";
		
        		
        		$this->conn->ConsultaSin($sqlinsert);
				return true;
        	}
        

		mysqli_close($this->conn);
	}

	function Editar($idconsultorio,$consultorio,$descripcion,$status)
	{
		$sql = "UPDATE consultorio SET consultorio = '$consultorio',descripcion = '$descripcion',status = '$status' WHERE idconsultorio = " .$idconsultorio;
		
		$data = $this->conn->ConsultaSin($sql);
		return $data;
		mysqli_close($this->conn);
	}

	function MostrarConsultorio($idconsultorio)
	{
		$sql = "SELECT idconsultorio, consultorio, descripcion,status as est FROM consultorio WHERE idconsultorio=".$idconsultorio;
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
		mysqli_close($this->conn);
	}

	function Buscartodos()
	{
		$sql = "SELECT * FROM consultorio;";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		mysqli_close($this->conn);
	}

}
