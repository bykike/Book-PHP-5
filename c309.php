<?php
// Uso de operandos de asignaci�n (ejemplo c309.php)

$var1 = 4.5; // asignaci�n b�sica
$var2 = 5; 
// Suma las dos variables y el resultado se asigna
// en el primer operando (4.5 + 5)
$var1 += $var2; // $var1 ahora valdr� 9.5

// Resta las dos variables y el resultado se asigna
// en el primer operando (9.5 - 5)
$var1 -= $var2; // $var1 ahora valdr� 4.5

// Multiplica las dos variables y el resultado se asigna
// en el primer operando
$var1 *= $var2; // $var1 ahora valdr� 22.5

// Divide las dos variables y el resultado se asigna
// en el primer operando
$var1 /= $var2; // $var1 ahora valdr� 4.5

// M�dulo entre las dos variables y el resultado se asigna
// en el primer operando
$var1 %= $var2; // $var1 ahora valdr� 4

// Concatena las dos variables y el resultado se asigna
// en el primer operando
$var1 .= $var2; // $var1 ahora valdr� 45 (4 concatenado con  5)

$var1 ="P"; $var2 = "hp";
$var1 += $var2;
echo $var1; 

?>