<?php
// header.php

function __autoload($objeto)
{
	include("Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicaci�n de ejemplo Weblog cap�tulo 17</title>

<?php
include("estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="t�tulo">Aplicaci�n de ejemplo Weblog cap�tulo 17</td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="18%">
    Navegaci�n<br/>
    <br/>
    = = <a href="index.php">Art�culos</a><br/>
    = = <a href="admin/index.php">Administrador</a><br/>
  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="80%">

