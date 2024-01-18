<?php
// Referencias (ejemplo c304.php)

$Cadena = "Ejemplo";
$Ref = &$Cadena; // en $Ref se guarda la dirección de $Cadena
$Ref2 = &$Ref; // Referencia de referencia
echo $Ref2; //  podremos ver "Ejemplo"
 
?>