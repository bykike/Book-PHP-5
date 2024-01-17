<?php
print "<BR><B><U> Conexión inicial con el servidor MySQL (ejemplo c1401.php) <BR></B></U>";
$con = mysql_connect("localhost","root")
	or die ("no se pudo establecer la conexión con el servidor MySQL");
echo "¡OK Conexión establecida!\n";
?>