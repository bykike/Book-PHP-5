<?php
print "<B><U>Uso de la función array_slice() (ejemplo c507.php)</U></B><BR>";

// reducción del tamaño de una matriz
$mat1 = array("Alemania", "Austria","Bélgica","Dinamarca","España");
// sintaxis
// array_slice (matriz, desde, tamaño)
// Parámetros
// desde: si +, elemento 'desde' donde se procesa la matriz (contado desde el inicio)
// desde: si -, elemento 'desde' donde se procesa la matriz (contado desde el final)
// tamaño: si +, cantidad de elementos
// tamaño: si -, la secuencia se detendrá a tantos elementos del final de la matriz 
// tamaño: si se omite, procesa hasta el final de la matriz
$mat2 = array_slice ($mat1, 3);      // devuelve "Dinamarca" "España"
//
$mat2 = array_slice ($mat1, 2, -1);  // devuelve "Bélgica" "Dinamarca"
//
$mat2 = array_slice ($mat1, -1, 1);  // devuelve "España"
//
$mat2 = array_slice ($mat1, 0, -1);   // devuelve todos menos "España" 
//
$mat2 = array_slice ($mat1, 1, -1);   // devuelve todos menos "Alemania" y "España" 
//
$mat2 = array_slice ($mat1, 1, 3);   // devuelve todos menos "Alemania" y "España" 
?>