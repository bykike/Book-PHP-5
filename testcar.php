<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test Car Object</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<form action="testCar.php" method="post" name="form1" id="form1">
  Velocidad:  <input name="txtSpeed" type="text" id="txtSpeed" />
  Conductor:  <input name="txtDriver" type="text" id="txtDriver" />
  <input type="submit" name="Submit" value="Enviar" />
</form>
<p>
<?php
// Incluye la clase Car   
include_once('Car.php');
if(isset($_POST["txtSpeed"])){
  //Crea un ejemplar del objeto Car  
  $myCar = new Car;
  //Asigna la propiedad driver del objeto
  $myCar->setDriver($_POST["txtDriver"]);
  //Usa un método de la clase  
  $myCar->drive($_POST["txtSpeed"]);
}
?></p>
</body>
</html>
