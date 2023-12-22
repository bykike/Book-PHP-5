<?php
// Comprobar la existencia de un archivo (file_exists)(ejemplo c1101.php) 

$var = "c1101.php";
// la construcción die emite el mensaje y hace que finalice el script
file_exists($var)  
    or die ("No existe el archivo $var");

?>