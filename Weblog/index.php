<?php
// index.php

include("header.php");

// crea un objeto colección de artículos
$com = New colArtículo();

// los visualiza a todos pero sin
// mostrar sus comentarios
print( $com->visualizarTodos() );

include("footer.php");
?>
