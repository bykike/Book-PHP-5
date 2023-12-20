<html>
<head>
<title>Agenda</title>

<style type="text/css" media="all">
	@import "agenda.css";
</style>

</head>
<body>
<?php

// De manera predeterminada cargamos estas variables con valores
// por defecto el año y mes vigentes
$year= date("Y");
$mes = date("n");

// en $dia tendremos el número de día en formato timestamp de UNIX
$dia = "";

// en $nrodia tendremos el nro. de día elegido en formato 1 a 31
$nrodia = "";

// si la cadena de la url contiene estas variables, las
// recupera y las guarda para su uso posterior

if(isset($_GET['fyear']) && !empty($_GET['fyear']))
	$year = $_GET['fyear'];

if(isset($_GET['fmes']) && !empty($_GET['fmes']))
	$mes = $_GET['fmes'];

if(isset($_GET['dia']) && !empty($_GET['dia']) )
    $dia = $_GET['dia'];

if(isset($_GET['fdia']) && !empty($_GET['fdia']) )
    $nrodia = $_GET['fdia'];

// el primer formulario contiene la elección
// de mes y año para crear el almanaque correspondiente

?>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="titu1">Agenda</td></tr>
<tr><td colspan="3"><br/></td></tr>
<tr>
  <td class="marco" width="40%">
    <span class="titu2">Elegir mes y año </span><br/>
    <form name= "f1" action="inicio.php" method="get">
    <select name="fyear">
    	<option value="2004">2004</option>
    	<option value="2005">2005</option>
    	<option value="2006">2006</option>
    	<option value="2007">2007</option>
    </select>
    <select name="fmes">
	    	<option value="1">enero</option>
	    	<option value="2">febrero</option>
	    	<option value="3">marzo</option>
	    	<option value="4">abril</option>
	    	<option value="5">mayo</option>
			<option value="6">junio</option>
			<option value="7">julio</option>
	    	<option value="8">agosto</option>
	    	<option value="9">septiembre</option>
			<option value="10">octubre</option>
			<option value="11">noviembre</option>
	    	<option value="12">diciembre</option>
    </select><br>
    <input type="submit" value="Almanaque">
    </form>
    <br/>


