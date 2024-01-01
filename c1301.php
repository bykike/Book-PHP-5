<?php
print "<B><U>Uso de sentencia ATTACH (ejemplo c1301.php)</U></B><BR><BR>";

// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666,$sqliteerror);
@sqlite_query($db1, 'DROP TABLE Tabla01;');
// Crear una tabla
sqlite_query($db1,'CREATE TABLE Tabla01 (id INTEGER PRIMARY KEY, Nombre VARCHAR(32), Mail VARCHAR(32));');
// Insertar dos filas en una tabla
sqlite_query($db1, "INSERT INTO Tabla01 VALUES (NULL, 'José Pérez','jperez@hotmailx.com');");
sqlite_query($db1, "INSERT INTO Tabla01 VALUES (NULL, 'Raúl García','rgarcia@hotmailx.com');"); 
// Cuántos registros hay en la tabla Tabla01 de la base c13db1  
print "<BR>En la tabla Tabla01 de la base de datos c13db1 hay " . sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Tabla01;")) . " registros<BR>";

// Apertura de una segunda base de datos c13db2
$db2 = sqlite_open('c13db2', 0666, $sqliteerror);
@sqlite_query($db2, 'DROP TABLE Tabla02;');
// Crear una tabla
sqlite_query($db2,'CREATE TABLE Tabla02 (id INTEGER PRIMARY KEY, Nombre VARCHAR(32), Mail VARCHAR(32));');
// Insertar tres filas en una tabla
sqlite_query($db2, "INSERT INTO Tabla02 VALUES (NULL, 'Luis Fernández','lfernandez@hotmailx.com');");
sqlite_query($db2, "INSERT INTO Tabla02 VALUES (NULL, 'Silvia Conesa','sconesa@hotmailx.com');"); 
sqlite_query($db2, "INSERT INTO Tabla02 VALUES (NULL, 'Susana Rodríguez','srodriguez@hotmailx.com');"); 
// Cuántos registros hay en la tabla Tabla02 de la base c13db2
print "<BR>En la tabla Tabla02 de la base de datos c13db2 hay " . sqlite_fetch_single(sqlite_query($db2, "SELECT COUNT(*) FROM Tabla02;")) . " registros<BR>";

// Se adjuntan las tablas 
sqlite_query($db1, "ATTACH DATABASE 'c13db2' AS db3");
print "<BR>En la tabla Tabla02 de la base de datos db3 hay " . sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM db3.Tabla02;")) . " registros<BR>";
?>