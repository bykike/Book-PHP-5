<?php
print "<B><U>Uso de las sentencias SELECT, CREATE VIEW y DROP VIEW(ejemplo c1306.php)</U></B><BR>";
// Ejemplos para INSERT
 
function imprimir ($db1, $sel1){
	print "<BR> Test de $sel1 <BR>";
	$r = sqlite_array_query ($db1, $sel1);
	foreach($r as $clave=>$valor){
		print   $valor[0] . "<BR>";
	}
}

// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666, $sqliteerror);

// Elimina la tabla (por precaución)
@sqlite_query($db1, 'DROP TABLE Personas;');

// Tabla personas
$creat1 = "CREATE TABLE Personas (
 			Id_Person INTEGER PRIMARY KEY NOT NULL,
			Nombres VARCHAR(32) NOT NULL DEFAULT ' ' , 
			Apellidos VARCHAR(32) NOT NULL DEFAULT ' ', 
			Mail VARCHAR(32) NOT NULL DEFAULT ' ',
			Créditos double(10,2) NOT NULL DEFAULT '0',
			Texto text(65535) NOT NULL DEFAULT ' ');";
			
sqlite_query($db1,$creat1);

// Carga valores en la tabla Personas en todos los campos ordenados
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','Rodríguez','jrodriguez@hotmailx.com',4000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','Pérez','jperez@hotmailx.com',5000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Carlos','García','cgarcia@hotmailx.com',6000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Silvia','Fernández','sfernandez@hotmailx.com',3000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','García','jgarcia@hotmailx.com',9000,' ');");

// Selecciona todas las columnas incondicionalmente
$sel1 = "SELECT * FROM Personas;"; 
imprimir($db1,$sel1);

// Selecciona algunas columnas y con condiciones
$sel1 = "SELECT Nombres, Apellidos FROM Personas WHERE id_Person > 1 AND id_Person < 3;";
imprimir($db1,$sel1);

// Creación de una vista con una SELECT
// Una vista se crea con cualquier SELECT
sqlite_query($db1,"CREATE VIEW vistaPersonas AS 
       SELECT Nombres, Apellidos FROM Personas WHERE id_Person > 1 AND id_Person < 3;");
// Luego se puede usar como si fuese una tabla
sqlite_query($db1,"SELECT * FROM vistaPersonas;");
// Y una vista se elimina con DROP VIEW
sqlite_query($db1,"DROP VIEW vistaPersonas;");

// Selecciona nombres distintos
$sel1 = "SELECT DISTINCT Nombres FROM Personas;";
imprimir($db1,$sel1);

// Selecciona nombres distintos y los lista ordenados
$sel1 = "SELECT DISTINCT Nombres FROM Personas ORDER BY Nombres;";
imprimir($db1,$sel1);

// Selecciona el promedio de un grupo de registros
$sel1 = "SELECT AVG(Créditos) FROM Personas GROUP BY Nombres HAVING Mail <>'';";
imprimir($db1,$sel1);

// Selecciona el máximo de un grupo de registros
$sel1 = "SELECT Max(Créditos) FROM Personas;";
imprimir($db1,$sel1);

// Cuenta los registros que cumplen una condición
$sel1 = "SELECT Count(*) FROM Personas WHERE Nombres = 'José';";
imprimir($db1,$sel1);

?>