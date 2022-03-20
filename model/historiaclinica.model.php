<?php 

require "Conexion.php";

class HistoriaClinica
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function Guardar($numhc,$idpaciente,$fecha,$hora,$edad,$motivo,$sintomas,$relato,$vacunas,$apetito,$sed,$sueno,$orina,$deposicion,$fiebre,$viajo,$lugar,$tos,$secrecion,$fur,$examenfisico,$temp,$pa,$fc,$fr,$peso,$talla,$pabd,$saturacion,$diagnostico,$tipoexamen,$ciex,$tratamiento,$via,$dosis,$frecuencia,$medidas1,$examauxiliares,$preventivas,$proximacita,$obs,$idconsultorio,$iddoctor,$idatencion)
	{
		$fecCreate = date('Y-m-d H:i:s');

		//Insertar
        $sqlinsert ="INSERT INTO historiaclinica (idhc,numhistclinica,idpaciente,fecconsulta,horaconsulta,edad,motivo,signos,relato,vacunas,apetito,sed,sueno,orina,deposicion,fiebre15,viaje,lugar,tos15,secresion,fur,examenfisico,temp,pa,fc,fr,peso,talla,pabd,saturacion,diagnostico,tipoexamen,ciex,tratamiento,via,dosis,frecuencia,medidashigienicas,examenesauxiliares,medidaspreventivas,proximaconsulta,observaciones,fecCreate,idconsultorio,fecChange,iddoctor) VALUES (null,'$numhc','$idpaciente','$fecha','$hora','$edad','$motivo','$sintomas','$relato','$vacunas','$apetito','$sed','$sueno','$orina','$deposicion','$fiebre','$viajo','$lugar','$tos','$secrecion','$fur','$examenfisico','$temp','$pa','$fc','$fr','$peso','$talla','$pabd','$saturacion','$diagnostico','$tipoexamen','$ciex','$tratamiento','$via','$dosis','$frecuencia','$medidas1','$examauxiliares','$preventivas','$proximacita','$obs','$fecCreate','$idconsultorio','$fecCreate','$iddoctor');";
        //Inserta datos de la Historia Clinica
        $res = $this->conn->ConsultaSin($sqlinsert);

        //Buscar el ultim registro de historia clinica
        $sql_ultimo = "SELECT idhc FROM historiaclinica order by idhc desc limit 1;";
        $res_ultimo = $this->conn->ConsultaArray($sql_ultimo);

		$sql_consultorio = "SELECT consultorio AS nom_consul FROM consultorio WHERE idconsultorio = ".$idconsultorio;
		$res_consultorio = $this->conn->ConsultaArray($sql_consultorio);
        // Actualiza la informacion de Atencion en la Historia Clinica
        $sql2 = "UPDATE atencion SET idhc = ".$res_ultimo['idhc'].", especialidad = '".$res_consultorio['nom_consul']."' WHERE idatencion = ". $idatencion;
        $this->conn->ConsultaSin($sql2);

		return $idpaciente;
		mysqli_close($this->conn);
	}

	function Buscartodos()
	{
		$sql = "SELECT * FROM doctor";
		$data = $this->conn->ConsultaCon($sql);
		return $data;
		mysqli_close($this->conn);
	}
}

