<?php 
session_start();
if(isset($_SESSION['administrator']))
{
include "header.php";
require "../model/consultorio.model.php";

$consultorio = new Consultorio();
$data = $consultorio->Buscartodos();


 ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Consultorios</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="add-department.php" class="btn btn-primary">Agregar consultorio</a>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Consultorio</th>
                                        <th>Estado</th>
                                        <th class="text-right">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i =1;
                                    while($fila = $data->fetch_array(MYSQLI_ASSOC)){
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php $fila['idconsultorio']; echo $fila['consultorio']?></td>
										<td>
                                            <?php 
                                                if($fila['status'] ==1)
                                                {
                                            ?>
                                                <span class="custom-badge status-green">Activo</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-department.php?idconsultorio=<?php echo $fila['idconsultorio'];?>"><i class="fa fa-pencil m-r-5"></i> Editar 1</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Borrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php
                                              }else{
                                            ?>
                                                <span class="custom-badge status-red">Inactivo</span>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-department.php?idconsultorio=<?php echo $fila['idconsultorio'];?>"><i class="fa fa-pencil m-r-5"></i> Editar 1</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Borrar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php    
                                                }
                                                $i++;
                                    }

                                            ?>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
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
                                            <span class="message-author">nombre </span>
                                            <span class="message-time">Hora</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">mensaje</span>
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
		<div id="delete_department" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>¿Esta seguro de que quiere eliminar este consultorio?</h3>
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