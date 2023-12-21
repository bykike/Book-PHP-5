<?php
// header.php

function __autoload($objeto)
{
	include("Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicación de ejemplo Weblog capítulo 17</title>

<?php
include("estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="título">Aplicación de ejemplo Weblog capítulo 17</td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="18%">
    Navegación<br/>
    <br/>
    = = <a href="index.php">Artículos</a><br/>
    = = <a href="admin/index.php">Administrador</a><br/>
  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="80%">

