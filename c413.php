<?php
print "<B><U>Funci�n include(ejemplo c413.php)</U></B><BR>";

  
$var1 = 8;
print "c413.php-> antes de la funci�n include \$var1 es  $var1<BR><BR>";  

include 'c414.php';

print "c413.php-> despu�s de la funci�n include \$var1 es  $var1<BR><BR>";  
print "c413.php-> la variable definida en el cuerpo principal de c414.php \$var3 es  $var3<BR><BR>";  

?> 
 