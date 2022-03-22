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
            <div class="col-sm-7 col-6">
                <h4 class="page-title">Mi Perfil profesional</h4>
            </div>
            <div class="col-sm-5 col-6 text-right m-b-30">
                Datos del personal de Salud
            </div>
        </div>
        
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <img class="avatar" src="<?php echo $doctor['avatar'];?>" alt="<?php echo $doctor['apellidos'];?>">
                                
                            </div>
                        </div>

                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0"><?php echo $doctor['nombre']." ".$doctor['apellidos'];?></h3>
                                        <small class="text-muted"><?php echo $doctor['profesion'];?></small>
                                        <div class="staff-id">Numero de Colegiatura: <?php echo $doctor['numcolegiatura'];?></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Telefono:</span>
                                            <span class="text"><a href="#"><?php echo $doctor['telefono'];?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#"><?php echo $doctor['email'];?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Fec. Nacimiento:</span>
                                            <span class="text"><?php echo $doctor['fecnac'];?></span>
                                        </li>
                                        <li>
                                            <span class="title">Direccion:</span>
                                            <span class="text"><?php echo $doctor['direccion'];?></span>
                                        </li>
                                        <li>
                                            <span class="title">Sexo:</span>
                                            <span class="text"><?php echo $doctor['sexo'];?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Sobre mi</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Perfil</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="about-cont">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEducacion" name="btnAgregar" id="btnAgregar">
                              Agregar Grados +
                            </button>
                            
                            <div class="card-box">
                                <h3 class="card-title">Educacion Grados</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            
                                            <?php
                                                while($fila = $grados->fetch_array(MYSQLI_ASSOC)):
                                                    #echo $fila['ideducacion'];
                                                
                                            ?>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#" class="name"><?php echo $fila['trabajo'];?></a>
                                                    <div><?php echo $fila['cargo'];?></div>
                                                    <span class="time"><?php echo $fila['tiempo'];?></span>
                                                </div>
                                            </div>
                                            <?php
                                                endwhile;
                                            ?>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>

                            
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddExperiencia" name="btnAgregarExp" id="btnAgregarExp">
                              Agregar Experiencia +
                            </button>
                            <div class="card-box mb-0">
                                <h3 class="card-title">Experiencia</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                
                                                <?php
                                                while ($fila2 = $experiencia->fetch_array(MYSQLI_ASSOC)):
                                                    //echo $fila2['idexperiencia'];
                                                    //echo $fila2['iddoc'];
                                                
                                                ?>
                                                <div class="timeline-content">
                                                    <a href="#/" class="name"><?php echo $fila2['centrabajo'];?></a>
                                                    <span class="time"><?php echo $fila2['fechainicio']. " a ". $fila2['fechafin']; ?> (<?php echo $fila2['totalanios'] ."años ". $fila2['totalmeses'] . " Meses"; ?>)</span>
                                                </div>
                                                <?php
                                                endwhile;
                                                ?>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab2">
                    Datos de mi perfil
                </div>
                
            </div>
        </div>
    </div>
    
</div>
</div>

<!-- Button trigger modal -->


