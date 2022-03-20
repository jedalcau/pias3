<?php
session_start();
require "../model/login.model.php";

$user = trim(strtolower($_POST['txtuser']));
$pass = trim(strtolower($_POST['txtpass']));

$login = new Login();
$result = $login->Validar($user,$pass);
#idpersonal,nivel,activo,tipempleado
if($result['iddoctor'] == 1)
{
	
}

if($result['iddoctor'] > 0){
	
	if($result['activo'] == true){
		
		$datDoctor = $login->Doctor($result['iddoctor']);
		
		$_SESSION['iddoctor']  = $result['iddoctor'];
		$_SESSION['nomdoctor'] = $datDoctor['nomdoc'];
		$_SESSION['avatar']    = $datDoctor['avatar'];

		header("Location: ../view/index.php");
	}else{
		
		header("Location: ../index.php?msg=1");
	}
}else{
	if($result['idpersonal'] > 0)
	{
		
		if($result['activo'] == true){
			
			switch($result['nivel']) {
				case 1: # Administrador
					echo $_SESSION['administrator'] = $result['idpersonal'];
					header("Location: ../admin/index.php");
					break;
				case 3: # Empleado
					echo "Como Trabajador";
					break;
			}
			
		}else{
			header("Location: ../index.html?msg=1");
		}

	}else{
		header("Location: ../index.html?msg=2");
	}

}
