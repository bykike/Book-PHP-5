<?php
print "<B><U>Combinaci�n de matrices con array_merge_recursive() (ejemplo c513.php)</U></B><BR><BR>";

// combinaci�n de tres matrices
$mat1 = array("uno" =>"Alemania");
$mat2 = array("dos"=>"Francia", "uno"=>"Italia"); 
$mat3 = array("cuatro"=>"Escocia", "tres"=>"Espa�a"); 
// las claves repetidas se toman en cuenta 
$mat4 = array_merge_recursive($mat1, $mat2, $mat3);
// la clave "uno" ahora es un array dentro del array 
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat4) . "<BR><BR>";
print_r ($mat4); 

?>