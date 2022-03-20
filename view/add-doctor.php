<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{

include "header.php"; 
?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-title">Nuevo Personal de Salud</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="../controller/doctor.controller.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtnombre" id="txtnombre" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input class="form-control" type="text" name="txtapellidos" id="txtapellidos" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre usuario <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtusuario" id="txtusuario" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="txtemail" id="txtemail" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="txtpasswd1" id="txtpasswd1" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirmar Password</label>
                                        <input class="form-control" type="password" name="txtpasswd2" id="txtpasswd2" required>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecnac" id="txtfecnac">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Genero:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="sexo" value="Masculino" class="form-check-input">Masculino
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="sexo" value="Femenino" class="form-check-input">Femenino
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Dirección</label>
												<input type="text" class="form-control" name="txtdireccion" id="txtdireccion">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Departamento</label>
												<input type="text" class="form-control" name="txtdepartamento" id="txtdepartamento">
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Provincia</label>
                                                <input type="text" class="form-control" name="txtprovincia" id="txtprovincia">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Distrito</label>
                                                <input type="text" class="form-control" name="txtdistrito" id="txtdistrito">
                                            </div>
                                        </div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Profesion</label>
												<input type="text" class="form-control" name="txtprofesion" id="txtprofesion">
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input class="form-control" type="text" name="txttelefono" id="txttelefono" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/user.jpg" >
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="foto" id="foto" required>
											</div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Breve Biografia</label>
                                <textarea class="form-control" rows="3" cols="30" name="txtbiografia" id="txtbiografia"></textarea>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Crear Doctor</button>
                            </div>
                        </form>
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