<?php
print "<B><U>Combinación de matrices con array_merge() (ejemplo c512.php)</U></B><BR><BR>";

// combinación de tres matrices
$mat1 = array("uno" =>"Alemania");
$mat2 = array("dos"=>"Francia", "uno"=>"Italia"); 
$mat3 = array("dos"=>"Escocia", "tres"=>"España"); 
// las claves repetidas no se toman en cuenta   
$mat4 = array_merge($mat1, $mat2, $mat3); 
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat4) . "<BR><BR>";
print_r ($mat4); 

?>