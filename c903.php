<?php
Print "<B>Contenido de la superglobal \$_SERVER (ejemplo c903hp) </B><BR>";
echo "<CENTER>";
echo "<TABLE BORDER='1' WIDTH='90%' CELLPADDING='3'>";
echo "<TR>";
echo "<TD><B>CLAVE</B></TD><TD><B>CONTENIDO</B></TD></TR>";
foreach($_SERVER as $key =>$value){
	echo "<TR><TD>$key</TD><TD>$value</TD></TR>";
}
echo "</TABLE>";
echo "</CENTER>";
?>

