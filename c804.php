<?php
print "<B><U>Acceso a una variable miembro est�tica  (ejemplo c804.php)</U></B><BR><BR>";

// Clase
class MiClase {
	static $var = 6;
}
// se usa sin crear la instancia de la clase
// Tiene un valor inicial igual a 6	
// sintaxis clase::variable
Print MiClase::$var ."<BR>";
// se modifica la variable de clase est�tica
MiClase::$var = 7; 
 
Print MiClase::$var ."<BR>";
 
?>