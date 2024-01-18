<?php
print "<B><U>Uso de la funci�n array_slice() (ejemplo c507.php)</U></B><BR>";

// reducci�n del tama�o de una matriz
$mat1 = array("Alemania", "Austria","B�lgica","Dinamarca","Espa�a");
// sintaxis
// array_slice (matriz, desde, tama�o)
// Par�metros
// desde: si +, elemento 'desde' donde se procesa la matriz (contado desde el inicio)
// desde: si -, elemento 'desde' donde se procesa la matriz (contado desde el final)
// tama�o: si +, cantidad de elementos
// tama�o: si -, la secuencia se detendr� a tantos elementos del final de la matriz 
// tama�o: si se omite, procesa hasta el final de la matriz
$mat2 = array_slice ($mat1, 3);      // devuelve "Dinamarca" "Espa�a"
//
$mat2 = array_slice ($mat1, 2, -1);  // devuelve "B�lgica" "Dinamarca"
//
$mat2 = array_slice ($mat1, -1, 1);  // devuelve "Espa�a"
//
$mat2 = array_slice ($mat1, 0, -1);   // devuelve todos menos "Espa�a" 
//
$mat2 = array_slice ($mat1, 1, -1);   // devuelve todos menos "Alemania" y "Espa�a" 
//
$mat2 = array_slice ($mat1, 1, 3);   // devuelve todos menos "Alemania" y "Espa�a" 
?>