<?php
// header.php (carpeta Admin)

function __autoload($objeto)
{
	include("../Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicaci�n de ejemplo Weblog cap�tulo 17 (administraci�n)</title>

<?php
include("../estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="t�tulo">Administraci�n del Weblog</td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="18%">
    :: Opciones<br/>
    <br/>
    - <a href="agregar.php">A�adir art�culo</a><br/>
    - <a href="modificar.php">Modificar art�culo</a><br/>
    - <a href="eliminar.php">Eliminar art�culo</a><br/>
    - <a href="../index.php">Inicio</a><br/>
  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="80%">