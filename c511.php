<?php
print "<B><U>Uni�n de matrices (ejemplo c511.php)</U></B><BR><BR>";

// uni�n de dos matrices
$mat1 = array("uno" =>"Alemania");
$mat2 = array("dos"=>"Francia", "uno"=>"Italia"); 
$mat3 = array("dos"=>"Francia", "tres"=>"Espa�a"); 
// las claves repetidas no se toman en cuenta   
$mat4 = $mat1 + $mat2 + $mat3; 
print "Contenido actual de la matriz: cantidad de elementos :" . count($mat4) . "<BR><BR>";
print_r ($mat4); 

?>