<?php
session_start();
if(isset($_SESSION['iddoctor']))
{
    include "header.php";
    require "../model/doctor.model.php";
    $doctores = new Doctores();
    $doctor = $doctores->Mostrardoctor($_SESSION['iddoctor']);

    $grados = $doctores->ListEducation($_SESSION['iddoctor']);
    $experiencia = $doctores->ListExperiencia($_SESSION['iddoctor']);
?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Editar mi perfil</h4>
                    </div>
                </div>
                <form>
                    <div class="card-box">
                        <h3 class="card-title">Informacion Basica</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <img class="inline-block" src="<?php echo $doctor['avatar'];?>" alt="Personal de salud">
                                    <div class="fileupload btn">
                                        <span class="btn-text">Editar</span>
                                        <input class="upload" type="file">
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Nombre(s)</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control floating" value="<?php echo $doctor['nombre'];?>" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Apellidos</label>
                                                <input type="text" name="apellidos" id="apellidos" class="form-control floating" value="<?php echo $doctor['apellidos'];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Fecha de Nacimiento</label>
                                                <div class="cal-icon">
                                                    <input class="form-control floating datetimepicker" type="text" value="<?php echo $doctor['fecnac'];?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus select-focus">
                                                
                                                <label for=""><?php echo $doctor['sexo'];?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Información de contacto</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Direccion</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control floating" value="<?php echo $doctor['direccion'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Departamento</label>
                                    <input type="text" name="departamento" id="departamento" class="form-control floating" value="<?php echo $doctor['departamento'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Provincia</label>
                                    <input type="text" name="provincia" id="provincia" class="form-control floating" value="<?php echo $doctor['provincia'];?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Distrito</label>
                                    <input type="text" name="distrito" id="distrito" class="form-control floating" value="<?php echo $doctor['distrito'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Profesion</label>
                                    <input type="text" class="form-control floating" value="<?php echo $doctor['profesion'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Telefono</label>
                                    <input type="text" class="form-control floating" value="<?php echo $doctor['telefono'];?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Numero de Colegiatura</label>
                                    <input type="text" name="numcolegiatura" id="numcolegiatura" class="form-control floating" value="<?php echo $doctor['numcolegiatura'];?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    
                                    <textarea class="form-control" name="biografica" id="biografica">
                                      <?php echo $doctor['biografica'];?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Education Informations</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Institution</label>
                                    <input type="text" class="form-control floating" value="Oxford University">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Subject</label>
                                    <input type="text" class="form-control floating" value="Computer Science">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Starting Date</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="01/06/2002">
									</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Complete Date</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="31/05/2006">
									</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Degree</label>
                                    <input type="text" class="form-control floating" value="BE Computer Science">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Grade</label>
                                    <input type="text" class="form-control floating" value="Grade A">
                                </div>
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Institute</a>
                        </div>
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Experience Informations</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Company Name</label>
                                    <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Location</label>
                                    <input type="text" class="form-control floating" value="United States">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Job Position</label>
                                    <input type="text" class="form-control floating" value="Web Developer">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Period From</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
									</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Period To</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Experience</a>
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
include "footer.html";
}else{
    header("Location: ../index.html");
}
?>