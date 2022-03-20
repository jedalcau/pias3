<?php 
session_start();
if(isset($_SESSION['administrator']))
{
    include "header.php";
    include "../model/consultorio.model.php";

    $idconsultorio = $_REQUEST['idconsultorio'];

    $consultorio = new Consultorio();
    $data = $consultorio->MostrarConsultorio($idconsultorio);

?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Consultorios</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="controller1/consultorio.controller.php" method="post">
							<div class="form-group">
                                <input type="hidden" name="idconsultorio" id="idconsultorio" value="<?php echo $idconsultorio;?>">
								<label>Nombre del consultorio</label>
								<input class="form-control" type="text" name="txtconsultorio" id="txtconsultorio" value="<?php echo $data['consultorio'];?>">
							</div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea cols="30" rows="4" name="txtdescripcion" id="txtdescripcion" class="form-control"><?php echo $data['descripcion'];?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Guardar Cambios</button>
                            </div>
                        </form>
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