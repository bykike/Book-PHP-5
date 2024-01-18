<?php
print "<B><U>Simulaci�n de sobrecarga de acceso a propiedades (ejemplo c819.php)</U></B><BR><BR>";

// Definici�n de la clase Prueba
class Prueba {
 	private $matriz;
	// en el constructor se crea la matriz con un �nico elemento
	function __construct() {
		$this->matriz = array("Italia"=>100);
	}
	// cuando se accede a una propiedad que no existe, act�a
	// el m�todo __get(), en el argumento se recibe el nombre de la
	// supuesta propiedad
	
	// aqu� implementamos la funci�n para que reciba los valores de
	// claves de una matriz asociativa
	// �ste es s�lo un ejemplo para la aplicaci�n de m�todos __get()
	// y __set()
		function __get($nv){
		print "<BR>funci�n get:" . $nv ."<BR>";
		// la funci�n isset() verifica si la variable est� asignada
		if (isset($this->matriz[$nv]) ) {
			return $this->matriz[$nv];
		}
		else{
			return False;
		} 
	}
	// cuando se asigna un valor a una propiedad que no existe, act�a
	// el m�todo __set(), en el argumento se recibe el nombre de la
	// supuesta propiedad y el valor que se quiere asignar
	function __set($nv,$val){
		print "<BR>funci�n set:" . $nv . ", " . $val ."<BR>";
		$this->matriz[$nv] = $val;
	}
}	

// al generar el ejemplar de la clase Prueba
// se ejecuta autom�ticamente el constructor de la clase
// __construct() 
$objPrueba = new Prueba;

// la matriz s�lo tiene el elemento de clave Italia, por lo que
// Espa�a no existe
if (!$objPrueba->Espa�a) {
	print "el elemento no existe en la matriz.<BR> ";
}
// si intentamos obtener el valor de la pseudopropiedad Espa�a
// obtenemos False, porque a�n no le asignamos valor
$b = $objPrueba->Espa�a;
print "Retorno es :" . $b . "<BR>";

// Ahora se asigna el valor a la pseudo propiedad Espa�a,
// gracias a la implementaci�n del m�todo __set(), el valor
// se almacena en la propiedad matriz, en la clave Espa�a
$objPrueba->Espa�a = 150; 

// Al acceder ahora a la pseudo propiedad, obtenemos el valor
// desde el m�todo __get()
$b = $objPrueba->Espa�a;
print "Retorno es :" . $b . "<BR>";

if ($objPrueba->Espa�a) {
	print "el elemento existe en la matriz.<BR> ";
} 
 
?>