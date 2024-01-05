<?php
print "<B><U>Uso de sentencia BEGIN TRANSACTION (ejemplo c1302.php)</U></B><BR><BR>";

// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666,$sqliteerror);
@sqlite_query($db1, 'DROP TABLE Tabla01;');
// Crear una tabla e insertar datos todo dentro de una transacción
sqlite_query($db1,"BEGIN; 
 					CREATE TABLE Tabla01 (id INTEGER PRIMARY KEY, Nombre VARCHAR(32), Mail VARCHAR(32));
					INSERT INTO Tabla01 VALUES (NULL, 'José Pérez','jperez@hotmailx.com'); 
 					INSERT INTO Tabla01 VALUES (NULL, 'Raúl García','rgarcia@hotmailx.com');  
				   COMMIT;");
				    	
print "<BR>En la tabla Tabla01 de la base de datos c13db1 hay " . sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Tabla01;")) . " registros<BR>";
// La respuesta es 2 registros
 
?>