<?php
// Apertura de archivos (ejemplo c1102.php) 

// si no existe el archivo emite una advertencia
// con @ evito el mensaje de advertencia
$fp = @fopen("c1102.php", "r") 
    or die ("No existe el archivo");

// en $fp queda cargado el descriptor del recurso
print $fp; 
// por ejemplo:
// Resource id #3

$fp = fopen("http://www.php.net/", "r");
// en $fp queda cargado el descriptor del recurso
print $fp; 
// por ejemplo:
// Resource id #3  
?>