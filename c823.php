<?php
print "<B><U>Destrucci�n forzada con la sentencia delete (ejemplo c823.php)</U></B><BR><BR>";

// Definici�n de la clase Prueba
class Prueba {
	//  destructor de la clase Prueba 
	function __destruct() {
	    print "�ste es el destructor de la clase Prueba<BR>";
	}
}	

print "<BR>Se crea un ejemplar de la clase Prueba<BR>";
$obj = new Prueba; 
// aqu� se fuerza la eliminaci�n del objeto $obj 
delete $base;

// al finalizar las secuencias de comandos se liberan todos los objetos
// aqu� se activan los destructores de los objetos
Print "<BR><B>Fin de la secuencia de comandos.</B><BR><BR>"; 
Print "Ahora ya no deber�a haber un mensaje del destructor, ya que el objeto se elimin�";
?>