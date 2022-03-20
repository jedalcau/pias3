<?php 
session_start();
if(isset($_SESSION['administrator']))
{
include "header.php";
require "../model/consultas.model.php";

@$dni      = $_REQUEST['txtdni'];
@$apellido = $_REQUEST['txtapellido'];

$consulta = new Consultas();
$data = $consulta->ListadoPacientes1($dni,$apellido);

?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-3">
                        <h4 class="page-title">Historia Clinica</h4>
                    </div>
                </div>
                <div class="row">
            
                    <form class="form-inline">
                        <div class="form-group mb-4">
                            <div class="form-group">
                                <label>Buscar por DNI: </label>
                                <input class="form-control" type="text" name="txtdni" id="txtdni">
                            </div>
                            <div class="form-group">
                                <label>Buscar por Apellido: </label>
                                <input class="form-control" type="text" name="txtapellido" id="txtapellido">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Num</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $i=1;
                                    while($fila = $data->fetch_array(MYSQLI_ASSOC)){
                                
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $fila['nombres'];?></td>
                                    <td><?php echo $fila['dni'];?></td>
                                    <td>
                                        <a href="listahc.php?id=<?php echo $fila['idpac'];?>">Ver Detalles</a>
                                    </td>
                                </tr>
                                <?php $i++; }?>
                            </tbody>
                        </table>
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