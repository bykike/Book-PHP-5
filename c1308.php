<?php
print "<B><U>Uso de las funciones de usuario (ejemplo c1308.php)</U></B><BR>";
// Ejemplos para sqlite_create_function()

// Definic�n de una funci�n de usuario 
function convertir ($val){
	if ($val < 1000) {
    	return '500';
	} elseif ($val < 3000) {
    	return '1500';
	}
	else {
		return '5000';
	}
}

$db1 =sqlite_open('c13db1', 0666,$sqliteerror);
// Apertura de una base de datos c13db1

// Elimina la tabla (por precauci�n)
@sqlite_query($db1, 'DROP TABLE Personas;');

// Tabla personas
$creat1 = "CREATE TABLE Personas (
 			Id_Person INTEGER PRIMARY KEY NOT NULL,
			Nombres VARCHAR(32) NOT NULL DEFAULT ' ' , 
			Apellidos VARCHAR(32) NOT NULL DEFAULT ' ', 
			Mail VARCHAR(32) NOT NULL DEFAULT ' ',
			Cr�ditos double(10,2) NOT NULL DEFAULT '0',
			Texto text(65535) NOT NULL DEFAULT ' ');";
// Creaci�n de la tabla			
sqlite_query($db1,$creat1);

// Registro de la funci�n en la base de datos
sqlite_create_function($db1,'convertir','convertir',1); 

// Carga valores en la tabla Personas en todos los campos ordenados
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Jos�','Rodr�guez','jrodriguez@hotmailx.com',400,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Jos�','P�rez','jperez@hotmailx.com',1000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Silvia','Fern�ndez','sfernandez@hotmailx.com',3500,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Jos�','Garc�a','jgarcia@hotmailx.com',9000,' ');");

// Consulta usando la funci�n de conversi�n
$res = sqlite_array_query($db1,"SELECT Apellidos, convertir(Cr�ditos) AS Cred FROM Personas;");
print_r ($res); 
// Respuesta
// Apellidos	Cred	
// Rodr�guez	500
// P�rez		1500
// Fern�ndez	5000
// Garc�a		5000			
?>