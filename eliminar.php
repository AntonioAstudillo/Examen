<?php
header('Content-type: application/json; charset=utf-8');

require_once 'auxiliares/Consultas.php';

$id = $_POST['id'];

$obj = new Consultas();

if($obj->eliminarEmpleado($id)){
   echo 'TRUE';
}else{
   echo 'FALSE';
}





?>
