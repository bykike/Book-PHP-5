<?php
if ($submit)
{
	require "cw0000.html";
}
else
{
	
	$serv = 'localhost:143';
	if (!$kk = imap_open("{localhost:143}INBOX","lalo","lalo"))  
	{
	 	require "cw0000.html";
		echo "login incorrecto";
	}
	else
	{
		session_start();
		print "inici� sesi�n";
		$a = imap_headers($kk);
		print "Headers:";
		print_r ($a);
		if (!$se = imap_ping ($kk))
		{print "<BR>Sesi�n inactiva<BR>";}
		else{ print "<BR>Sesi�n activa<BR>";}
		//$m = imap_mail("936362706@terra.es", "Tema", "Mensaje largo");
	    print " imap_mail: $m";
	}		
}	
?>