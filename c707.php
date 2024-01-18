<?php
print "<B><U>Funciones variables (ejemplo c707.php)</U></B><BR><BR>";


$var1 = 2;
if (is_string($var1)) {
	$rutina = "procesa_cadena";
}	
else{
	$rutina = "procesa_entero";
}
// PHP analiza el contenido de la variable $rutina
// y si el contenido de la variable coincide
// con el nombre de una función, intentará su ejecución

$rutina();

echo "<BR><BR>Fin";

// no se recomienda definir una función con un nombre 
// de una variable. No da error, pero puede confundir
// a quien mantenga el programa 
function rutina() {
	echo "función rutina, puesta para confundir un poco";
}
function procesa_cadena() {
	echo "ejecución de la función procesa cadena";
}
function procesa_entero() {
	echo "ejecución de la función procesa entero";
}
		
 
?>