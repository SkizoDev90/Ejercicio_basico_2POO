<?php
    require_once "fecha.php";
    $fecha=$_GET["fecha"];
    $resultado=new Fecha($fecha);
    $mensage=$resultado->mostrar();
    echo $mensage;
?>