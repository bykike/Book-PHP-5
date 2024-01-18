<?php
print "<B><U>Clonación de objetos (ejemplo c820.php)</U></B><BR><BR>";

// Definición de la clase Factura
class Prueba {
 	static $contador = 0;
	public $cliente;
	public $dirección;
	//  
	function __construct() {
	    print "entra a construct<BR>";
		$this->contador = self::$contador++;
	}
	function __clone() {
		print "entra a clone<BR>";
		$this->cliente = "XX";
	}
	  
}	

 
$objPrueba = new Prueba;

$objPrueba->cliente = "A";
$objPrueba->dirección = "dirección";
print $objPrueba->contador . "<BR>";
print $objPrueba->cliente . "<BR>"; 
print $objPrueba->dirección . "<BR>"; 
$cloPrueba = $objPrueba->__clone();
print $cloPrueba->contador . "<BR>";
print $cloPrueba->cliente . "<BR>"; 
print $cloPrueba->dirección . "<BR>"; 
?>