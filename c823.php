<?php
print "<B><U>Destrucción forzada con la sentencia delete (ejemplo c823.php)</U></B><BR><BR>";

// Definición de la clase Prueba
class Prueba {
	//  destructor de la clase Prueba 
	function __destruct() {
	    print "Éste es el destructor de la clase Prueba<BR>";
	}
}	

print "<BR>Se crea un ejemplar de la clase Prueba<BR>";
$obj = new Prueba; 
// aquí se fuerza la eliminación del objeto $obj 
delete $base;

// al finalizar las secuencias de comandos se liberan todos los objetos
// aquí se activan los destructores de los objetos
Print "<BR><B>Fin de la secuencia de comandos.</B><BR><BR>"; 
Print "Ahora ya no debería haber un mensaje del destructor, ya que el objeto se eliminó";
?>