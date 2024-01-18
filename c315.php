<?php
// Operador de omisión de errores (c315.php)

$var1 = 3;
$var2 = 0;
// La siguiente instrucción no genera error
// aunque sea una divisón por cero
$huboerror = "Variable vacía: Error en instrucción";
$nohuboerror = "Variable con valor";
 
@$resultado = $var1 / $var2;
echo (empty($resultado))? $huboerror: $nohuboerror;

?>