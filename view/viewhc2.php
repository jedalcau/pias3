<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{

include "header.php";
require "../model/consultas.model.php";

$idhc = $_REQUEST['idhc'];

$consulta = new Consultas();
$hc = $consulta->HistoriaClinica($idhc);


?>

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-3">
                        <h2 class="page-title">Historia Clinica - <span class="alert alert-primary">Vista de historia guardada con anterioridad</span></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-3">
                        
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre del Paciente</label>
                                        <input type="hidden" name="txtidpaciente" value="<?php echo $hc['idpaciente'];?>">
                                        <input class="form-control" type="text" name="txtpaciente" id="txtpaciente" value="<?php echo $hc['nombre'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Num. Historia Clinica</label>
                                        <input class="form-control" type="text" name="txtdni" id="txtdni" value="<?php echo $hc['numhistclinica'];?>" value="<?php echo $hc['numhistclinica'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultorio</label>
                                        <input type="text" class="form-control" name="txtconsultorio" id="txtconsultorio" value="<?php 
                                        $consultorio = $consulta->NombreConsultorio($hc['idconsultorio']);
                                        echo $consultorio['consultorio'];
                                        ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control" name="txtfecha" id="txtfecha" value="<?php echo $hc['fecconsulta'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="txthora" name="txthora"value="<?php echo $hc['horaconsulta'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Edad</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="txtedad" id="txtedad"  value="<?php echo $hc['edad'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Motivo de la consulta</label>
                                        <input class="form-control" name="txtmotivo" id="txtmotivo" rows="8"  value="<?php echo $hc['motivo'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Signos y Sintomas</label>
                                        <input class="form-control" name="txtsintomas" id="txtsintomas" rows="8"  value="<?php echo $hc['signos'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relato Cronologico</label>
                                        <input class="form-control" name="txtrelato" id="txtrelato" rows="8"  value="<?php echo $hc['relato'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Vacunas</label>
                                        <input type="text" class="form-control" name="txtvacunas" id="txtvacunas"  value="<?php echo $hc['vacunas'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>

                            <h3>Factores de Riesgo identificado</h3>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Apetito</label>
                                        <input type="text" class="form-control" name="txtapetito" id="txtapetito"  value="<?php echo $hc['apetito'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Sed</label>
                                        <input type="text" class="form-control" name="txtsed" id="txtsed" value="<?php echo $hc['sed'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sueño</label>
                                        <input type="text" class="form-control" name="txtsueno" id="txtsueno" value="<?php echo $hc['sueno'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Orina</label>
                                        <input type="text" class="form-control" name="txtorina" id="txtorina" value="<?php echo $hc['orina'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Deposiciones</label>
                                        <input type="text" class="form-control" name="txtdeposiciones" id="txtdeposiciones" value="<?php echo $hc['deposicion'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Fiebre en los ultimos 15 dias</label>
                                        <input type="text" class="form-control" name="txtfiebre" id="txtfiebre" value="<?php echo $hc['fiebre15'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Viajo en las ultimas 2 semanas</label>
                                        <input type="text" class="form-control" name="txtviaje" id="txtviaje" value="<?php echo $hc['viaje'];?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lugar </label>
                                        <input type="text" class="form-control" name="txtlugar" id="txtlugar" value="<?php echo $hc['lugar'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tos hace 15 dias</label>
                                        <input type="text" class="form-control" name="txttos" id="txttos" value="<?php echo $hc['tos15'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Secrecion o lesion en genitales</label>
                                        <input type="text" class="form-control" name="txtsecrecion" id="txtsecrecion" value="<?php echo $hc['secresion'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FUR</label>
                                        <input type="text" class="form-control" name="txtfur" id="txtfur" value="<?php echo $hc['fur'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Examen Físico</label>
                                        <input type="text" class="form-control" name="txtexamenfisico" id="txtexamenfisico" value="<?php echo $hc['examenfisico'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h3>Antecedentes de importancia</h3>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>T°</label>
                                        <input type="text" class="form-control" name="txttemperatura" id="txttemperatura"  value="<?php echo $hc['temp'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>P.A.</label>
                                        <input type="text" class="form-control" name="txtpresionarterial" id="txtpresionarterial" value="<?php echo $hc['pa'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>F.C.</label>
                                        <input type="text" class="form-control" name="txtfc" id="txtfc"  value="<?php echo $hc['fc'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>F.R.</label>
                                        <input type="text" class="form-control" name="txtfr" id="txtfr"  value="<?php echo $hc['fr'];?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Peso</label>
                                        <input type="text" class="form-control" name="txtpeso" id="txtpeso"  value="<?php echo $hc['peso'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Talla</label>
                                        <input type="text" class="form-control" name="txttalla" id="txttalla"  value="<?php echo $hc['talla'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>P. Abd.</label>
                                        <input type="text" class="form-control" name="txtpabdominal" id="txtpabdominal"  value="<?php echo $hc['pabd'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Saturacion</label>
                                        <input type="text" class="form-control" name="txtsaturacion" id="txtsaturacion"  value="<?php echo $hc['saturacion'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DIAGNOSTICO</label>
                                        <input type="text" class="form-control" name="txtdiagnostico" id="txtdiagnostico" value="<?php echo $hc['diagnostico'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo de Examen</label>
                                        <input type="text" class="form-control" name="txttipoexamen" id="txttipoexamen" value="<?php echo $hc['tipoexamen'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CIE X</label>
                                        <input type="text" class="form-control" name="txtciex" id="txtciex"  value="<?php echo $hc['ciex'];?>" readonly>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tratamiento</label>
                                        <input type="text" class="form-control" name="txttratamiento" id="txttratamiento"  value="<?php echo $hc['tratamiento'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Via</label>
                                        <input type="text" class="form-control" name="txtvia" id="txtvia"  value="<?php echo $hc['via'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Dosis</label>
                                        <input type="text" class="form-control" name="txtdosis" id="txtdosis" value="<?php echo $hc['dosis'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Frecuencia</label>
                                        <input type="text" class="form-control" name="txtfrecuencia" id="txtfrecuencia" value="<?php echo $hc['frecuencia'];?>" readonly>
                                    </div>
                                </div>
                                
                            </div>

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Medidas Higiénico - Dietéticas</label>
                                        <input class="form-control" name="txtmedidas1" id="txtmedidas1" rows="6" value="<?php echo $hc['medidashigienicas'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Examenes Auxiliares</label>
                                        <input class="form-control" name="txtexamauxiliares" id="txtexamauxiliares" rows="6" value="<?php echo $hc['examenesauxiliares'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Medidas preventivas</label>
                                        <input class="form-control" name="txtpreventivas" id="txtpreventivas" rows="6" value="<?php echo $hc['medidaspreventivas'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Proxima consulta</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtproximacita" id="txtproximacita"  value="<?php echo $hc['proximaconsulta'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <input type="text" class="form-control" name="txtobservacion" id="txtobservacion" value="<?php echo $hc['observaciones'];?>" readonly>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <div>
                                            <input type="text" class="form-control" name="txtdoctor" id="txtdoctor"  value="<?php echo $hc['medico'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="m-t-20 text-center">
                                <a href="hc1.php" class="btn btn-info submit-btn">Cerrar y volver</a>
                                
                                <a href="report/hc.php?idhc=<?php echo $idhc;?>" class="btn btn-danger submit-btn" target="_blank">Imprimir Historia Clinica</a>

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