<?php
// Agenda.php

class Agenda
{

// la clase agenda representa un día de la agenda
// y el campo Memo contiene los datos introducidos
// en el día elegido
// cuando el día no tiene información se muestran puntos
// suspensivos

private $ADia;
private $AMemo;


// Las funciones de acceso nos sirven para recuperar los
// valores de las propiedades
function getADia()       {return $this->ADia;}
function getAMemo()      {return stripslashes($this->AMemo);}


// función constructora del objeto Agenda
function Agenda($p1)
{
	$this->ADia = $p1;


	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia SELECT para leer un día determinado
	$sql = "Select Memo From ";
	$sql.= "Agenda Where Dia =".$this->ADia . " " ;

	$rst = $db->ejecutarSQL($sql);
    $can = $db->cantidadFilas($rst);


	if ($db->cantidadFilas($rst) == 0)
	{
	    // sentencia INSERT para insertar un día
		$sql = "Insert Into Agenda (Dia, Memo) Values (";
		$sql.= $this->ADia . ", '...')";

		// ejecución de la sentencia SQL
	    $db->ejecutarSQL($sql);
	    $this->AMemo = "...";
	 }
	 else
	 {

	    // obtener la fila de datos
	    $fila = $db->siguienteFila($rst);
	    $this->AMemo = $fila['Memo'];
     }

	 // desconexión con el servidor de base de datos
	 $db->desconectar();

}



function modificar($p1)
{
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();
    $this->AMemo = $p1;

	// sentencia UPDATE para modificar un día
	$sql = "Update Agenda Set ";
	$sql.= "Memo ='". mysql_escape_string($this->AMemo) ."' ";
	$sql.= "Where Dia= " . $this->ADia . " ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}



}