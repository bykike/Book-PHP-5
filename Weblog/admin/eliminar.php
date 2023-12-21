<?php
// eliminar.php

include("header.php");

$oper = "";
if( isset( $_GET['oper'] ) )
{
	$oper = $_GET['oper'];
}


switch($oper)
{
	case "eliminar":
		// en la segunda llamada a la página el parámetro oper
		// es eliminar y el valor de $_POST['Artis'] es el identificador
		// del artículo que se quiere eliminar
		Artículo::eliminar($_POST['Artis']);

		print("Se eliminó el artículo");

		break;


	default:
		print("Seleccionar un tema que se eliminará de la tabla de artículos<br/><br/>");
		// crea un formulario que llama a esta misma página, pero
		// con oper = eliminar
		print("<form action=\"eliminar.php?oper=eliminar\" method=\"post\">");

		// crea un objeto colArtículo
		// con la colección de todos los artículos
		$arts = new colArtículo();

		// crea una lista de selección de temas de artículos
		$arts->obtenerLista();

		print("<input type=\"submit\" value=\"Eliminar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
