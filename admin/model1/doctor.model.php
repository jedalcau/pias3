<?php 

require "Conexion.php";

class Doctor
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Duplicado($nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$status,$numcolegiatura){
		
		$sql = "SELECT iddoc FROM doctor WHERE nombre = '$nombre' AND apellidos = '$apellidos' AND email = '$email' AND fecnac = '$fecnac' AND sexo = '$sexo' AND numcolegiatura = '$numcolegiatura' AND direccion = '$direccion' AND departamento = '$departamento' AND provincia = '$provincia' AND distrito = '$distrito' AND profesion = '$profesion' AND telefono = '$telefono'";
		
		if($data = $this->conn->ConsultaArray($sql)){
			echo "Id resturn ".$data['iddoc'];
			$res = 1; # Hay resultado
		}else{
			$res = 2; # Ningun resultado
		}

		return $res;
	}

	public function Guardar($nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$status,$numcolegiatura)
	{
		$fecha = date('Y-m-d H:i:s');
		$sql = "INSERT INTO doctor VALUES (null,'$nombre','$apellidos','$email','$fecnac','$sexo','$numcolegiatura','$direccion','$departamento','$provincia','$distrito','$profesion','$telefono','$avatar','$biografica','1','$fecha','0');";
		
		if($this->conn->ConsultaSin($sql))
		{
		
			$sql_ultimo = "SELECT iddoc FROM doctor order by iddoc desc limit 1;";
			$ultimo = $this->conn->ConsultaArray($sql_ultimo);
			$iddoctor = $ultimo['iddoc'];

			# Agrega el usuario y contraseña en la tabla login
			$sql2 = "INSERT INTO login VALUES (null,'$username',md5('$passwd'),'$iddoctor',0,2,1,0);";
			$this->conn->ConsultaSin($sql2);

			$msg=true;
		}else{
			$msg = false;
		}
		
		return $msg;
	}

	function Mostrardoctor($iddoc)
	{
		$sql = "SELECT iddoc,nombre,apellidos,email,fecnac,numcolegiatura,sexo,direccion,departamento,provincia,distrito,profesion,telefono,avatar,biografica,status,fecCreate FROM doctor WHERE iddoc = " .$iddoc;
		$data = $this->conn->ConsultaArray($sql);
		return $data;
		
	}

	function Actualizar($iddoc,$nombre,$apellidos,$username,$email,$passwd,$fecnac,$sexo,$direccion,$departamento,$provincia,$distrito,$profesion,$telefono,$avatar,$biografica,$numcolegiatura)
	{
		$sql = "UPDATE doctor SET nombre = '$nombre',apellidos = '$apellidos',email = '$email',fecnac = '$fecnac',sexo = '$sexo',numcolegiatura = '$numcolegiatura',direccion = '$direccion',departamento = '$departamento',provincia = '$provincia',distrito = '$distrito',profesion = '$profesion',telefono = '$telefono',avatar = '$avatar',biografica = '$biografica' WHERE iddoc = ".$iddoc;
		$data = $this->conn->ConsultaSin($sql);
		
		return $data;
		
	}

	function ChangeLogin($iddoc,$username,$passwd)
	{
		$sql = "UPDATE login SET username = '$username',passwd = MD5('$passwd') WHERE iddoctor = ".$iddoc;

		$data = $this->conn->ConsultaSin($sql);
		
		return $data;
		
	}

	function Buscartodos()
	{
		$sql = "SELECT iddoc,nombre,apellidos,email,fecnac,numcolegiatura,sexo,direccion,departamento,provincia,distrito,profesion,telefono,avatar,biografica,status,fecCreate FROM doctor;";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		
	}

	function AddEducation($iddoc,$trabajo,$cargo,$tiempo)
	{
		$sql = "INSERT INTO educacion VALUES (null,'$iddoc','$trabajo','$cargo','$tiempo');";
		$data = $this->conn->ConsultaSin($sql);
		return $data;
		
	}

	function ListEducation($iddoc)
	{
		$sql = "SELECT ideducacion,iddoc, trabajo, cargo, tiempo FROM educacion WHERE iddoc = ".$iddoc;
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		
	}

	function AddExperiencia($iddoc,$centrabajo,$fechainicio,$fechafin,$totalanios,$totalmeses)
	{
		$sql = "INSERT INTO experiencia VALUES (null,'$iddoc','$centrabajo','$fechainicio','$fechafin','$totalanios','$totalmeses')";
		$data = $this->conn->ConsultaSin($sql);
		return $data;
		
	}

	function ListExperiencia($iddoc)
	{
		$sql = "SELECT idexperiencia,iddoc,centrabajo,fechainicio,fechafin,totalanios,totalmeses FROM experiencia WHERE iddoc = ".$iddoc;
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		
	}
}

/*$doctores = new Doctores();
$doc = $doctores->Mostrardoctor(4);*/