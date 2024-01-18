<?php
// Ámbito local (ejemplo c307.php)

function PruebaLocal()
{ 
    static $var; 
	echo "Prueba local. \$var  :". ++$var . "<BR>"; /* qué valor muestra $var */
 
} 
 
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 2
PruebaLocal(); // debe imprimir 3

?>
