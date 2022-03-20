<?php
session_start();
echo $_SESSION['administrator'];
if(isset($_SESSION['administrator']))
{
	include "header.php";
	require "../model/consultas.model.php";
	$consulta = new Consultas();
	$numdoctor = $consulta->ContarDoctores();
	$numpacientes = $consulta->ContarPacientes();

	$pacientes = $consulta->Pacientes5();
	$citas = $consulta->Citas5();
?>
<div class="page-wrapper">
	<div class="content">
		
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo $numdoctor['total'];?></h3>
						<span class="widget-title1">Pers. de Salud <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
					<div class="dash-widget-info text-right">
						<h3><?php echo $numpacientes['total'];?></h3>
						<span class="widget-title2">Pacientes <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3>-</h3>
						<span class="widget-title3">Atendidos <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3>-</h3>
						<span class="widget-title4">Pendientes <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="chart-title">
							<h4>Total pacientes</h4>
							<span class="float-right"> </span>
						</div>
						<canvas id="linegraph"></canvas>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="chart-title">
							<h4>Nuevos pacientes</h4>
							
						</div>
						<div>
							<?php $i=1; while($fila=$pacientes->fetch_array(MYSQLI_ASSOC)){	?>
							<table class="">
								<tr>
									<td width="30"><?php echo $i;?></td>
									<td width="350"><?php echo $fila['paciente'];?></td>
									<td><?php echo $fila['sexo'];?></td>
								</tr>
							</table>
							
							<?php $i++;}?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 col-lg-8 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title d-inline-block">Proximas citas</h4> <a href="appointments.php" class="btn btn-primary float-right">Ver todos</a>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="d-none">
									<tr>
										<th>Nombre paciente</th>
										<th>Personal de Salud</th>
										<th>Triaje</th>
										<th class="text-right">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									while($row = $citas->fetch_array(MYSQLI_ASSOC)){
									
									?>
									<tr>
										<td style="min-width: 200px;">
											<a class="avatar" href="profile.html">B</a>
											<h2><a href="profile.html"><?php echo $row['pac'];?> <span> <?php echo $row['telefono'];?></span></a></h2>
										</td>
										<td>
											<h5 class="time-title p-0"><?php echo $row['consul'];?></h5>
											<p>Dr.<?php echo $row['doc'];?></p>
										</td>
										<td>
											<h5 class="time-title p-0">Hora</h5>
											<p><?php echo $row['hora'];?></p>
										</td>
										<td>
											<h5 class="time-title p-0">Fecha</h5>
											<p><?php echo $row['fecha'];?></p>
										</td>
										<td class="text-right">
											<a href="appointments.html" class="btn btn-outline-primary take-btn">Aceptar</a>
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
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