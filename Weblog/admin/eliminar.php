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
		// en la segunda llamada a la p�gina el par�metro oper
		// es eliminar y el valor de $_POST['Artis'] es el identificador
		// del art�culo que se quiere eliminar
		Art�culo::eliminar($_POST['Artis']);

		print("Se elimin� el art�culo");

		break;


	default:
		print("Seleccionar un tema que se eliminar� de la tabla de art�culos<br/><br/>");
		// crea un formulario que llama a esta misma p�gina, pero
		// con oper = eliminar
		print("<form action=\"eliminar.php?oper=eliminar\" method=\"post\">");

		// crea un objeto colArt�culo
		// con la colecci�n de todos los art�culos
		$arts = new colArt�culo();

		// crea una lista de selecci�n de temas de art�culos
		$arts->obtenerLista();

		print("<input type=\"submit\" value=\"Eliminar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
