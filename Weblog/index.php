<?php
// index.php

include("header.php");

// crea un objeto colecci�n de art�culos
$com = New colArt�culo();

// los visualiza a todos pero sin
// mostrar sus comentarios
print( $com->visualizarTodos() );

include("footer.php");
?>
