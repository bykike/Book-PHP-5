<?php
// �mbito local (ejemplo c306.php)

function PruebaLocal()
{ 
    $var; 
	echo "Prueba local. \$var  :". ++$var . "<BR>"; /* qu� valor muestra $var */
 
} 
 
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 1
PruebaLocal(); // debe imprimir 1

?>
