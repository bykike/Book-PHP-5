<?php
print "<B><U>Clonaci�n de objetos (ejemplo c820.php)</U></B><BR><BR>";

// Definici�n de la clase Factura
class Prueba {
 	static $contador = 0;
	public $cliente;
	public $direcci�n;
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
$objPrueba->direcci�n = "direcci�n";
print $objPrueba->contador . "<BR>";
print $objPrueba->cliente . "<BR>"; 
print $objPrueba->direcci�n . "<BR>"; 
$cloPrueba = $objPrueba->__clone();
print $cloPrueba->contador . "<BR>";
print $cloPrueba->cliente . "<BR>"; 
print $cloPrueba->direcci�n . "<BR>"; 
?>