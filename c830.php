<?php
print "<B><U>Método __toString() (ejemplo c830.php)</U></B><BR><BR>";
Class Persona {
	public $identificador;
	public $nombre;
	function __construct($id, $name){
		$this->identificador = $id;
		$this->nombre = $name;	
	}
 	function __toString(){
		// aquí se puede devolver lo que se quiera
		print "OOOOO";
		return "HOLA";
	}
}
$obj = new Persona(1222,"José Pérez");
$str = (string)$obj;
print $str;
 
?>