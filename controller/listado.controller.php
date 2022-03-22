<?php
require "../model/listado.model.php";

$fechainicio = $_GET['txtfecinicio'];
$fechafin    = $_GET['txtfecfinal'];

$listados = new Listados();

if(!empty($fechainicio) && !empty($fechafin))
{
    #echo "ambas fechas: ".$fechainicio." / ".$fechafin;
    $data = $listados->Atenciones2($fechainicio,$fechafin);
    $i = 1;
    $mitabla = "<div class='row'>
    <table class='table mb-0' id='tableID'>
        <thead>
            <tr>
                <th>Num</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Localidad</th>
                <th>Fecha Nacimiento</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Diagnostico</th>
                <th>Fecha Consulta</th>
                <th>Hora Consulta</th>
            </tr>
        </thead>
        <tbody>";
    
    while($fila = $data->fetch_array(MYSQLI_ASSOC))
    {//p.apellidos,p.nombre,p.dni,p.ciudad,p.fecnac,h.edad,p.sexo,h.diagnostico
        $mitabla.="<tr>
                                <td>".$i."</td>
                                <td>".$fila['apellidos']."</td>
                                <td>".$fila['nombre']."</td>
                                <td>".$fila['dni']."</td>
                                <td>".$fila['ciudad']."</td>
                                <td>".$fila['fecnac']."</td>
                                <td>".$fila['edad']."</td>
                                <td>".$fila['sexo']."</td>
                                <td>".$fila['diagnostico']."</td>
                                <td>".$fila['fecconsulta']."</td>
                                <td>".$fila['horaconsulta']."</td>
                            </tr>
        ";

        $i++;
    }
    $mitabla.="</tbody>
        </table>
    </div>";
    
    echo $mitabla;
                        
}else{

    if(!empty($fechainicio))
    {
        #echo "Solo fecha inicial";
        $data = $listados->Atenciones1($fechainicio);
        $i = 1;
        $mitabla = "<div class='row'>
        <table class='table mb-0' id='tableID'>
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>DNI</th>
                    <th>Localidad</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Diagnostico</th>
                    <th>Fecha Consulta</th>
                    <th>Hora Consulta</th>
                </tr>
            </thead>
            <tbody>";
        
        while($fila = $data->fetch_array(MYSQLI_ASSOC))
        {//p.apellidos,p.nombre,p.dni,p.ciudad,p.fecnac,h.edad,p.sexo,h.diagnostico
            $mitabla.="<tr>
                                    <td>".$i."</td>
                                    <td>".$fila['apellidos']."</td>
                                    <td>".$fila['nombre']."</td>
                                    <td>".$fila['dni']."</td>
                                    <td>".$fila['ciudad']."</td>
                                    <td>".$fila['fecnac']."</td>
                                    <td>".$fila['edad']."</td>
                                    <td>".$fila['sexo']."</td>
                                    <td>".$fila['diagnostico']."</td>
                                    <td>".$fila['fecconsulta']."</td>
                                    <td>".$fila['horaconsulta']."</td>
                                </tr>
            ";

            $i++;
        }
        $mitabla.="</tbody>
            </table>
        </div>";
        
        echo $mitabla;
        
    }else{
        
        if(!empty($fechafin))
        {
            #echo "Solo inicio";
            $data = $listados->Atenciones1($fechainicio);
            $i = 1;
            $mitabla = "<div class='row'>
            <table class='table mb-0' id='tableID'>
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Localidad</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Diagnostico</th>
                        <th>Fecha Consulta</th>
                        <th>Hora Consulta</th>
                    </tr>
                </thead>
                <tbody>";
            
            while($fila = $data->fetch_array(MYSQLI_ASSOC))
            {//p.apellidos,p.nombre,p.dni,p.ciudad,p.fecnac,h.edad,p.sexo,h.diagnostico
                $mitabla.="<tr>
                                        <td>".$i."</td>
                                        <td>".$fila['apellidos']."</td>
                                        <td>".$fila['nombre']."</td>
                                        <td>".$fila['dni']."</td>
                                        <td>".$fila['ciudad']."</td>
                                        <td>".$fila['fecnac']."</td>
                                        <td>".$fila['edad']."</td>
                                        <td>".$fila['sexo']."</td>
                                        <td>".$fila['diagnostico']."</td>
                                        <td>".$fila['fecconsulta']."</td>
                                        <td>".$fila['horaconsulta']."</td>
                                    </tr>
                ";

                $i++;
            }
            $mitabla.="</tbody>
                </table>
            </div>";
            
            echo $mitabla;
            
        }else{
            echo "Ninguno";
        }
    }

    
}
