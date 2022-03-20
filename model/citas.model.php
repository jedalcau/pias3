<?php 

require "Conexion.php";

class Citas
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Guardar($idpaciente,$idconsultorio,$iddoctor,$fecha,$hora,$emailpac,$telefono,$mensaje)
	{
		$feccreate = date('Y-m-d H:i:s');

		$numero = $this->UltimoCodigo();
		$num3 = $numero[0];
		$next = $num3 + 1;

		$codcita = "APT-000".$next;

		$sqlduplicado = "SELECT idcitas FROM citas WHERE idpaciente = '$idpaciente' AND idconsultorio = '$idconsultorio' AND iddoctor = '$iddoctor' AND fecha = '$fecha' AND hora = '$hora';";
		
		
			$res1 = $this->conn->ConsultaCon($sqlduplicado);
        	$num = $res1->num_rows;
        	
        	if($num > 0){
        		#echo "Dato duplicado";
        		return false;
        	}else{
	        		//Insertar
        		$sqlinsert ="INSERT INTO citas (idcitas,codcita,idpaciente,idconsultorio,iddoctor,fecha,hora,emailpac,telefono,mensaje,feccreate,status,idreferencia) VALUES (NULL,'$codcita','$idpaciente','$idconsultorio','$iddoctor','$fecha','$hora','$emailpac','$telefono','$mensaje','$feccreate',1,null);";
		
        		$this->conn->ConsultaSin($sqlinsert);

				return true;
        	}
        

        
		mysqli_close($this->conn);
		
	}

	function Buscartodos()
	{
		$sql = "SELECT idcitas, codcita, idpaciente, idconsultorio, iddoctor, fecha, hora, emailpac, telefono, mensaje, status FROM citas ORDER BY feccreate DESC LIMIT 30;";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		mysqli_close($this->conn);

	}

	function UltimoCodigo()
	{
		$sql = "SELECT MAX(idcitas) AS last FROM citas;";
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
		mysqli_close($this->conn);
	}

	//idcitas, codcita, idpaciente, idconsultorio, iddoctor, fecha, hora, emailpac, telefono, mensaje
	function MostrarPaciente($idpaciente)
	{
		$sql = "SELECT concat(nombre,' ',apellidos) AS nombres FROM paciente WHERE idpac = " . $idpaciente;
		$data = $this->conn->ConsultaArray($sql);
		return $data['nombres'];
		mysqli_close($this->conn);
	}

	function MostrarConsultorio($idconsultorio)
	{
		$sql = "SELECT consultorio FROM consultorio WHERE idconsultorio = " .$idconsultorio;
		$data = $this->conn->ConsultaArray($sql);
		return $data['consultorio'];
		mysqli_close($this->conn);
	}

	function MostrarDoctor($iddoctor)
	{
		$sql = "SELECT concat(nombre,' ',apellidos) AS doctor FROM doctor WHERE iddoc = " .$iddoctor;
		$data = $this->conn->ConsultaArray($sql);
		return $data['doctor'];
		mysqli_close($this->conn);
	}

}
