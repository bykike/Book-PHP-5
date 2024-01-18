<?php
print "<B>Función include_once (ejemplo c416.php)</B><BR><BR>";
 
$var1 = 1; 
// primera llamada a c417.php
print "primera include_once<BR>";
include_once 'c417.php';

// segunda llamada a c417.php
$var1++;
print "segunda include_once<BR>";
include_once 'c417.php';

$var1 = 1; 
print "primera include<BR>";
// primera llamada a c417.php
include 'c417.php';

// segunda llamada a c417.php
print "segunda include<BR>";
$var1++;
include 'c417.php';
?> 
 