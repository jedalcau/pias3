<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{
include "header.php";
require "../model/consultas.model.php";

$idpaciente = $_REQUEST['id'];
$nombres = $_REQUEST['nombre'];
$dni = $_REQUEST['dni'];
echo $fecnac = $_REQUEST['fecnac'];

function calculaedad($fechanacimiento){
    list($dia,$mes,$ano) = explode("/",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
      $ano_diferencia--;
    return $ano_diferencia;
  }

  $miedad = calculaedad ($fecnac);

$consulta = new Consultas();
$data = $consulta->ListadoConsultorios();

?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">RECETA UNICA ESTANDARIZADA</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            
                            <h4 class="card-title">DATOS DEL PACIENTE</h4>
                            <form action="../controller/atencion.controller.php" method="post">

                                <input type="hidden" name="idpaciente" id="idpaciente" value="<?php echo $idpaciente;?>">
                                <input type="hidden" name="iddoctor" id="iddoctor" value="<?php echo $_SESSION['iddoctor'];?>">

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Numero de Historia Clinica</label>
                                    <div class="col-md-2">
                                    <input type="text" class="form-control" value="<?php echo $dni;?>" disabled>
                                        <input type="hidden" class="form-control" name="historia" id="historia" value="<?php echo $dni;?>">
                                    </div>
                                    <label class="col-form-label col-md-2">Nombres y Apellidos</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $nombres;?>" disabled>
                                        <input type="hidden" class="form-control" name="nombres" id="nombres" value="<?php echo $nombres;?>">
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tipo de usuario:</label>
                                    <div class="col-md-10">
                                        <select name="tipousuario" id="tipousuario" class="form-control">
                                            
                                            <option value="Demanda" selected>Demanda</option>
                                            <option value="Seguro Integral de Salud">Seguro Integral de Salud - SIS</option>
                                            <option value="Intervención Sanitaria">Intervención Sanitaria</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tipo de Atención:</label>
                                    <div class="col-md-10">
                                        <select name="tipoatencion" id="tipoatencion" class="form-control">
                                            
                                            <option value="Consulta Ambulatoria" selected>Consulta Ambulatoria</option>
                                            <option value="Emergencia">Emergencia</option>
                                            <option value="Hospitalización">Hospitalización</option>
                                            <option value="Odontologia">Odontologia</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="especialidad" id="especialidad" value="">
                                <input type="hidden" name="otro" id="otro" form="form-control" style="display:none">
                                
                                
                                <div class="form-group row">
                                <label class="col-form-label col-md-2">Edad</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="number" name="edad" id="edad" value="<?php echo $miedad;?>" min="0" max="200" required>
                                    </div>    
                                    <label class="col-form-label col-md-2">Código SIS</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="codigosis" id="codigosis" placeholder="Codigo SIS">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-primary">Siguente >></button>
                                    </div>
                                </div>
                                
                            </form>
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