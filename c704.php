<?php
print "<B><U>Par�metros predeterminados (ejemplo c704.php)</U></B><BR><BR>";

$var1 = 12;

// 1. en este caso se pasa un valor
prueba($var1);

// 2. en este caso se pasan dos valores
prueba($var1, 100);

// 3. en este caso se pasan tres valores
prueba($var1, 100, 200); 

// 4. en este caso no se pasa ning�n valor
// con @ evitamos el mensaje de error
@PRUEBA(); 

// 5. en este caso no se pasa ning�n valor
prueba(); 
echo "Fin";

// La funci�n tiene un par�metro normal y dos con valores predeterminados
function prueba($a,$b =6,$c=3) {
print " La suma es " . ($a + $b + $c) .  "<BR><BR>";
 
}	  
?>