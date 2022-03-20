<?php 
include "header.php";
require "../model/consultas.model.php";

$idpaciente = $_REQUEST['id'];
$consulta = new Consultas();
$data = $consulta->ListaHistoriaClinica($idpaciente);
?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 offset-lg-2">
                        <h4 class="page-title">Listado Historia Clinica</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Num</th>
                                    <th>Nombre</th>
                                    <th>Num. Historia</th>
                                    <th>Fecha atencion</th>
                                    <th> atencion</th>
                                    <th>Consultorio</th>
                                    <th colspan="2">Opciones</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i=1;
                                    while($fila = $data->fetch_array(MYSQLI_ASSOC)) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo $i; $fila['idhc'];?></td>
                                    <td><?php 
                                        $datapaciente = $consulta->NombrePaciente($fila['idpaciente']);
                                        echo $datapaciente['paciente'];
                                        ?></td>
                                    <td><?php echo $fila['numhistclinica'];?></td>
                                    <td><?php echo $fila['fecconsulta'];?></td>
                                    <td><?php echo $fila['horaconsulta'];?></td>
                                    <td><?php 
                                        
                                        $dataconsultorio = $consulta->NombreConsultorio($fila['idconsultorio']);
                                        echo $dataconsultorio['consultorio'];
                                        ?>
                                    </td>
                                                                      
                                    <td><a href="viewhc2.php?idhc=<?php echo $fila['idhc'];?>">Ver Hist.Clinica</a></td>
                                    <td><a href="report/hc.php?idhc=<?php echo $fila['idhc'];?>" target="_blank">Impr. Hist.Clinica</a></td>
                                    <td><a href="report/receta.php?idhc=<?php echo $fila['idhc'];?>" target="_blank">Imprimir Receta</a></td>
                                </tr>
                                <?php $i++;}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			
        </div>
    </div>

<?php include "footer.html"; ?>