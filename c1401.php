<?php
print "<BR><B><U> Conexi�n inicial con el servidor MySQL (ejemplo c1401.php) <BR></B></U>";
$con = mysql_connect("localhost","root")
	or die ("no se pudo establecer la conexi�n con el servidor MySQL");
echo "�OK Conexi�n establecida!\n";
?>