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
	    // campos texto y usuario: deben estar asignados y no vac�os
		if( isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) &&
		    isset( $_POST['usuario'] ) && !empty( $_POST['usuario'] ) )
		{
		    // recuperamos el identificador del art�culo
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

			print("Se a�adi� su comentario.<br/>en 3 segundos se recarga esta misma p�gina.");
			print("<meta HTTP-EQUIV=\"refresh\" CONTENT=3;URL=\"comentario.php?id=$idArt\">");

		}
		else
			print("Hay campos faltantes en el formulario del comentario.");

		break;

	default:
	    // si no hay oper = comentario pero hay identificador de art�culo
		if( isset( $_GET['id'] ) )
		{
			$idArt = $_GET['id'];
			// creamos unj objeto Art�culo
			// y leemos el art�culo
			$art = new Art�culo();
			$art->leer($idArt);

			// se muestra el art�culo como encabezamiento
			print   $art->visualizar() ;

			// y despu�s todos los comentarios registrados
			$com = new colComentario($idArt);

			print "<br><br><b><u>Comentarios:</u></b><br>";
			print( $com->visualizarTodos() );

			print("<br>Para a�adir su comentario utilice este formulario y pulse <b>Registrar</b><br/><br/>");

			// se crea un formulario con el par�metro oper igual a comentario
			print("<form action=\"comentario.php?oper=comentario\" method=\"post\">");
			print("<table>");
			print("<tr><td valign=\"top\">Usuario :</td><td><input type=\"text\" name=\"usuario\" class=\"datos\"></td>");
			print("<td><input type=\"submit\" value=\"Registrar\"></td></tr>");
			print("<tr><td valign=\"top\">Comentario del art�culo :</td><td colspan =\"2\"><textarea name=\"texto\" rows=\"10\" cols=\"65\" class=\"datos\"></textarea></td></tr>");
			print("</table>");

			// utilizamos un campo oculto para pasar el valor del identificador
			print("<input type=\"hidden\" name=\"id\" value=\"$idArt\">\n");

			print("</form>");
		}

}


include("footer.php");
?>
