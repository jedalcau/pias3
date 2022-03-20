<?php
include "header.php";
require "../model/paciente.model.php";

$idpac = $_REQUEST['idpac'];
$pacientes = new Pacientes();
$pac = $pacientes->MostrarPaciente($idpac);
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Editar datos del Paciente</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="controller1/paciente.controller.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                        <input type="hidden" name="idpac" value="<?php echo $idpac;?>">
                                    <div class="form-group">
                                        <label>Nombre(s) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtnombre" id="txtnombre" required value="<?php echo $pac['nombre'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellidos<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtapellidos" id="txtapellidos" required value="<?php echo $pac['apellidos'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecnacimiento" id="txtfecnacimiento" required  value="<?php echo $pac['fecnac'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="txtemail" id="txtemail" value="<?php echo $pac['email'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Sexo: </label>
                                        <input class="form-control" type="text" name="txtsexo" id="txtsexo" required value="<?php echo $pac['sexo'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DNI <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtdni" id="txtdni" required value="<?php echo $pac['dni'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" name="txtdireccion" id="txtdireccion" value="<?php echo $pac['direccion'];?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Provincia</label>
                                                <input type="text" class="form-control" name="txtprovincia" id="txtprovincia" value="<?php echo $pac['provincia'];?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Distrito</label>
                                                <input type="text" class="form-control" name="txtdistrito" id="txtdistrito" value="<?php echo $pac['distrito'];?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Ciudad/Localidad</label>
                                                <input type="text" class="form-control"  name="txtciudad" id="txtciudad" value="<?php echo $pac['ciudad'];?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" type="text" name="txttelefono" id="txttelefono" required value="<?php echo $pac['telefono'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="foto" id="foto"  value="<?php echo $pac['avatar'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn" name="btnCrear" id="btnCrear">ACTUALIZAR LOS DATOS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
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
                        <a href="chat.html">ver todos los mensajes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.html"; ?>