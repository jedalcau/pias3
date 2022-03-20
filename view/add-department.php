<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{
    include "header.php";
 ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Agregar Nuevo Consultorio</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="../controller/consultorio.controller.php" method="post">
							<div class="form-group">
								<label>Nombre del consultorio</label>
								<input class="form-control" type="text" name="txtconsultorio" id="txtconsultorio">
							</div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea cols="30" rows="4" class="form-control" name="txtdescripcion" id="txtdescripcion"></textarea>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit">Nuevo Consultorio</button>
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