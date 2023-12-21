<?php
// comentario.php

include("header.php");

$oper = "";
if( isset( $_GET['oper'] ) )
{
	$oper = $_GET['oper'];
}


switch( $oper )
{
	case "comentario":
	    // campos texto y usuario: deben estar asignados y no vacíos
		if( isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) &&
		    isset( $_POST['usuario'] ) && !empty( $_POST['usuario'] ) )
		{
		    // recuperamos el identificador del artículo
			$idArt = $_POST['id'];

			// si se han empleado escapes en GET/POST/COOKIES (GPC)
			if( get_magic_quotes_gpc() )
			{
			// se eliminan las barras invertidas
				$_POST['texto'] = stripslashes( $_POST['texto'] );
				$_POST['usuario'] = stripslashes( $_POST['usuario'] );
			}
			$com = new Comentario( $idArt, $_POST['usuario'], $_POST['texto'] );

			$com->insertar();

			print("Se añadió su comentario.<br/>en 3 segundos se recarga esta misma página.");
			print("<meta HTTP-EQUIV=\"refresh\" CONTENT=3;URL=\"comentario.php?id=$idArt\">");

		}
		else
			print("Hay campos faltantes en el formulario del comentario.");

		break;

	default:
	    // si no hay oper = comentario pero hay identificador de artículo
		if( isset( $_GET['id'] ) )
		{
			$idArt = $_GET['id'];
			// creamos unj objeto Artículo
			// y leemos el artículo
			$art = new Artículo();
			$art->leer($idArt);

			// se muestra el artículo como encabezamiento
			print   $art->visualizar() ;

			// y después todos los comentarios registrados
			$com = new colComentario($idArt);

			print "<br><br><b><u>Comentarios:</u></b><br>";
			print( $com->visualizarTodos() );

			print("<br>Para añadir su comentario utilice este formulario y pulse <b>Registrar</b><br/><br/>");

			// se crea un formulario con el parámetro oper igual a comentario
			print("<form action=\"comentario.php?oper=comentario\" method=\"post\">");
			print("<table>");
			print("<tr><td valign=\"top\">Usuario :</td><td><input type=\"text\" name=\"usuario\" class=\"datos\"></td>");
			print("<td><input type=\"submit\" value=\"Registrar\"></td></tr>");
			print("<tr><td valign=\"top\">Comentario del artículo :</td><td colspan =\"2\"><textarea name=\"texto\" rows=\"10\" cols=\"65\" class=\"datos\"></textarea></td></tr>");
			print("</table>");

			// utilizamos un campo oculto para pasar el valor del identificador
			print("<input type=\"hidden\" name=\"id\" value=\"$idArt\">\n");

			print("</form>");
		}

}


include("footer.php");
?>
