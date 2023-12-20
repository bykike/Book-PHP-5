<HTML>
	<HEAD>
		<TITLE>Primera prueba de análisis de un documento XML</TITLE>
	</HEAD>
<?php
$archivo = "c1500.xml";
$fp = fopen($archivo, "r");
$datos = fread ($fp, filesize ($archivo));
fclose ($fp); 
print $datos;

function detecta_etiqueta_inicio($analiza,$etiqueta,$atributos){
	echo "<B>Etiqueta de apertura : </B>$etiqueta<BR>";
} 

function detecta_etiqueta_cierre($analiza,$etiqueta){
	echo "<B>Etiqueta de finalización : </B>$etiqueta<BR><BR>";
} 

function detecta_datos($analiza,$datos){
	echo "<B>Datos del elemento : </B>$datos<BR>";
} 

$analiza = xml_parser_create();
xml_set_element_handler($analiza,"detecta_etiqueta_inicio","detecta_etiqueta_cierre");
xml_set_character_data_handler($analiza,"detecta_datos");

echo "<BODY><H2>Análisis de un documento XML</H2><HR>";
if (!xml_parse($analiza,$datos,true)){
	echo "Error XML: ", xml_error_string(xml_get_error_code($analiza));
}
xml_parser_free($analiza);
?>
		<HR>
	</BODY> 
</HTML> 
