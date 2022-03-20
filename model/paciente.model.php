<?php 
require_once "Conexion.php";

class Pacientes
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}
	
	function Duplicado($dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$codpostal,$telefono,$foto,$status)
	{
		$sqlduplicado = "SELECT count(*) AS total_duplicados FROM paciente WHERE dni='$dni' AND nombre='$nombre' AND apellidos='$apellidos';";
		
		#echo $sqlduplicado;

		$res1 = $this->conn->ConsultaArray($sqlduplicado);
		
		return $res1['total_duplicados'];
	}
	function Guardar($dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$codpostal,$telefono,$foto,$status)
	{
		$fecCreate = date('Y-m-d H:i:s');

        $sqlinsert ="INSERT INTO paciente (idpac,dni,nombre,apellidos,email,fecnac,sexo,direccion,distrito,provincia,ciudad,codpostal,telefono,avatar,status,fecCreate) VALUES (null,'$dni','$nombre','$apellidos','$email','$fecnac','$sexo','$direccion','$distrito','$provincia','$ciudad','$codpostal','$telefono','$foto','$status','$fecCreate');";
		
        $res = $this->conn->ConsultaSin($sqlinsert);
		return $res;
		mysqli_close($this->conn);
	}

	function Buscartodos($dni="",$apellidos="")
	{
		
		if(empty($dni) && empty($apellidos)){
			#echo "Casillas vacias muestra los 10 primeros nombres";
			$sql = "SELECT idpac, nombre, apellidos, distrito, direccion, telefono, email FROM paciente LIMIT 10";
			$data = $this->conn->ConsultaCon($sql);
			return $data;
		}else{
			if(!empty($dni) && empty($apellidos)){
				#echo "DNI enviado";
				$sql = "SELECT idpac, nombre, apellidos, distrito, direccion, telefono, email FROM paciente WHERE dni = " .trim($dni);
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}

			if(empty($dni) && !empty($apellidos)){
				#echo "Apellido enviado";
				$sql = "SELECT idpac, nombre, apellidos, distrito, direccion, telefono, email FROM paciente WHERE apellidos LIKE '%$apellidos%'";
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}

			if(!empty($dni) && !empty($apellidos)){
				#echo "Ambos cuadros llenos";
				$sql = "SELECT idpac, nombre, apellidos, distrito, direccion, telefono, email FROM paciente WHERE dni = " .trim($dni);
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}
		}
		
		mysqli_close($this->conn);
	}

	function MostrarPaciente($idpac)
	{
		$sql = "SELECT idpac,dni,nombre,apellidos,email,fecnac,sexo,direccion,distrito,provincia,ciudad,codpostal,telefono,avatar FROM paciente WHERE idpac = " .$idpac;
		$data = $this->conn->ConsultaArray($sql);
		return $data;
		mysqli_close($this->conn);		
	}

	function Actualizar($idpac,$dni,$nombre,$apellidos,$email,$fecnac,$sexo,$direccion,$distrito,$provincia,$ciudad,$telefono,$avatar)
	{
		$sql = "UPDATE paciente SET dni = '$dni',nombre = '$nombre',apellidos = '$apellidos',email = '$email',fecnac = '$fecnac',sexo = '$sexo',direccion = '$direccion',distrito = '$distrito',provincia = '$provincia',ciudad = '$ciudad',telefono = '$telefono',avatar = '$avatar' WHERE idpac = " .$idpac;
		$data = $this->conn->ConsultaSin($sql);
		return $data;
		mysqli_close($this->conn);		
	}

	/*MODULO PARA BUSQUEDA*/
	function searchApellido($apellido)
	{
		$sql = "SELECT idpac, dni, concat(nombre,' ',apellidos) AS nombre, fecnac, sexo, distrito FROM paciente WHERE apellidos LIKE '%".$apellido."%';";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	function searchDni($dni)
	{
		$sql = "SELECT idpac, dni, concat(nombre,' ',apellidos) AS nombre, fecnac, sexo, distrito FROM paciente WHERE dni = '$dni';";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	function CantidadPacientes()
	{
		$sql = "SELECT count(*) as total FROM paciente";
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}
}

/*
$pacientes = new Pacientes();
$pac = $pacientes->Guardar('$dni','$nombre','$apellidos','$email','$fecnac','$sexo','$direccion','$distrito','$provincia','$ciudad','$codpostal','$telefono','$foto','1');
while($fila = $pac->fetch_array()){
	echo $fila[0];
	echo $fila[1];
	echo $fila[2];
	echo $fila[3];
	echo $fila[4];
	echo $fila[5];
	echo $fila[6];
	echo "<br>";
}
*/