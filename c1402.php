<?php
print "<BR><B><U> Conexi�n inicial con el servidor MySQL (ejemplo c1401.php) <BR></B></U>";
$con = mysql_connect("localhost","root")
	or die ("no se pudo establecer la conexi�n con el servidor MySQL");
echo "�OK Conexi�n establecida!\n";
// 
//if (mysql_create_db ("test8")) {
//   print ("Se cre� la base de datos\n");
//} else {
//   printf ("No se pudo crear la base de datos: %s\n", mysql_error ());
//}
// 
if (mysql_select_db ("test8")) {
   print ("Se seleccion� la base de datos\n");
} else {
   printf ("No se pudo seleccionar la base de datos: %s\n", mysql_error ());
}
$sql = "CREATE TABLE Personas (Id_Persona varchar(50) NOT NULL Primary Key, Nombres varchar(30) NOT NULL, Apellidos varchar(30) NOT NULL)";
//if (mysql_query($sql)){
//  print ("Se cre� la tabla en la base de datos\n");
//} else {
//   printf ("No se pudo crear la tabla en la base de datos: %s\n", mysql_error ());
//}
$sql = "INSERT INTO Personas VALUES(2, 'Jos�', 'Rodr�guez')";
//if (mysql_query($sql)){
// print ("Se insert� el registro en la tabla de la base de datos\n");
//} else {
//   printf ("No se pudo insertar el registro en la tabla de la base de datos: %s\n", mysql_error ());
//}
$sql = "SELECT * FROM Personas";
if ($res = mysql_query($sql)){
  print ("Se realiz� el select de la tabla de la base de datos\n");
} else {
   printf ("No se pudo leer la tabla de la base de datos: %s\n", mysql_error ());
}
 
while ($row=mysql_fetch_array($res)){
	print $row["Nombres"] . "<BR>";
	print $row["Apellidos"] . "<BR>";
}

?>