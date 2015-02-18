<?php
/*En un arreglo agregar todos los datos a 
transportar al formulario */
require "persona.php";
$persona = new Persona();

/*
$obj=array();
$obj['nombre']="juanito";
$obj['apellido']="Morales";
$obj['descripcion']="persona con uan descirpcion";
*/

//echo json_encode($obj);
echo json_encode($persona->show());