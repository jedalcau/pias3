<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{

    include "header.php";  

    require "../model/consultas.model.php";


    $consultas = new Consultas();
    $listpacientes = $consultas->ListadoPacientes();
    $listconsultorio = $consultas->ListadoConsultorios();
    $listdoctor = $consultas->ListadoDoctores();

    @$idpaciente = $_GET['idpaciente'];

    $nombrepac = $consultas->NombrePaciente($idpaciente);
?>

<script type="text/javascript">
    function ventanaSecundaria()
    {
       window.open("search-paciente.php","Ventana1","width=920,height=600,scrollbars=NO");
       return false;
    } 

</script>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="page-title">NUEVA CITA</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" action="../controller/citas.controller.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Codigo Cita ID (Referencial)</label>
										<input class="form-control" type="text" readonly="" value="APT-000">
									</div>
                                </div>
                                
                                <div class="col-md-6">
									<div class="form-group">
										<label>Buscar paciente</label> <br>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Buscar paciente
                                        </button>
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DNI Paciente</label>
                                        <input type="hidden" name="txtidpaciente" id="txtidpaciente" value="<?php echo @$idpaciente;?>">
                                        <input type="text" name="txtdni" id="txtdni" class="form-control" value="<?php echo @$nombrepac['dni'];?>"  readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nombre del paciente</label>
                                        <input type="text" name="txtpaciente" id="txtpaciente" class="form-control" value="<?php echo @$nombrepac['paciente'];?>" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Consultorio</label>
                                        <select class="select"name="txtidconsultorio" id="txtidconsultorio" required>
                                            <option>Seleccione</option>
                                            <?php
                                                while($filac = $listconsultorio->fetch_array(MYSQLI_ASSOC)){
                                            ?>
                                            <option value="<?php echo $filac['idconsultorio'];?>"><?php echo $filac['consultorio'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select"name="txtiddoctor" id="txtiddoctor" required>
											<option>Seleccione</option>
											<?php
                                                while($filad = $listdoctor->fetch_array(MYSQLI_ASSOC)){
                                            ?>
                                            <option value="<?php echo $filad['iddoc'];?>"><?php echo $filad['doc'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="txtfecha" id="txtfecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="txthora" id="txthora" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email del Paciente</label>
                                        <input class="form-control" type="email" name="txtemail" value="<?php echo @$nombrepac['email'];?>" id="txtemail">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono del Paciente</label>
                                        <input class="form-control" type="text" name="txttelefono" id="txttelefono" value="<?php echo @$nombrepac['telefono'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <textarea cols="30" rows="4" class="form-control" name="txtmensaje" id="txtmensaje"></textarea>
                            </div>
                            
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit">Crear Cita</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    </div>

    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          ...
        </div>
      </div>
    </div>

    <!-- Small modal -->
    

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" class="form-row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Apellido o nombre</label>
                                <input type="text" name="txtapellido" id="txtapellido" class="form-control floating">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Num de DNI</label>
                                    <input type="text" name="txtdni2" id="txtdni2" class="form-control floating">
                                </div>
                        </div>
                                
                        <div class="col-sm-2 col-md-2">
                            <div class="form-group form-focus">
                                <button type="button" id="btnbuscar2" class="btn btn-success">Buscar</button>
                            </div>
                        </div>
            </form>
            <hr>

                     
                    <div id="resultado"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $("#btnbuscar2").click(function (){
            
            var apellido = $("#txtapellido").val();
            var dni      = $("#txtdni2").val();
            
            $.ajax({
                type:"post",
                url: "../controller/search.controller.php",
                data:{"apellido":apellido,"dni":dni},
                success: function(res){
                   
                    $("#resultado").html(res);
                },
                error: function(err){
                    $("#resultado").html(err + "Ningun resultado");
                }
                
            });
        });
    });

    function Llenar(idpaci)
    {
        
        var idpac = document.getElementById("txtidpaciente");
        
        idpac.value = idpaci;
        var jsVar1 = idpaci;
        
        location.href ="add-appointment.php?idpaciente=" + jsVar1;
        
        $("#cerrar").click();
    }
</script>

<?php 
include "footer.html"; 
}else{
    header("Location: ../index.html");
}
?>

