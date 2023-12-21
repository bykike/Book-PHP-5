<?php
// colArt�culo.php

class ColArt�culo
{
 // en esta variable privada se almacenan todos los objetos
// Art�culo
private $Arts = Array();


//
function colArt�culo()
{

	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia SELECT para leer todos los art�culos
	$sql = "Select AId, AT�tulo, ATexto, AFecha From ";
	$sql .= "Art�culo Order by AFecha Desc" ;
	$rst = $db->ejecutarSQL($sql);


	while( $fila = $db->SiguienteFila($rst))
	{

		// carga de elementos Art�culo
		// uso del constructor parametrizado
 		$this->Arts[] = new Art�culo( $fila['AId'],
		                              $fila['AT�tulo'],
				                      $fila['ATexto'],
				                      $fila['AFecha'] );

	}
	// al finalizar de utilizar el conjunto de resultados lo
	// liberamos
	$db->liberarRecursos( $rst );
}


function obtenerLista()
{
	// producimos el c�digo HTML con la sentencia Select
	// de encabezamiento
	print("<select name =\"Artis\">\n");

	foreach( $this->Arts as $elem )
	{
		print("<option value=\"".$elem->getAId()."\">".$elem->getAT�tulo(). "</option>\n");
	}

	// cerrar la instrucci�n select
	print("</select>\n");
}

function visualizarTodos()
{
	$str ="";
	// recorremos toda la matriz con foreach
	foreach( $this->Arts as $elem )
	{
 		$str .=  $elem->visualizar() . "<br><br>";
	}

	// devuelve toda la cadena
	return $str;
}

}