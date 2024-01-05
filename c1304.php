<?php
print "<B><U>Uso de las sentencias CREATE y DROP (ejemplo c1304.php)</U></B><BR><BR>";
// Ejemplos para CREATE TABLE
// CREATE INDEX
// CREATE TRIGGER
// DELETE
// DROP INDEX
// DROP TRIGGER
// DROP TABLE

// Apertura de una base de datos c13db1
$db1 = sqlite_open('c13db1', 0666, $sqliteerror);

// Elimina las tablas (por precaución)
@sqlite_query($db1, 'DROP TABLE Personas;');
@sqlite_query($db1, 'DROP TABLE Cursos;');
@sqlite_query($db1, 'DROP TABLE LogCursos;');

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
			
// Tabla Cursos			
$creat2 = "CREATE TABLE Cursos (
 			Id_Curso INTEGER PRIMARY KEY NOT NULL,
			Id_Person int(10) NOT NULL DEFAULT '0' , 
			Tema VARCHAR(32) NOT NULL DEFAULT ' ', 
			Horas int(10) NOT NULL DEFAULT '0',
			Texto text(65535) NOT NULL DEFAULT ' ');";
			
// Tabla LogCursos			
$creat3 = "CREATE TABLE LogCursos (
			Id_Curso int(10) NOT NULL DEFAULT '0' , 
			Horas_Actual int(10) NOT NULL DEFAULT '0',
			Horas_Anterior int(10) NOT NULL DEFAULT '0');";	
// Ejecución del query									
sqlite_query($db1,$creat1 . $creat2 . $creat3);

// Carga un valor en la tabla Personas
$ins01 = "INSERT INTO Personas values(NULL, 'José','Rodríguez','jrodriguez@hotmailx.com',0,' ');";
sqlite_query($db1,$ins01);

// Recupera el valor de autoincremento
$clave = sqlite_last_insert_rowid ($db1);

print "<BR>Tabla Personas: la clave asignada por autoincremento es  $clave <BR>";

// Carga un valor en la tabla Cursos
$ins02 = "INSERT INTO Cursos values(NULL," . $clave .",'Informática',40,' ')";
sqlite_query($db1,$ins02);

// Recupera el valor de autoincremento del curso
$clave = sqlite_last_insert_rowid ($db1);

// Creación de un índice sobre Apellidos y nombres			
$creai1 = "CREATE INDEX ind_Nombre_Personas ON Personas (Apellidos, Nombres);";

// Creación de un índice sobre Tema en la tabla Cursos	
$creai2 = "CREATE INDEX ind_Tema_Cursos ON Cursos (Tema);";
sqlite_query($db1,$creai1 . $creai2);	

// Creación de índices UNIQUE			
$creai1 = "CREATE UNIQUE INDEX ind_id_Personas ON Personas (id_Person);";
$creai2 = "CREATE UNIQUE INDEX ind_id_Cursos ON Cursos (id_Curso);";
sqlite_query($db1,$creai1 . $creai2);

// Creación de un TRIGGER 
// cada vez que se actualiza la tabla cursos (cuando Horas es > 20)
// se inserta una fila en LogCursos			
$creatr1 = "CREATE TRIGGER trig_update_cursos AFTER UPDATE ON CURSOS
			FOR EACH ROW WHEN New.Horas > 20
			BEGIN
				INSERT INTO LOGCURSOS VALUES (OLD.Id_Curso,New.Horas, OLD.Horas); 	
			END;"; 
sqlite_query($db1,$creatr1);

// Comprobación del TRIGGER
// Actualiza un registro de Curso, debería activar el TRIGGER
$upd01 = "UPDATE Cursos SET Horas = '35' WHERE id_Curso = $clave;";  
sqlite_query($db1,$upd01);	
		
// Confirma las actualizaciones
sqlite_query($db1,"COMMIT;");	

print "<BR>En la tabla Personas de la base de datos c13db1 hay " . 
       sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Personas;")) . 
	   " registros<BR>";
print "<BR>En la tabla Cursos de la base de datos c13db1 hay " . 
       sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM Cursos;")) . 
	   " registros<BR>";
print "<BR>En la tabla LogCursos de la base de datos c13db1 hay " . 
       sqlite_fetch_single(sqlite_query($db1, "SELECT COUNT(*) FROM LogCursos;")) . 
	   " registros<BR>";

// DELETE: Borrado de registros de una tabla con una condición
sqlite_query($db1,"DELETE FROM Cursos WHERE id_Curso > 1;");	

// Borrado de registros de una tabla sin condiciones
sqlite_query($db1,"DELETE FROM LogCursos;");	

// DROP TRIGGER: Eliminación de un desencadenante	   
sqlite_query($db1,"DROP TRIGGER trig_update_cursos;");	

// DROP INDEX: Eliminación de un índice	
sqlite_query($db1,"DROP INDEX ind_Nombre_Personas;");
 
// DROP TABLE: Eliminación de una tabla
@sqlite_query($db1, 'DROP TABLE Personas;');
 
?>