<?php
// modificar.php

include("header.php");

// la primera vez que se entra a esta página
// la acción está sin asignar
$oper = "";

// si ya entró anteriormente la acción puede ser
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
	// en esta acción se busca el artículo elegido en la primera llamada
	// a la pantalla modificar
		$art = new Artículo();
		$art->leer($_POST['Artis']);

		// crea un formulario que llama a esta misma página pero con un
		// parámetro oper igual a modificar
		print("Datos del artículo elegido : <br/><br/>");
		print("<form action=\"modificar.php?oper=modificar\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema del artículo :</td><td><input type=\"text\" name=\"título\" value=\"".$art->getATítulo()."\"></td>");
		print("<td><input type=\"submit\" value=\"Validar\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td colspan=\"2\"><textarea name=\"texto\" rows=\"20\" cols=\"50\">".$art->getATexto()."</textarea></td></tr>\n");

		print("</table>\n");

		// se crea un campo oculto con el número del artículo
		print("<input type=\"hidden\" name=\"Artis\" value=\"".$_POST['Artis']."\">\n");
		print("</form>");
		break;

	case "modificar":
	// validación de los campos del formulario
		if( isset( $_POST['título'] ) && !empty( $_POST['título'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )
		{
			// detecta uso de escape
			if( get_magic_quotes_gpc() )
			{
				$_POST['título'] = stripslashes( $_POST['título'] );
				$_POST['texto'] = stripslashes( $_POST['texto'] );
			}
			// crea un objeto Artículo
			$art = new Artículo( $_POST['Artis'], $_POST['título'], $_POST['texto'] );

			// modifica los datos en la tabla
			$art->modificar();

			print("Artículo modificado.");
		}
		else
			print("Error de validación en datos del formulario");

		break;




	default:
	// esta acción se emplea la primera vez que se carga la página
		print("Seleccionar el tema que se quiere modificar :<br/><br/>");
		// crea un formulario que llama a la propia página pero
		// con un parámetro oper diferente
		print("<form action=\"modificar.php?oper=obtener\" method=\"post\">");

        // crea un objeto colArtículo (colección de artículos)
		$arts = new colArtículo();

		// genera una lista de selección con los nombres de los temas
		// de los artículos
		$arts->obtenerLista();

		print("<input type=\"submit\" value=\"Modificar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>

