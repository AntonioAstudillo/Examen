<?php
header('Content-type: application/json; charset=utf-8');

require_once 'auxiliares/Consultas.php';

$empresa = $_GET['empresa'];
$departamento = $_GET['departamento'];
$objeto = new Consultas();
$empleados = [];

$resultado = $objeto->buscarEmpleadoDept($empresa , $departamento);

if($resultado)
{
   while($empleado = $resultado->fetch_assoc())
   {
      $empleados[] = $empleado;
   }

   echo json_encode($empleados);

}else{
   echo 'FALSE';
}





?>
