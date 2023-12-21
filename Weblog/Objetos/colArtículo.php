<?php
// colArtículo.php

class ColArtículo
{
 // en esta variable privada se almacenan todos los objetos
// Artículo
private $Arts = Array();


//
function colArtículo()
{

	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia SELECT para leer todos los artículos
	$sql = "Select AId, ATítulo, ATexto, AFecha From ";
	$sql .= "Artículo Order by AFecha Desc" ;
	$rst = $db->ejecutarSQL($sql);


	while( $fila = $db->SiguienteFila($rst))
	{

		// carga de elementos Artículo
		// uso del constructor parametrizado
 		$this->Arts[] = new Artículo( $fila['AId'],
		                              $fila['ATítulo'],
				                      $fila['ATexto'],
				                      $fila['AFecha'] );

	}
	// al finalizar de utilizar el conjunto de resultados lo
	// liberamos
	$db->liberarRecursos( $rst );
}


function obtenerLista()
{
	// producimos el código HTML con la sentencia Select
	// de encabezamiento
	print("<select name =\"Artis\">\n");

	foreach( $this->Arts as $elem )
	{
		print("<option value=\"".$elem->getAId()."\">".$elem->getATítulo(). "</option>\n");
	}

	// cerrar la instrucción select
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