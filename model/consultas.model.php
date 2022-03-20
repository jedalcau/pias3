<?php 
require "Conexion.php";

class Consultas
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	
	function ListadoConsultorios()
	{
		$sql = "SELECT idconsultorio, consultorio FROM consultorio;";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

    function ListadoPacientes()
	{
		$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres FROM paciente ORDER BY apellidos;";

		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

    function ListadoDoctores()
	{
		$sql = "SELECT iddoc, concat(nombre,' ',apellidos) as doc FROM doctor ORDER BY apellidos;";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	/*
	$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres, dni FROM paciente ORDER BY apellidos;";
		
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	*/
	function ListadoPacientes1($dni="",$apellidos="")
	{
		if(empty($dni) && empty($apellidos)){
			#echo "Casillas vacias muestra los 10 primeros nombres";
			$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres, dni, ciudad, fecnac FROM paciente ORDER BY apellidos LIMIT 10";
			$data = $this->conn->ConsultaCon($sql);
			return $data;
		}else{
			if(!empty($dni) && empty($apellidos)){
				#echo "DNI enviado";
				$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres, dni,ciudad, fecnac FROM paciente WHERE dni = " .trim($dni);
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}

			if(empty($dni) && !empty($apellidos)){
				#echo "Apellido enviado";
				$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres, dni,ciudad, fecnac FROM paciente WHERE apellidos LIKE '%$apellidos%'";
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}

			if(!empty($dni) && !empty($apellidos)){
				#echo "Ambos cuadros llenos";
				$sql = "SELECT idpac, concat(nombre,' ',apellidos) AS nombres, dni,ciudad, fecnac FROM paciente WHERE dni = " .trim($dni);
				$data = $this->conn->ConsultaCon($sql);
				return $data;
			}
		}
		
	}

	function NombrePaciente($idpaciente)
	{
		$sql = "SELECT concat(nombre,' ',apellidos) as paciente, dni, email, sexo, distrito, telefono FROM hospital.paciente WHERE idpac = " .$idpaciente;
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

	function NombreConsultorio($idconsultorio)
	{
		$sql = "SELECT consultorio, descripcion FROM consultorio WHERE idconsultorio = ".$idconsultorio;
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

	function NombreDoctor($iddoctor)
	{
		$sql = "SELECT concat(nombre,' ',apellidos) AS doctor, profesion, telefono FROM doctor WHERE iddoc = " .$iddoctor;
		
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

	function ListaHistoriaClinica($idpaciente)
	{
		$sql = "SELECT numhistclinica, fecconsulta,horaconsulta,idconsultorio, idhc, idpaciente FROM historiaclinica WHERE idpaciente = " .$idpaciente." ORDER BY fecconsulta DESC";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	function HistoriaClinica($idhc)
	{
		$sql = "SELECT idhc,numhistclinica,(SELECT concat(nombre,' ',apellidos) FROM paciente WHERE idpac = idpaciente) AS nombre,fecconsulta,horaconsulta,edad,motivo,signos,relato,vacunas,apetito,sed,sueno,orina,deposicion,fiebre15,viaje,lugar,tos15,secresion,fur,examenfisico,temp,pa,fc,fr,peso,talla,pabd,saturacion,diagnostico,tipoexamen,ciex,tratamiento,via,dosis,frecuencia,medidashigienicas,examenesauxiliares,medidaspreventivas,proximaconsulta,observaciones,idconsultorio,(SELECT concat(d.nombre,' ',d.apellidos) FROM doctor as d WHERE iddoc=iddoctor) AS medico, (SELECT numcolegiatura FROM doctor as d WHERE iddoc=iddoctor) AS colegiatura FROM historiaclinica WHERE idhc = ".$idhc;
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

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

	function Pacientes5()
	{
		$sql = "SELECT concat(nombre,' ',apellidos) as paciente, sexo FROM paciente ORDER BY idpac DESC LIMIT 5;";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	function Citas5()
	{
		$sql = "SELECT (SELECT concat(p.nombre,' ',p.apellidos) as paciente from paciente AS p WHERE p.idpac = c.idpaciente) AS pac, 
		(SELECT concat(d.nombre,' ',d.apellidos) as doctor FROM doctor AS d WHERE d.iddoc = c.iddoctor) AS doc,
		(SELECT o.consultorio FROM consultorio AS o WHERE o.idconsultorio = c.idconsultorio) AS consul,
		c.fecha, c.hora, c.telefono FROM citas AS c WHERE status = 1 ORDER BY idcitas DESC LIMIT 5;";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
	}

	function ContarDoctores()
	{
		$sql = "SELECT count(*) as total FROM doctor;";
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

	function ContarPacientes()
	{
		$sql = "SELECT count(*) AS total FROM paciente;";
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}

	function Receta($idhc)
	{
		$sql = "SELECT a.idatencion,a.numhistoria,a.codsis,a.nombres,a.edad,a.tipusuario,a.tipatencion,a.especialidad,a.otros,a.idhc, h.diagnostico,h.tratamiento FROM atencion AS a , historiaclinica AS h WHERE a.idhc = h.idhc AND h.idhc = ". $idhc;
		$data = $this->conn->ConsultaArray($sql);
		return $data;
	}
}

	
