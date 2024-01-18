<?php
print "<B>Función include_once -Problema en Windows- (ejemplo c418.php)</B><BR><BR>";
 
$var1 = 1; 
// primera llamada a c417.php
print "primera include_once<BR>";
include_once 'c417.php';

// segunda llamada a c417.php
$var1++;
// ATENCIÓN: ¡En Windows se carga el archivo a pesar de include_once!
print "segunda include_once<BR>";
include_once 'C417.php'; 

?> 
 