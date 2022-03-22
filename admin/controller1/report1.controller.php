<?php

$fechainicio = $_GET['txtfecinicio'];
$fechafin    = $_GET['txtfecfinal'];

if(!empty($fechainicio) && !empty($fechafin))
{
    echo "ambas fechas: ".$fechainicio." / ".$fechafin;

    header("Location: ../report/report2.php?fechainicio=".$fechainicio."&fechafin=".$fechafin);
}else{

    if(!empty($fechainicio))
    {
        echo "Solo fecha inicial";
        header("Location: ../report/report1.php?fechainicio=".$fechainicio);
    }else{
        
        if(!empty($fechafin))
        {
            header("Location: ../report/report1.php?fechainicio=".$fechafin);
        }else{
            echo "Ninguno";
        }
    }

    
}