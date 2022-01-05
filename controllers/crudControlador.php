<?php 
    require_once '../Modelos/crudModelo.php';
    $objeto = new Crud();
    $records = $objeto->obtenerRegistros();
    #print_r($records);
    require_once '../Vistas/crudVista.php';
?>