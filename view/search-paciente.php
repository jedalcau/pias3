<?php 
session_start();
if(isset($_SESSION['iddoctor']))
{
	include "header_popup.php"; 
    require "../model/consultas.model.php";

	$apellido = trim($_REQUEST['txtapellido']);
	$dni      = trim($_REQUEST['txtdni']);

    
?>

	<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Buscar Paciente para Citas</h4>
                        <?php
                        echo $apellido;
                        echo $dnisearch;
                        ?>
                    </div>            
                </div>
                
                <div class="row">
                	<form action="" class="form-row">
                		<div class="col-sm-6 col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Apellido o nombre</label>
                                <input type="text" name="txtapellido" class="form-control floating">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Num de DNI</label>
                                    <input type="text" name="txtdni" class="form-control floating">
                                </div>
                        </div>
                                
                        <div class="col-sm-2 col-md-2">
                         	<div class="form-group form-focus">
                               	<button type="submit" class="btn btn-success">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Fecha nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Distrito</th>
										<th class="text-right">Accion</th>
									</tr>
								</thead>

								<tbody>
                                    <?php
                                    $i=1;
                                    if(!empty($apellido) && empty($dnisearch))
                                    {
                                        $consulta = new Consultas();
                                        $data = $consulta->searchApellido($apellido);
                                        while($fila = $data->fetch_array(MYSQLI_ASSOC))
                                        {
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $i; $fila['idpac'];?></td>
                                        <td><?php echo $fila['dni'];?></td>
                                        <td><?php echo $fila['nombre'];?></td>
                                        <td><?php echo $fila['fecnac'];?></td>
                                        <td><?php echo $fila['sexo'];?></td>
                                        <td><?php echo $fila['distrito'];?></td>
                                        <td>
                                            <a class="btn btn-primary" onclick="enviar(<?php echo $fila['idpac'];?>,'<?php echo $fila['dni'];?>','<?php echo $fila['nombre'];?>')" > enviar</a>
                                        
                                        </td>
                                    </tr>

                                    <?php
                                        $i++;
                                        }
                                    }

                                    if(!empty($dnisearch) && empty($apellido))
                                    {
                                        $consulta = new Consultas();
                                        $data = $consulta->searchDni($dni);
                                        while($fila = $data->fetch_array(MYSQLI_ASSOC))
                                        {
                                   ?>
                                    <tr>
                                        <td><?php echo $i; $fila['idpac'];?></td>
                                        <td><?php echo $fila['dni'];?></td>
                                        <td><?php echo $fila['nombre'];?></td>
                                        <td><?php echo $fila['fecnac'];?></td>
                                        <td><?php echo $fila['sexo'];?></td>
                                        <td><?php echo $fila['distrito'];?></td>
                                        <td>
                                            <a class="btn btn-primary" onclick="enviar(<?php echo $fila['idpac'];?>,'<?php echo $fila['dni'];?>','<?php echo $fila['nombre'];?>')">Enviar</a>
                                        </td>
                                    </tr>

                                    <?php
                                        $i++;
                                        }
                                    }
                                    ?>
									
								</tbody>
							</table>
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

<script type="text/javascript">
    
 function enviar(paciente, dni, nombre){
        alert("aqui");
        document.formulario.idpac.value=paciente;
        document.formulario.dni.value=dni;
        document.formulario.nombre.value=nombre;
        document.formulario.submit();
        //window.close();
    }
    
</script>

<form action="add-appointment.php" method="post" name="formulario">
    <input type="hidden" name="idpac" value="">
    <input type="hidden" name="dni" value="">
    <input type="hidden" name="nombre" value="">
</form>