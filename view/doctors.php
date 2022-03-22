<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{
include "header.php";
@$mensaje = $_REQUEST['msg'];

require_once "../model/doctor.model.php";
$doctores = new Doctores();
$data = $doctores->Buscartodos();

?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Personal de Salud</h4>
                        <?php
                        if($mensaje == ""){
                            $mensaje="";
                        }
                        if($mensaje == 1){
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Registro Exitoso!</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                        if($mensaje == 2){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Error!</strong> Datos DUPLICADOS!.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        }
                        if($mensaje == 3){
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Los Datos se Actualizaron correctamente!</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                        if($mensaje == 4){
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>¡¡Ha cambiado el nombre de usuario y contraseña!! de forma exitosa. A partir de ahora debe usar el nombre de usuario y contraseña nuevos para ingresar a la plataforma.</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        
                    </div>
                </div>

				<div class="row doctor-grid">
                        <?php 
                            while ($fila = $data->fetch_array(MYSQLI_ASSOC)){
                                #echo $fila['iddoc'];
                        ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.php"><img alt="" src="<?php echo $fila['avatar'];?>"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-doctor.php"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $fila['nombre']." ".$fila['apellidos']; ?></a></h4>
                            <div class="doc-prof"><?php echo $fila['profesion']; ?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $fila['biografica']; ?>
                            </div>
                        </div>
                    </div>
                        <?php 
                            }
                        ?>
                    
                    
                </div>
				<div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Cargar mas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Mensajes</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jesus Alanoca</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Consulta</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">Ver todos los mensajes</a>
                    </div>
                </div>
            </div>
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>¿Esta seguro de borrar este doctor?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
							<button type="submit" class="btn btn-danger">Borrar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

<?php 
include "footer.html"; 
}else{
    header("Location: ../index.html");
}
?>