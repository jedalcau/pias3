<?php
session_start();
if(isset($_SESSION['iddoctor']))
{
	include "header.php";
	require "../model/paciente.model.php";

	@$dni      = $_REQUEST['txtdni'];
	@$apellido = $_REQUEST['txtapellido'];

	$pacientes = new Pacientes();
	$res = $pacientes->Buscartodos($dni, $apellido);

	$total_paci = $pacientes->CantidadPacientes();
	
	@$mensaje = $_REQUEST['msg'];

?>

<div class="page-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Pacientes </h4>
			</div>
			<div class="col-sm-8 col-9 text-right m-b-20">
				<a href="add-patient.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Nuevo Paciente</a>
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
			<div class="col-sm-4 col-3">
				
				<?php
				if($mensaje == ""){
					$mensaje="";
				}
				if($mensaje == 1){
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
														<strong>Registro Exitoso!</strong>
														<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
														<span aria-hidden='true'>&times;</span>
														</button>
												</div>";
				}
				if($mensaje == 2){
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
													<strong>Error!</strong> Datos DUPLICADOS!.
													<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
													</button>
											</div>";
				}
				?>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-border table-striped custom-table datatable mb-0">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Distrito</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Email</th>
								<th class="text-right">Accion</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							while ($fila = $res->fetch_array(MYSQLI_ASSOC)):
							?>
							<tr>
								<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php $fila['idpac']; echo $fila['nombre'];?></td>
								<td><?php echo $fila['apellidos']; ?></td>
								<td><?php echo $fila['distrito']; ?></td>
								<td><?php echo $fila['direccion']; ?></td>
								<td><?php echo $fila['telefono']; ?></td>
								<td><?php echo $fila['email']; ?></td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="edit-patient.php?idpac=<?php echo $fila['idpac'];?>"><i class="fa fa-pencil m-r-5"></i> Editar</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Borrar</a>
										</div>
									</div>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	
</div>
<div id="delete_patient" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<img src="assets/img/sent.png" alt="" width="50" height="46">
				<h3>¿Esta seguro de eliminar al paciente?</h3>
				<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
				<button type="submit" class="btn btn-danger">Borrar</button>
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

