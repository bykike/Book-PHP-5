<?php
// �mbito local (ejemplo c307.php)

function PruebaLocal()
{ 
    static $var; 
	echo "Prueba local. \$var  :". ++$var . "<BR>"; /* qu� valor muestra $var */
 
} 
 
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 2
PruebaLocal(); // debe imprimir 3

?>
