<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{

include "header.php";
require "../model/doctor.model.php";

$doctores = new Doctores();
$doc = $doctores->Mostrardoctor($_SESSION['iddoctor']);
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Editar datos del Personal de Salud</h4>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="../controller/doctor.edit.controller.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre(s) <span class="text-danger">*</span></label>
                                        <input type="hidden" name="iddoctor" value="<?php echo $_SESSION['iddoctor'];?>">
                                        <input class="form-control" type="text" name="txtnombre" id="txtnombre" value="<?php echo $doc['nombre']?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input class="form-control" type="text" name="txtapellidos" id="txtapellidos" value="<?php echo $doc['apellidos']?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="txtemail" id="txtemail" value="<?php echo $doc['email']?>">
                                    </div>
                                </div>
                                
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecnac" id="txtfecnac" value="<?php echo $doc['fecnac'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label>Sexo <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtsexo" id="txtsexo" value="<?php echo $doc['sexo']?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input type="text" class="form-control" name="txtdireccion" id="txtdireccion" value="<?php echo $doc['direccion']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Departamento</label>
                                                <input type="text" class="form-control" name="txtdepartamento" id="txtdepartamento" value="<?php echo $doc['departamento']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Provincia</label>
                                                <input type="text" class="form-control" name="txtprovincia" id="txtprovincia" value="<?php echo $doc['provincia']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Distrito</label>
                                                <input type="text" class="form-control" name="txtdistrito" id="txtdistrito"  value="<?php echo $doc['distrito']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Profesion</label>
                                                <input type="text" class="form-control" name="txtprofesion" id="txtprofesion" value="<?php echo $doc['profesion']?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input class="form-control" type="text" name="txttelefono" id="txttelefono" value="<?php echo $doc['telefono']?>" required>
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
                                                <input type="file" class="form-control" name="foto" id="foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Breve Biografia</label>
                                <input class="form-control" type="text" name="txtbiografia" id="txtbiografia" value="<?php echo $doc['biografica']?>" required>
                                
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">ACTUALIZAR LOS DATOS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
            <hr>
            <h3>Cambiar los datos de inicio de sesion</h3>
            <form action="../controller/change.login.php" method="post">

                <div class="col-sm-6">
                    <input type="hidden" name="iddoctor" value="<?php echo $_SESSION['iddoctor'];?>">
                                    <div class="form-group">
                                        <label>Nombre usuario <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="txtusuario" id="txtusuario" required>
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
                                        <button type="submit" class="btn btn-warning">Guardar Cambios de acceso</button>
                                    </div>
                                </div>
            </form>



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
                        <a href="chat.html">See all messages</a>
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