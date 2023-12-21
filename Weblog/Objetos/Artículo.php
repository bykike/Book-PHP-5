<?php
// Art�culo.php

class Art�culo
{

private $AId;
private $AT�tulo;
private $ATexto;
private $AFecha;


// Las funciones de acceso nos sirven para recuperar los
// valores de las propiedades
function getAId()       {return $this->AId;}
function getAT�tulo()   {return $this->AT�tulo;}
function getATexto()    {return $this->ATexto;}
function getAFecha()    {return $this->AFecha;}


function Art�culo($p1=0,  $p2="", $p3="", $p4=0)
{
   	$this->AId 		= $p1;
	$this->AT�tulo 	= $p2;
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

		// sentencia SELECT para leer un art�culo determinado
		$sql = "Select AT�tulo, ATexto, AFecha From ";
		$sql.= "Art�culo Where AId ='".$this->AId . "'" ;

		$rst = $db->ejecutarSQL($sql);

		// desconexi�n con el servidor de base de datos
		$db->desconectar();

		// obtener la fila de datos
		$fila = $db->siguienteFila($rst);
		$this->AT�tulo = $fila['AT�tulo'];
		$this->ATexto = $fila['ATexto'];
		$this->AFecha = $fila['AFecha'];
	}
}


function insertar()
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia INSERT para insertar un art�culo
	$sql = "Insert Into Art�culo (AT�tulo, ATexto, AFecha) Values ('";
	$sql.= mysql_escape_string($this->AT�tulo) . "', '";
	$sql.= mysql_escape_string($this->ATexto) . "', ";
	$sql.=  "NOW() ) ";

	// ejecuci�n de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexi�n con el servidor de base de datos
	$db->desconectar();
}


function modificar()
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia UPDATE para modificar un art�culo
	$sql = "Update Art�culo Set AT�tulo='" . mysql_escape_string($this->AT�tulo) . "', ";
	$sql.= "ATexto ='". mysql_escape_string($this->ATexto) ."' ";
	$sql.= "Where AId=' " . $this->AId . "'";

	// ejecuci�n de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexi�n con el servidor de base de datos
	$db->desconectar();
}


function eliminar($p1)
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

    // sentencia DELETE para eliminar todos los comentarios
	$sql = "Delete From Comentario Where CAId=" . $p1 . " ";

	// ejecuci�n de la sentencia SQL
	$db->ejecutarSQL($sql);

	// sentencia DELETE para eliminar un art�culo
	$sql = "Delete From Art�culo Where AId=" . $p1 . " ";

	// ejecuci�n de la sentencia SQL
	$db->ejecutarSQL($sql);



	// desconexi�n con el servidor de base de datos
	$db->desconectar();
}


function visualizar()
{
	// Fija la informaci�n de regi�n
	setlocale(LC_TIME, "sp_SP", "SP");

 	// Se genera c�digo HTML con la informaci�n del art�culo
	$ret = "<B>" . nl2br($this->AT�tulo) . "</B><BR><BR>";
	$ret.=  nl2br($this->ATexto) . "<BR><BR>";
	$ret.=  $this->AFecha . " :: ";

  	// Se incluye un enlace para producir comentarios del art�culo
	$ret .= "<a href=\"comentario.php?id=" .$this->AId. "\">comentarios</a>";

	// retorno de la cadena que se visualiza
	return $ret;

}
}