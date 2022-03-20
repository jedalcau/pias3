<?php
require "../model/consultas.model.php";

$apellido  = trim($_REQUEST['apellido']);
$dnisearch = trim($_REQUEST['dni']);

$consulta = new Consultas();

$i=1;
if(!empty($apellido) || empty($dnisearch))
{
    $respuestaApellido ="
    <table class='table table-border table-striped'>
    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Fecha nacimiento</th>
                        <th>Sexo</th>
                        <th>Distrito</th>
                        <th class='text-right'>Accion</th>
                    </tr>
                </thead>
                <tbody>
                 ";
    $data = $consulta->searchApellido($apellido);
    while($fila = $data->fetch_array(MYSQLI_ASSOC))
    {

        $respuestaApellido .="

        <tr>
            <td>".$fila['idpac']."</td>
            <td>".$fila['dni']."</td>
            <td>".$fila['nombre']."</td>
            <td>".$fila['fecnac']."</td>
            <td>".$fila['sexo']."</td>
            <td>".$fila['distrito']."</td>
            <td>
                <a href='#' onclick='Llenar(".$fila['idpac'].")'>Seleccionar</a>
            </td>
        </tr>";
        $i++;
    }

    $respuestaApellido .="</tbody>
            </table>";
    echo $respuestaApellido;
}


if(!empty($dnisearch) && empty($apellido))
{
    $respuestaDni ="
    <table class='table table-border table-striped'>
    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Fecha nacimiento</th>
                        <th>Sexo</th>
                        <th>Distrito</th>
                        <th class='text-right'>Accion</th>
                    </tr>
                </thead>
                <tbody>
                 ";
    $data = $consulta->searchDni($dnisearch);
    while($fila = $data->fetch_array(MYSQLI_ASSOC))
    {
    $respuestaDni .= "

        <tr>
            <td>1</td>
            <td>".$fila['dni']."</td>
            <td>".$fila['nombre']."</td>
            <td>".$fila['fecnac']."</td>
            <td>".$fila['sexo']."</td>
            <td>".$fila['distrito']."</td>
            <td>
                <a href='#' onclick='Llenar(".$fila['idpac'].")'>Seleccionar</a>
            </td>
        </tr>";
        
    }

    $respuestaDni .="</tbody>
            </table>";

    echo $respuestaDni;
}
