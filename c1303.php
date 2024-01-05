<?php
print "<B><U>Uso de sentencia COPY(ejemplo c1303.php)</U></B><BR><BR>";
// Contenido del archivo c1303.txt
//a1	b1	c1
//a2	b2	c2
//a3	b3	c3	
// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666, $sqliteerror);
@sqlite_query($db1, 'DROP TABLE Tabla01;');
// Crear una tabla y copiar desde un archivo todo dentro de una transacción
sqlite_query($db1,"BEGIN; 
 					CREATE TABLE Tabla01 (Nombre VARCHAR(32), 
					                      Apellidos VARCHAR(32), 
										  Mail VARCHAR(32));
				    COPY  Tabla01  FROM 'c:\c1303.txt';			    	
                   COMMIT;");
print "<BR>En la tabla Tabla01 de la base de datos c13db1 hay " . 
       sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Tabla01;")) . 
	   " registros<BR>";
// La respuesta es 3 registros
 
?>