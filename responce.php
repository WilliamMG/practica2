<?php
require "persona.php";

//if(isset($_POST['txtnombre'])){
	$nombre = $_POST['txtNombre'];
	$apellido = $_POST['txtApellido'];
	$descripcion = $_POST['txtDescripcion'];

	$persona = new Persona();

	$persona->setNombre($nombre);
	$persona->setApellido($apellido);
	$persona->setDescripcion($descripcion);

	$persona->create();
//}
?>