<?php
print "<B><U>Uso de la funci�n array_push() (ejemplo c510.php)</U></B><BR><BR>";

// incremento del tama�o de una matriz
$mat1 = array("Alemania", "Austria","B�lgica","Dinamarca","Espa�a");
$var1 = array_push ($mat1,"Francia","Grecia");  // a�ade dos elementos
 
print "Contenido actual de la matriz: cantidad de elementos :" . $var1 . "<BR><BR>";
print_r ($mat1); 

?>