<?php
print "<B><U>Función include(ejemplo c413.php)</U></B><BR>";

  
$var1 = 8;
print "c413.php-> antes de la función include \$var1 es  $var1<BR><BR>";  

include 'c414.php';

print "c413.php-> después de la función include \$var1 es  $var1<BR><BR>";  
print "c413.php-> la variable definida en el cuerpo principal de c414.php \$var3 es  $var3<BR><BR>";  

?> 
 