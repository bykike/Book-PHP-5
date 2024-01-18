<?php
print "<B><U>Uso de la función array_shift() (ejemplo c508.php)</U></B><BR>";

// reducción del tamaño de una matriz
$mat1 = array("Alemania", "Austria","Bélgica","Dinamarca","España");
$var2 = array_shift ($mat1);      // elimina el primer elemento
								  // en $var2 queda almacenado ese elemento	
print "Se ha eliminado el elemento: " .$var2 . "<BR><BR>";
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat1). "<BR><BR>";
 
print_r ($mat1); 

?>