<!-- Modal ADD EDUCACION GRADOS-->
<div class="modal fade" id="AddEducacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Grados Academicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="respuesta"></div>
        <form id="formularioGrados">
          <div class="form-group">
            <input type="hidden" name="iddoc" id="iddoc" value="<?php echo $_SESSION['iddoctor']; ?>">
            <label for="trabajo">Curso o especialización:</label>
            <input type="text" class="form-control" id="trabajo" name="trabajo" aria-describedby="trabajoHelp" placeholder="Curso o especialidad">
            <small id="trabajoHelp" class="form-text text-muted">Puede agregar la cantidad de Cursos obtenidos</small>
          </div>
          <div class="form-group">
            <label for="cargo">Cento de estudios</label>
            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Centro de estudios">
          </div>
          <div class="form-group">
            <label for="tiempo">Tiempo</label>
            <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="ejemplo: de Mayo 2005 a agosto 2005">
          </div>
          
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" name="btnGuardarGrados" id="btnGuardarGrados" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal ADD EXPERIENCIA -->
<div class="modal fade" id="AddExperiencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Experiencia Profesional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="respuesta1"></div>

        <form id="formularioExperiencia">
          <div class="form-group">
            <input type="hidden" name="iddoc1" id="iddoc1" value="<?php echo $_SESSION['iddoctor']; ?>">
            <label for="centrabajo">Centro de trabajo Anterior:</label>
            <input type="text" class="form-control" id="centrabajo" name="centrabajo"  placeholder="Donde he trabajado">
            
          </div>

          <div class="form-group">
            <label for="diainicio">Fecha de Inicio</label>

            <input type="text" class="" id="diainicio" name="diainicio" aria-describedby="diainicioHelp" size="3" placeholder="dia">

            <select name="cbomes" id="cbomes">
                <option value="" disabled selected>[Seleccionar]</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Setiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <input type="number" name="txtanio1" id="txtanio1" placeholder="Año">

            <small id="fechainicioHelp" class="form-text text-muted">Ejemplo: Setiembre 2021, 15/abril/2000 ó  2003</small>
          </div>
          <div class="form-group">
            <label for="diafin">Fecha de Finalización</label>
            <input type="text" class="" id="diafin" name="diafin" aria-describedby="fechainicioHelp" size="3" placeholder="dia">
            <select name="cbomesfin" id="cbomesfin">
                <option value="" disabled selected>[Seleccionar]</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Setiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <input type="number" name="txtanio2" id="txtanio2" placeholder="Año">
            <br>
            <input type="checkbox" name="presente" id="presente">
            <label for="presente">Sigo trabajando en este lugar</label>

            
          </div>
          
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" name="btnGuardarExperiencia" id="btnGuardarExperiencia" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


    $(document).ready(function(){
        $("#btnGuardarGrados").click(function(){
            //alert("grados");
            var iddoc   = document.getElementById("iddoc").value;
            var trabajo = document.getElementById("trabajo").value;
            var cargo   = document.getElementById("cargo").value;
            var tiempo  = document.getElementById("tiempo").value;
            

            $.ajax({
                url: '../controller/AddGradosAcademicos.controller.php',
                type: 'GET',
                data: {iddoc1: iddoc, trab: trabajo,carg: cargo, tiemp: tiempo},
            })
            .done(function(res) {
                console.log("success");
                $("#respuesta").html(res);
                $("#btnGuardarGrados").prop('disabled',true);
                location.reload();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            

        });

        $("#btnGuardarExperiencia").click(function(){
            
            var iddoc2     = document.getElementById("iddoc1").value;
            var centrabajo = document.getElementById("centrabajo").value;
            var diainicio  = document.getElementById("diainicio").value;
            var cbomes     = document.getElementById("cbomes").value;
            var txtanio1   = document.getElementById("txtanio1").value;
            var diafin     = document.getElementById("diafin").value;
            var cbomesfin  = document.getElementById("cbomesfin").value;
            var txtanio2   = document.getElementById("txtanio2").value;

            var fechainicio = diainicio + "-" + cbomes + "-" + txtanio1;
            var fechafin    = diafin + "-" + cbomesfin + "-" + txtanio2;
                        
            var mesinicio = 12 - cbomes;
            var mesfinal = 12 - cbomesfin;
            meses = mesinicio - mesfinal;
            
            //alert("Total meses: "+meses);

            var total = txtanio2 - txtanio1;
            //alert("Total de Años: "+total);
            

            $.ajax({
                url: '../controller/AddExperiencia.controller.php',
                type: 'GET',
                data: {iddoc1: iddoc2, centrabajo: centrabajo,fechainicio: fechainicio, fechafin: fechafin, totalanios:total, totalmeses:meses},
            })
            .done(function(res) {
                console.log("success");
                $("#respuesta1").html(res);
                $("#btnGuardarExperiencia").prop('disabled',true);
                location.reload();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            

        });
    });
</script>

<?php
include "footer.html";
}else{
header("Location: ../index.html");
}
?>