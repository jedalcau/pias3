<?php 
session_start();
if(isset($_SESSION['administrator']))
{
include "header.php";
require "../model/consultas.model.php";

$idpaciente = $_REQUEST['id'];
$nombres    = $_REQUEST['nombre'];
$dni        = $_REQUEST['dni'];
$idatencion = $_REQUEST['idatencion'];

$consulta = new Consultas();
$data = $consulta->ListadoConsultorios();

?>

<style type="text/css">
    .obli{
        color: red;
        font-size: 0.6em;
    }
</style>
    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-3">
                        <h2>Historia Clinica</h2>
                        <h4>Personal de Salud: <?php echo $_SESSION['nomdoctor'];?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-3">
                        
                        <form method="post" action="../controller/historiaclinica.controller.php">
                            <div class="row">
                                <div class="col-sm-4">



                                    <div class="form-group">
                                        <label>Nombre del Paciente</label>
                                        <input type="hidden" name="txtidpaciente" value="<?php echo $idpaciente;?>">
                                        <input type="hidden" name="idatencion" id="idatencion" value="<?php echo $idatencion;?>">

                                        <input class="form-control" type="text" name="txtpaciente" id="txtpaciente" value="<?php echo $nombres;?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>DNI Paciente</label>
                                        <input class="form-control" type="text" name="txtdni" id="txtdni" value="<?php echo $dni;?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultorio <span class="obli">Obligatorio</span></label>
                                        <select name="cboconsultorio" id="cboconsultorio" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            while($fila = $data->fetch_array(MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?php echo $fila['idconsultorio']; ?>"><?php echo $fila['consultorio']; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha <span class="obli">Obligatorio</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecha" id="txtfecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hora <span class="obli">Obligatorio</span></label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="txthora" id="txthora" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Edad <span class="obli">Obligatorio</span></label>
                                        <div class="">
                                            <input type="text" class="form-control" name="txtedad" id="txtedad" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Motivo de la consulta</label>
                                        <textarea class="form-control" name="txtmotivo" id="txtmotivo" rows="8"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Signos y Sintomas</label>
                                        <textarea class="form-control" name="txtsintomas" id="txtsintomas" rows="8"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relato Cronologico</label>
                                        <textarea class="form-control" name="txtrelato" id="txtrelato" rows="8"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Vacunas</label>
                                        <input type="text" class="form-control" name="txtvacunas" id="txtvacunas">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h3>Factores de Riesgo identificado</h3>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Apetito</label>
                                        <input type="text" class="form-control" name="txtapetito" id="txtapetito">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Sed</label>
                                        <input type="text" class="form-control" name="txtsed" id="txtsed">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sueño</label>
                                        <input type="text" class="form-control" name="txtsueno" id="txtsueno">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Orina</label>
                                        <input type="text" class="form-control" name="txtorina" id="txtorina">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Deposiciones</label>
                                        <input type="text" class="form-control" name="txtdeposiciones" id="txtdeposiciones">
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Fiebre en los ultimos 15 dias</label>
                                        <select name="cbofiebre" id="cbofiebre" class="form-control">
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Viajo en las ultimas 2 semanas</label>
                                        <select name="cboviajo" id="cboviajo" class="form-control">
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lugar </label>
                                        <input type="text" class="form-control" name="txtlugar" id="txtlugar">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tos hace 15 dias</label>
                                        <select name="cbotos" id="cbotos" class="form-control">
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Secrecion o lesion en genitales</label>
                                        <select name="cbosecrecion" id="cbosecrecion" class="form-control">
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FUR</label>
                                        <input type="text" class="form-control" name="txtfur" id="txtfur">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Examen Físico</label>
                                        <input type="text" class="form-control" name="txtexamenfisico" id="txtexamenfisico">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h3>Antecedentes de importancia</h3>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>T° <span class="obli">Obligatorio</span></label>
                                        <input type="text" class="form-control" name="txttemperatura" id="txttemperatura" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>P.A. <span class="obli">Obligatorio</span></label>
                                        <input type="text" class="form-control" name="txtpresionarterial" id="txtpresionarterial" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>F.C.</label>
                                        <input type="text" class="form-control" name="txtfc" id="txtfc">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>F.R.</label>
                                        <input type="text" class="form-control" name="txtfr" id="txtfr">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Peso </label>
                                        <input type="text" class="form-control" name="txtpeso" id="txtpeso">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Talla</label>
                                        <input type="text" class="form-control" name="txttalla" id="txttalla">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>P. Abd.</label>
                                        <input type="text" class="form-control" name="txtpabdominal" id="txtpabdominal">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Saturacion</label>
                                        <input type="text" class="form-control" name="txtsaturacion" id="txtsaturacion">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DIAGNOSTICO <span class="obli">Obligatorio</span></label>
                                        <textarea class="form-control" name="txtdiagnostico" id="txtdiagnostico" rows="4" required></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo de Examen</label>
                                        <select name="cbotipoexamen" id="cbotipoexamen" class="form-control">
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CIE X</label>
                                        <input type="text" class="form-control" name="txtciex" id="txtciex">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tratamiento <span class="obli">Obligatorio</span></label>
                                        <textarea class="form-control" name="txttratamiento" id="txttratamiento" rows="4" required></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Via</label>
                                        <input type="text" class="form-control" name="txtvia" id="txtvia">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Dosis</label>
                                        <input type="text" class="form-control" name="txtdosis" id="txtdosis">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Frecuencia</label>
                                        <input type="text" class="form-control" name="txtfrecuencia" id="txtfrecuencia">
                                    </div>
                                </div>
                                
                            </div>

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Medidas Higiénico - Dietéticas</label>
                                        <textarea class="form-control" name="txtmedidas1" id="txtmedidas1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Examenes Auxiliares</label>
                                        <textarea class="form-control" name="txtexamauxiliares" id="txtexamauxiliares" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Medidas preventivas</label>
                                        <textarea class="form-control" name="txtpreventivas" id="txtpreventivas" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Proxima consulta <span class="obli">Obligatorio</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtproximacita" id="txtproximacita" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <input type="text" class="form-control" name="txtobservacion" id="txtobservacion">
                                        
                                    </div>
                                </div>
                                
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="button" data-toggle="modal" data-target="#delete_doctor">Guardar</button>

                            </div>

                            <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                                            <h3>¿Esta seguro de guardar?. Una vez guardado, no es posible modificar la información.</h3>
                                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
                                                <button type="submit" class="btn btn-danger">Si</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
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