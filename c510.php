<?php
print "<B><U>Uso de la función array_push() (ejemplo c510.php)</U></B><BR><BR>";

// incremento del tamaño de una matriz
$mat1 = array("Alemania", "Austria","Bélgica","Dinamarca","España");
$var1 = array_push ($mat1,"Francia","Grecia");  // añade dos elementos
 
print "Contenido actual de la matriz: cantidad de elementos :" . $var1 . "<BR><BR>";
print_r ($mat1); 

?>