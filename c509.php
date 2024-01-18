<?php
print "<B><U>Uso de la función array_pop() (ejemplo c509.php)</U></B><BR>";

// reducción del tamaño de una matriz
$mat1 = array("Alemania", "Austria","Bélgica","Dinamarca","España");
array_pop ($mat1);      // elimina el último elemento "España"
 
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat1). "<BR><BR>";
print_r ($mat1); 

?>