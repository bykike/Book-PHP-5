<?php
print "<B><U>Uso de las sentencias UPDATE (ejemplo c1307.php)</U></B><BR>";
// Ejemplos para UPDATE
// ejemplo de ON CONFLICT (OR)
 
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
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','Pérez','jperez@hotmailx.com',6000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Carlos','García','cgarcia@hotmailx.com',6000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Silvia','Fernández','sfernandez@hotmailx.com',3000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','García','jgarcia@hotmailx.com',9000,' ');");

// Modifica dos campos de una fila determinada según la condición WHERE
// Se incluye una cláusula ON CONFLICT (OR))
// que en la sentencia UPDATE se codifica con OR
sqlite_query($db1,"UPDATE OR FAIL Personas SET Nombres = 'Julián', Créditos = '3000' WHERE Mail = 'jperez@hotmailx.com';");

// Modifica una columna en toda la tabla (no hay condición WHERE)  
sqlite_query($db1,"UPDATE Personas SET Créditos = '4000';");

// Selecciona el máximo de un grupo de registros
$sel1 = "SELECT Max(Créditos) FROM Personas;";
imprimir($db1,$sel1);

?>