<?php
print "<B><U>M�todo __toString() (ejemplo c830.php)</U></B><BR><BR>";
Class Persona {
	public $identificador;
	public $nombre;
	function __construct($id, $name){
		$this->identificador = $id;
		$this->nombre = $name;	
	}
 	function __toString(){
		// aqu� se puede devolver lo que se quiera
		print "OOOOO";
		return "HOLA";
	}
}
$obj = new Persona(1222,"Jos� P�rez");
$str = (string)$obj;
print $str;
 
?>