<?php
print "<B><U>Clonación de objetos (ejemplo c820.php)</U></B><BR><BR>";

// Definición de la clase Prueba
class Prueba {
 	static $contador = 0;
	

	function __construct() {
	    print "entra a construct<BR>";
		$this->contador = self::$contador++;
	}

	function __clone() {
		print "<BR>entra a clone<BR>";
                $this->contador = self::$contador++;
	 	$this->cliente = "nuevo cliente";
		$this->dirección = "nueva dirección";
	}
	  
}	

 
$objPrueba = new Prueba;

$objPrueba->cliente = "cliente original";
$objPrueba->dirección = "dirección original";
print "Objeto original<BR>";
// el objeto original
print "Contador " . $objPrueba->contador . "<BR>";
print $objPrueba->cliente . "<BR>"; 
print $objPrueba->dirección . "<BR>"; 

$CloPrueba = clone $objPrueba;
print "Objeto clonado<BR>";
// el objeto clonado
print "Contador " . $CloPrueba->contador . "<BR>";
print $CloPrueba->cliente . "<BR>"; 
print $CloPrueba->dirección . "<BR>"; 
?>