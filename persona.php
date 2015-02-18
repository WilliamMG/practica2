<?php
//query para insertar producto
//INSERT INTO producto VALUES (NULL, '1', 'jabon', 'avon', '10', '', '22/01/2015', 'ac')
require "./datasource.php";
class Persona{
	private $nombre;																				
	private $apellido;
	private $descripcion;

	//GETERS Y SETERS
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	//CONSTRUCTOR
	public function __construct()
	{
	}

	//CRUD - CREAR, UPDATE, DELETE, SHOW
	public function create(){
		$res = "la consulta no se ejecuto verifique los datos o consulta con el administrador";
		$db = new MySQL();
		$consulta = $db->consulta("INSERT INTO persona VALUES ('".$this->nombre."', '".$this->apellido."', '".$this->descripcion."')");
		if ($consulta){
			$res = "! el registro se creo exitosamente !";
		}
		return $res;
	}
	public function update($id){
		$res = "la consulta no se ejecuto verifique los datos o consulta con el administrador";
		$db = new MySQL();
		$consulta = $db->consulta("UPDATE persona SET nombre='".$this->nombre."', apellido='".$this->apellido."', descripcion='".$this->descripcion."' where nombre='".$id."' ");
		if ($consulta){
			$res = "! el registro actualizo exitosamente !";
		}
		return $res;
	}
	public function delete($id){
		$res = "la consulta no se ejecuto verifique los datos o consulta con el administrador";
		$db = new MySQL();
		$consulta = $db->consulta(" DELETE FROM persona WHERE nombre=".$id." ");
		if ($consulta){
			$res = "! el registro se elimino exitosamente !";
		}
		return $res;
	}
	public function show(){ 
		$db = new MySQL();
		$consulta = $db->consulta("SELECT nombre as 'Nombre', apellido as 'Apellido', descripcion as 'Descripcion' from persona;");
		$arreglo = array();
		if($db->num_rows($consulta)>0){
			while($resultados= mysql_fetch_object($consulta)){
				$arreglo[]= array('nombre'=> $resultados->Nombre,
		                   'apellido'=> $resultados->Apellido,
		                   'descripcion' => $resultados->Descripcion
               	);
			}

		}
		return $arreglo;
	}
	/*
	public function showHTML(){ 
		$db = new MySQL();
		$consulta = $db->consulta("SELECT * FROM producto where estado ='ac'");
		$html = "";
		if($db->num_rows($consulta)>0){
			while($resultados=$db->fetch_array($consulta)){
				$html = $html."<div class='row'>"."<div class='col-md-1'>".$resultados[0]."</div>"."<div class='col-md-2'>".$resultados[1]."</div>"."<div class='col-md-3'>".$resultados[2]."</div>"."<div class='col-md-4'>".$resultados[3]."</div>"."<div class='col-md-5'>".$resultados[4]."</div>"."<div class='col-md-6'>".$resultados[5]."</div>"."</div>".".\n";
			}
		}
		return($html);
	}
	*/
}
?>