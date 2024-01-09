<?php
print "<B><U>Uso de las funciones de usuario (ejemplo c1309.php)</U></B><BR>";
// Ejemplos para sqlite_create_aggregate()

// Definición de una función de usuario 
function excesos (&$excesos, $val){
	if ($val > 5000) {
    	$excesos++;
	} 
	return TRUE;
}
function excesos_finalize (&$excesos){
	return $excesos;
}

$db1 =sqlite_open('c13db1', 0666,$sqliteerror);
// Apertura de una base de datos c13db1

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
// Creación de la tabla			
sqlite_query($db1,$creat1);

// Registro de la función en la base de datos
sqlite_create_aggregate($db1,'excesos','excesos', 'excesos_finalize'); 

// Carga valores en la tabla Personas en todos los campos ordenados
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','Rodríguez','jrodriguez@hotmailx.com',400,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','Pérez','jperez@hotmailx.com',8000,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'Silvia','Fernández','sfernandez@hotmailx.com',3500,' ');");
sqlite_query($db1,"INSERT INTO Personas values (NULL, 'José','García','jgarcia@hotmailx.com',9000,' ');");

// Consulta usando la función de conversión
$res = sqlite_array_query($db1,"SELECT excesos(Créditos) AS Cred FROM Personas;");
print_r ($res); 
// Respuesta
// Apellidos	Cred	
// Rodríguez	500
// Pérez		1500
// Fernández	5000
// García		5000			
?>