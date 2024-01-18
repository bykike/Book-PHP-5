<?php
print "<B><U>Constantes de clases (ejemplo c817.php)</U></B><BR><BR>";
// no debería permitir usar el método hacer sin generar
// la instancia

// Definición de la clase MisConstantes
class MisConstantes {
	const pi = 3.14156;
	const cero_absoluto = -273;
	function hacer(){
		print "<BR> OOOO" . MisConstantes::cero_absoluto;
	}
}	
$diámetro = 12;
// Para usar la constante no hace falta crear un ejemplar 
$perímetro = $diámetro * MisConstantes::pi;

print "El perímetro es  $perímetro ";
 
MisConstantes::hacer();
  
?>