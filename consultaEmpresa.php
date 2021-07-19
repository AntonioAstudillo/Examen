<?php
//En este archivo voy a ejecutar una query donde traiga los departamentos de una cierta empresa
//Y de esa forma, poder generar el select dinamico. Este archivo será ejecutado por medio de AJAX
header('Content-type: application/json; charset=utf-8');

require_once 'auxiliares/Conexion.php';

$empresa = $_GET['empresa'];

//instanciamos objeto de la clase Conexion

$objeto = new Conexion();
$respuesta = []; //En este array, voy a guardar los datos de mi consulta

$objeto = $objeto->getConexion();

$consulta = "SELECT departamento.nombre FROM departamento INNER JOIN departamentoDetalle
ON departamentoDetalle.idDepartamento = departamento.idDepartamento
INNER JOIN empresa on empresa.idEmpresa = departamentoDetalle.idEmpresa
where empresa.nombre = '$empresa'; ";

$resultado = $objeto->query($consulta);

if($resultado){
   while($departamento = $resultado->fetch_assoc()){
      $respuesta[] = $departamento;
   }
}else{
   die();
}

echo json_encode($respuesta);



 ?>
