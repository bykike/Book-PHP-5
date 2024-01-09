<?php
print "<B><U>Uso del modelo de objetos de SQLite (ejemplo c1310.php)</U></B><BR><BR>";
// Ejemplos para CREATE TABLE
// CREATE INDEX
// CREATE TRIGGER
// DELETE
// DROP INDEX
// DROP TRIGGER
// DROP TABLE

// Se crea el objeto base de datos c13db1
$db1 = new sqlite_db('c13db1', 0666, $sqliteerror);

// Elimina las tablas (por precaución)
// utilizando el método query()
@$db1->query('DROP TABLE Personas;');
@$db1->query('DROP TABLE Cursos;');
@$db1->query('DROP TABLE LogCursos;');

// Comienza la transacción
$db1->query("BEGIN"); 
 
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
$db1->query($creat1 . $creat2 . $creat3);

// Carga un valor en la tabla Personas
$ins01 = "INSERT INTO Personas values(NULL, 'José','Rodríguez','jrodriguez@hotmailx.com',0,' ');";
$db1->query($ins01);
// Carga un valor en la tabla Personas
$ins01 = "INSERT INTO Personas values(NULL, 'Juan','García','jgarcia@hotmailx.com',5655,' ');";
$db1->query($ins01);
// Recupera el valor de autoincremento
$clave = $db1->last_insert_rowid ();

print "<BR>Tabla Personas: la clave asignada por autoincremento es  $clave <BR>";

// Carga un valor en la tabla Cursos
$ins02 = "INSERT INTO Cursos values(NULL," . $clave .",'Informática',40,' ')";
$db1->query($ins02);

// Recupera el valor de autoincremento del curso
$clave = $db1->last_insert_rowid ();

// Creación de un índice sobre Apellidos y nombres			
$creai1 = "CREATE INDEX ind_Nombre_Personas ON Personas (Apellidos, Nombres);";

// Creación de un índice sobre Tema en la tabla Cursos	
$creai2 = "CREATE INDEX ind_Tema_Cursos ON Cursos (Tema);";
$db1->query($creai1 . $creai2);	

// Creación de índices UNIQUE			
$creai1 = "CREATE UNIQUE INDEX ind_id_Personas ON Personas (id_Person);";
$creai2 = "CREATE UNIQUE INDEX ind_id_Cursos ON Cursos (id_Curso);";
$db1->query($creai1 . $creai2);

// Creación de un TRIGGER 
// cada vez que se actualiza la tabla cursos (cuando Horas es > 20)
// se inserta una fila en LogCursos			
$creatr1 = "CREATE TRIGGER trig_update_cursos AFTER UPDATE ON CURSOS
			FOR EACH ROW WHEN New.Horas > 20
			BEGIN
				INSERT INTO LOGCURSOS VALUES (OLD.Id_Curso,New.Horas, OLD.Horas); 	
			END;"; 
$db1->query($creatr1);

// Comprobación del TRIGGER
// Actualiza un registro de Curso, debería activar el TRIGGER
$upd01 = "UPDATE Cursos SET Horas = '35' WHERE id_Curso = $clave;";  
$db1->query($upd01);	
		
// Confirma las actualizaciones
$db1->query("COMMIT;");	

// Se crea un objeto de clase sqlite_query ($res1) 
// y se realiza una iteración por el conjunto de resultados
print "<BR> Iteración por el objeto conjunto de resultados <BR>"; 
$res1 =$db1->query("SELECT * FROM Personas;");

// Se ejecuta mientras la fila sea válida 
while($res1->valid()){
	// obtiene la fila
	$fila = $res1->current();
	print $fila[0] . " ". $fila[1] . "  " . $fila[2] . "<BR>";
	// se mueve a la siguiente fila
	$res1->next();
}
 
$res1 = $db1->query("SELECT COUNT(*) FROM LogCursos;");	   
print "<BR>En la tabla LogCursos de la base de datos c13db1 hay " . 
       $res1->fetch_single() . 
	   " registros<BR>";

// DELETE: Borrado de registros de una tabla con una condición
$db1->query("DELETE FROM Cursos WHERE id_Curso > 1;");	

// Borrado de registros de una tabla sin condiciones
$db1->query("DELETE FROM LogCursos;");	

// DROP TRIGGER: Eliminación de un desencadenante	   
$db1->query("DROP TRIGGER trig_update_cursos;");	

// DROP INDEX: Eliminación de un índice	
$db1->query("DROP INDEX ind_Nombre_Personas;");
 
// DROP TABLE: Eliminación de una tabla
$db1->query('DROP TABLE Personas;');
?>