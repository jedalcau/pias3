<?php 
session_start();
if(isset($_SESSION['administrator']))
{
    require_once "header.php";
    @$mensaje = $_REQUEST['msg'];

    require_once "model1/doctor.model.php";
    $doctores = new Doctor();
    $data = $doctores->Buscartodos();

?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-12">
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
                                <strong>Error!</strong> El personal de Salud que intenta ingresar ya esta Ingresado. DUPLICADOS!.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        }
                        if($mensaje == 3){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Error!</strong> No se guardo por un error.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-doctor.php" class="btn btn-primary">Agregar nuevo Personal de Salud</a>
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
                                <a class="avatar" href="profile.php?iddoc=<?php echo $fila['iddoc']; ?>"><img alt="" src="<?php echo $fila['avatar'];?>"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-doctor.php?iddoc=<?php echo $fila['iddoc']; ?>"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Borrar</a>
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
		
</div>

<?php 
include "footer.html"; 
}else{
    header("Location: ../index.html");
}
?>