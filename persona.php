<?php
//Definición de una clase que se carga por autoload (ejemplo c829.php) 

Class Persona {
	public $identificador;
	public $nombre;
	function __construct($id, $name){
		$this->identificador = $id;
		$this->nombre = $name;	
	}
    function listar(){
		print "Id. ". $this->identificador . " Nombre: " . $this->nombre . "<BR>";	
	}
}	
?>