<?php
print "<B><U>Constantes de clases (ejemplo c817.php)</U></B><BR><BR>";
// no deber�a permitir usar el m�todo hacer sin generar
// la instancia

// Definici�n de la clase MisConstantes
class MisConstantes {
	const pi = 3.14156;
	const cero_absoluto = -273;
	function hacer(){
		print "<BR> OOOO" . MisConstantes::cero_absoluto;
	}
}	
$di�metro = 12;
// Para usar la constante no hace falta crear un ejemplar 
$per�metro = $di�metro * MisConstantes::pi;

print "El per�metro es  $per�metro ";
 
MisConstantes::hacer();
  
?>