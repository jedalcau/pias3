<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>PIAS</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--[if lt IE 9]>
		<script src="assets/js/php5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->

</head>


<body onload="menu()">
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>PIAS</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" width="40" src="<?php echo $_SESSION['avatar'];?>" alt="" />
							<span class="status online"></span>
                        </span>
                        <span><?php echo $_SESSION['nomdoctor'];?></span>
                        
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.php">Mi perfil</a>
						<a class="dropdown-item" href="../controller/session_close.php">Salir</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">Mi perfil</a>
                    <a class="dropdown-item" href="edit-profile.php">Editar mi Perfil</a>
                    <a class="dropdown-item" href="../controller/session_close.php">Salir</a>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul class="contenido" id="contenido">
                        <li class="menu-title">Menu principal</li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Personal de Salud</span></a>
                        </li>
                        <li>
                            <a href="paciente.php"><i class="fa fa-wheelchair"></i> <span>Pacientes</span></a>
                        </li>
                        <li>
                            <a href="hc1.php"><i class="fa fa-pencil"></i> <span>Historia Clinica</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Citas</span></a>
                        </li>
                        
                        <li>
                            <a href="departments.php"><i class="fa fa-hospital-o"></i> <span>Consultorios</span></a>
                        </li>
                        
                        <li class="submenu">
                            <a href="#"><i class="fa fa-flag-o"></i> <span> Reportes </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <!-- <li><a href="expense-reports.php"> Reporte 1 </a></li>
                                <li><a href="invoice-reports.php"> Reporte 2 </a></li> -->
                                <li><a href="report1.php"> Reporte 1 </a></li>
                                
                            </ul>
                        </li>
                        <hr>
                        <li>
                            <p>Sistema Desarrollado por:</p>
                            <li>Jesus David Alanoca Cauna</li>
                            <li>Jose Luis Angeles Aliaga</li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


<?php
    include 'foooter.php';
}else{
header("Location: ../index.html");
}
?>