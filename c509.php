<?php
print "<B><U>Uso de la funci�n array_pop() (ejemplo c509.php)</U></B><BR>";

// reducci�n del tama�o de una matriz
$mat1 = array("Alemania", "Austria","B�lgica","Dinamarca","Espa�a");
array_pop ($mat1);      // elimina el �ltimo elemento "Espa�a"
 
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat1). "<BR><BR>";
print_r ($mat1); 

?>