<?php
print "<B><U>Uso de la sentencia INSERT (ejemplo c1305.php)</U></B><BR><BR>";
// Ejemplos para INSERT
// e INSERT desde SELECT

// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666, $sqliteerror);

// Elimina la tabla (por precaución)
@sqlite_query($db1, 'DROP TABLE Personas;');

// Comienza la transacción
sqlite_query($db1,"BEGIN"); 
 
// Tabla personas
$creat1 = "CREATE TABLE Personas (
 			Id_Person INTEGER PRIMARY KEY NOT NULL,
			Nombres VARCHAR(32) NOT NULL DEFAULT ' ' , 
			Apellidos VARCHAR(32) NOT NULL DEFAULT ' ', 
			Mail VARCHAR(32) NOT NULL DEFAULT ' ',
			Créditos double(10,2) NOT NULL DEFAULT '0',
			Texto text(65535) NOT NULL DEFAULT ' ');";
			
sqlite_query($db1,$creat1 . $creat2 . $creat3);

// Carga un valor en la tabla Personas en todos los campos ordenados
// al no informarse una lista de columnas, se supone  que se informan
// todas las columnas de modo ordenado
$ins01 = "INSERT INTO Personas 
			 values
 			 (NULL, 'José','Rodríguez','jrodriguez@hotmailx.com',0,' ');";
sqlite_query($db1,$ins01);

// Recupera el valor de autoincremento
$clave = sqlite_last_insert_rowid ($db1);
print "<BR>Tabla Personas: la clave asignada por autoincremento es  $clave <BR>";

// Carga un valor en la tabla Personas con nombres de campos
// usará los valores DEFAULT en los campos no informados 
$ins01 = "INSERT INTO Personas 
             ('Nombres','Apellidos')
			 values
 			 ('Juan','Pérez');";
sqlite_query($db1,$ins01);
			 
// Recupera el valor de autoincremento
$clave = sqlite_last_insert_rowid ($db1);
print "<BR>Tabla Personas: la clave asignada por autoincremento es  $clave <BR>";

// INSERT desde una SELECT
// usará los valores DEFAULT
// En este caso, con esta sentencia se duplican los 
// registros de la tabla 
$ins01 = "INSERT INTO Personas
			 ('Nombres','Apellidos')
             SELECT Nombres, Apellidos FROM Personas;";
sqlite_query($db1,$ins01);

// Recupera el valor de autoincremento
$clave = sqlite_last_insert_rowid ($db1);
print "<BR>Tabla Personas: la clave asignada por autoincremento es  $clave <BR>";

// Confirma las actualizaciones
sqlite_query($db1,"COMMIT;");	

print "<BR>En la tabla Personas de la base de datos c13db1 hay " . 
       sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Personas;")) . 
	   " registros<BR>";
 
?>