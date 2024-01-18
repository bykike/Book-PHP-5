<?php
print "<B><U>Acceso a la clase base desde la clase derivada  (ejemplo c803.php)</U></B><BR><BR>";

// Clase
class MiClase {
	public $saludo;
	function __construct(){
		print "Se está ejecutando el constructor en la clase MiClase<BR>";
	} 
	function __destruct(){
		print "Se está destruyendo un objeto de la clase MiClase<BR>";
	} 
	function Saludar() {
		print $this->saludo;
	}
}	
// Subclase o clase derivada
class MiSubClase extends MiClase {
	public $despedida;
	function __construct(){
		print "Se está ejecutando el constructor de un objeto de la subclase MiSubClase<BR>";
		parent::__construct();
	} 
	function __destruct(){
		print "Se está destruyendo un objeto de la clase MiSubClase<BR>";
	} 
	function Despedirse() {
		print $this->despedida;
	}
}

// se crea un objeto de clase MiSubClase
// al ser una clase derivada de MiClase, MiSubClase
// posee los métodos y las propiedades de MiClase y
// además los métodos y propiedades propios
$obj = new MiSubClase();

// El objeto $obj es de clase MiSubClase pero igualmente
// puedo utilizarlo para hacer referencia a la propiedad
// saludo y al método saludar que son de su clase base
$obj->saludo = "Hola, ¿cómo estamos?<BR>";
$obj->Saludar();

// El objeto $obj es de clase MiSubClase por lo que
// puedo utilizar sus propiedades y métodos (despedida y despedir)
$obj->despedida = "Adiós<BR>";
$obj->Despedirse(); 


?>