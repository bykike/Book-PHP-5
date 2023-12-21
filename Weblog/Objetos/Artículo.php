<?php
// Artículo.php

class Artículo
{

private $AId;
private $ATítulo;
private $ATexto;
private $AFecha;


// Las funciones de acceso nos sirven para recuperar los
// valores de las propiedades
function getAId()       {return $this->AId;}
function getATítulo()   {return $this->ATítulo;}
function getATexto()    {return $this->ATexto;}
function getAFecha()    {return $this->AFecha;}


function Artículo($p1=0,  $p2="", $p3="", $p4=0)
{
   	$this->AId 		= $p1;
	$this->ATítulo 	= $p2;
	$this->ATexto 	= $p3;
	$this->AFecha 	= $p4;
}

function leer($numArt)
{
	$this->AId = $numArt;

    // si el identificador no es mayor a cero no se accede a la
	// base de datos
	if ($this->AId > 0)
	{
		// Crear un objeto AuxDB
		$db = new AuxDB();
		$db->conectar();

		// sentencia SELECT para leer un artículo determinado
		$sql = "Select ATítulo, ATexto, AFecha From ";
		$sql.= "Artículo Where AId ='".$this->AId . "'" ;

		$rst = $db->ejecutarSQL($sql);

		// desconexión con el servidor de base de datos
		$db->desconectar();

		// obtener la fila de datos
		$fila = $db->siguienteFila($rst);
		$this->ATítulo = $fila['ATítulo'];
		$this->ATexto = $fila['ATexto'];
		$this->AFecha = $fila['AFecha'];
	}
}


function insertar()
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia INSERT para insertar un artículo
	$sql = "Insert Into Artículo (ATítulo, ATexto, AFecha) Values ('";
	$sql.= mysql_escape_string($this->ATítulo) . "', '";
	$sql.= mysql_escape_string($this->ATexto) . "', ";
	$sql.=  "NOW() ) ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function modificar()
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia UPDATE para modificar un artículo
	$sql = "Update Artículo Set ATítulo='" . mysql_escape_string($this->ATítulo) . "', ";
	$sql.= "ATexto ='". mysql_escape_string($this->ATexto) ."' ";
	$sql.= "Where AId=' " . $this->AId . "'";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function eliminar($p1)
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

    // sentencia DELETE para eliminar todos los comentarios
	$sql = "Delete From Comentario Where CAId=" . $p1 . " ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// sentencia DELETE para eliminar un artículo
	$sql = "Delete From Artículo Where AId=" . $p1 . " ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);



	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function visualizar()
{
	// Fija la información de región
	setlocale(LC_TIME, "sp_SP", "SP");

 	// Se genera código HTML con la información del artículo
	$ret = "<B>" . nl2br($this->ATítulo) . "</B><BR><BR>";
	$ret.=  nl2br($this->ATexto) . "<BR><BR>";
	$ret.=  $this->AFecha . " :: ";

  	// Se incluye un enlace para producir comentarios del artículo
	$ret .= "<a href=\"comentario.php?id=" .$this->AId. "\">comentarios</a>";

	// retorno de la cadena que se visualiza
	return $ret;

}
}