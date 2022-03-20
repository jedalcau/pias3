<?php
session_start();
include "header.php";
@$mensaje = $_REQUEST['msg'];

require "../model/citas.model.php";

$citas = new Citas();
$listcitas = $citas->Buscartodos();


?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Proximas Citas (En desarrollo)</h4>
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
                                <strong>Error!</strong> Ocurrio un error al Crear la Cita!  Llame al responsable de informatica e informe del este error. Disculpe las molestias
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-appointment.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Agregar Cita</a>
                    </div>
					
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Cod. Cita</th>
										<th>Nombre Paciente</th>
										<th>Nombre de Doctor</th>
										<th>Consultorio</th>
										<th>Fecha de Cita</th>
										<th>Hora de Cita</th>
										<th>Estado</th>
										<th class="text-right">Accion</th>
									</tr>
								</thead>
								<tbody>
								<?php
									while($fila = $listcitas->fetch_array(MYSQLI_ASSOC)){
										//idcitas, codcita, idpaciente, idconsultorio, iddoctor, fecha, hora, emailpac, telefono, mensaje
										//echo  $fila['idcitas'];
								?>
									<tr>
										<td><?php  echo $fila['codcita'];?></td>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> 
										<?php 
											echo $paciente = $citas->MostrarPaciente($fila['idpaciente']);
										?>
										</td>
										
										<td><?php 
											echo $consultorio = $citas->MostrarDoctor($fila['iddoctor']);
											?>
										</td>
										<td><?php 
											echo $consultorio = $citas->MostrarConsultorio($fila['idconsultorio']);
											?>
										</td>
										<td><?php echo $fila['fecha']; ?></td>
										<td><?php echo $fila['hora']; ?></td>
										<td>
											<?php
												
												if($fila['status'] == 1){
											?>
													<span class="custom-badge status-green">Activo</span>
											<?php
												}else{
											?>
													<span class="custom-badge status-red">Inactivo</span>
											<?php			
												}
											?>
											
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-appointment.php"><i class="fa fa-pencil m-r-5"></i> Editar</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
												</div>
											</div>
										</td>
									</tr>
								<?php }?>
									
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
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
			<div id="delete_appointment" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center">
							<img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3>¿Realmente desea anular esta cita?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
								<button type="submit" class="btn btn-danger">Anular</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

<?php include "footer.html"; ?>