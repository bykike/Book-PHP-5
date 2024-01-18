<?php
// Función include(ejemplo c415.php)
 
$var1 = 2; 
// opción más segura
if ($var1 == 2)
    { 
 	include 'c414.php';
	}
// esta sintaxis podría dar problemas
// cuando hay una include
if ($var1 == 3):
 	include 'c414.php';
endif;

?> 
 