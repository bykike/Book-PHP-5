<?php
// AuxDB.php


class AuxDB implements IAuxDB
{
// esta clase es espec�fica para trabajar con MySQL
// variable privada para guardar la cadena de conexi�n
private $strcon;


function conectar()
{
	$this->strcon = mysql_connect("localhost","root","pswroot")
	       or die("Error de aplicaci�n: No conect� con la base de datos");
	mysql_select_db("weblogdb",$this->strcon)
	      or die ("Error de aplicaci�n: No seleccion� la base de datos");
}


function desconectar()
{
	mysql_close($this->strcon);
}

function ejecutarSQL($strSQL)
{

	$result = mysql_query($strSQL, $this->strcon) or die ("Error de aplicaci�n: Acceso a base de datos inv�lido");
	return $result;
}

function siguienteFila($rst)
{
	return mysql_fetch_assoc($rst);
}

function cantidadFilas($rst)
{
	return mysql_num_rows($rst);
}

function liberarRecursos($rst)
{
	mysql_free_result($rst);
}
}
?>