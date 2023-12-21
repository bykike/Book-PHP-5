<?php
// modificar.php

include("header.php");

// la primera vez que se entra a esta p�gina
// la acci�n est� sin asignar
$oper = "";

// si ya entr� anteriormente la acci�n puede ser
// obtener
// o
// modificar
if( isset( $_GET['oper'] ) )
{
	$oper = $_GET['oper'];
}


switch($oper)
{
	case "obtener":
	// en esta acci�n se busca el art�culo elegido en la primera llamada
	// a la pantalla modificar
		$art = new Art�culo();
		$art->leer($_POST['Artis']);

		// crea un formulario que llama a esta misma p�gina pero con un
		// par�metro oper igual a modificar
		print("Datos del art�culo elegido : <br/><br/>");
		print("<form action=\"modificar.php?oper=modificar\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema del art�culo :</td><td><input type=\"text\" name=\"t�tulo\" value=\"".$art->getAT�tulo()."\"></td>");
		print("<td><input type=\"submit\" value=\"Validar\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td colspan=\"2\"><textarea name=\"texto\" rows=\"20\" cols=\"50\">".$art->getATexto()."</textarea></td></tr>\n");

		print("</table>\n");

		// se crea un campo oculto con el n�mero del art�culo
		print("<input type=\"hidden\" name=\"Artis\" value=\"".$_POST['Artis']."\">\n");
		print("</form>");
		break;

	case "modificar":
	// validaci�n de los campos del formulario
		if( isset( $_POST['t�tulo'] ) && !empty( $_POST['t�tulo'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )
		{
			// detecta uso de escape
			if( get_magic_quotes_gpc() )
			{
				$_POST['t�tulo'] = stripslashes( $_POST['t�tulo'] );
				$_POST['texto'] = stripslashes( $_POST['texto'] );
			}
			// crea un objeto Art�culo
			$art = new Art�culo( $_POST['Artis'], $_POST['t�tulo'], $_POST['texto'] );

			// modifica los datos en la tabla
			$art->modificar();

			print("Art�culo modificado.");
		}
		else
			print("Error de validaci�n en datos del formulario");

		break;




	default:
	// esta acci�n se emplea la primera vez que se carga la p�gina
		print("Seleccionar el tema que se quiere modificar :<br/><br/>");
		// crea un formulario que llama a la propia p�gina pero
		// con un par�metro oper diferente
		print("<form action=\"modificar.php?oper=obtener\" method=\"post\">");

        // crea un objeto colArt�culo (colecci�n de art�culos)
		$arts = new colArt�culo();

		// genera una lista de selecci�n con los nombres de los temas
		// de los art�culos
		$arts->obtenerLista();

		print("<input type=\"submit\" value=\"Modificar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>

