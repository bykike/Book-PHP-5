<?php
// Funci�n include(ejemplo c415.php)
 
$var1 = 2; 
// opci�n m�s segura
if ($var1 == 2)
    { 
 	include 'c414.php';
	}
// esta sintaxis podr�a dar problemas
// cuando hay una include
if ($var1 == 3):
 	include 'c414.php';
endif;

?> 
 