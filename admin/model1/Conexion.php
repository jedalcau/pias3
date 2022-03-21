<?php

class Conexion
{
	private $conn;

	function __construct()
	{
		$host = "localhost";
        $user = "usr_pias";
        $pass = "pass_pias";
        $db   = "db_pias";

        $this->conn = new mysqli($host, $user, $pass, $db);
        
        if ($this->conn->connect_errno) {
            echo "Error al contenctar a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error;
            exit();
        }

        //echo $this->conn->host_info. " PIAS";
        return $this->conn;
	}

	public function ConsultaSin($sql)
    {
        # Sirve para: INSERT, UPDATE, DELETE
        #echo $sql;

        if(!$this->conn->query($sql)){
            echo "Error. ".mysqli_error($this->conn);
            exit();
        }

        return true;
        mysqli_close($this->conn);
    }

    public function ConsultaCon($sql)
    {
        # Sirve para: SELECT
        
        if(!$result = $this->conn->query($sql)){
            echo "Error: ".mysqli_error($this->conn);
            return false;
            exit();
        }

        return $result;
        mysqli_close($this->conn);
    }

    public function ConsultaArray($sql)
    {
        # Sirve para: SELECT convertido en array
        #echo $sql;

        if(!$result = $this->conn->query($sql)){
            echo "Error. ".mysqli_error($this->conn);
            return false;
        }

        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data;
        mysqli_close($this->conn);
    }
}
