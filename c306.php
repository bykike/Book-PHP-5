<?php
// Ámbito local (ejemplo c306.php)

function PruebaLocal()
{ 
    $var; 
	echo "Prueba local. \$var  :". ++$var . "<BR>"; /* qué valor muestra $var */
 
} 
 
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 1

?>
