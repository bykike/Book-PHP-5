<?

if ($_GET['lang'] == "en")
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en';
if ($_GET['lang'] == "fr")
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr';


$titre_html = "WAMP5 Homepage";
$titre_conf = "Server Configuration";
$versa = "Apache version :";
$versp = "PHP version :";
$versm = "MySQL version :";
$titre_page = "Tools";
$phpinfo = "phpinfo( )";
$mysqlerror1 = "MySQL not launched or bad phpmyadmin config";
$mysqlerror2 = "phpmyadmin connexion not available";
$phpmyadmin = "PHPmyadmin 2.5.7";
$sqlitemanager = "SQLitemanager 0.9.5";
$titre_exemple = "Examples of PHP5's new features";
$txt_simplexml = "SimpleXML";
$txt_simplexml_file = "fichier XML";
$txt_poo = "Object programming";
$txt_sqlite = "SQLite";
$txt_projet = "Your projects";
$txt_lang = "version française";
$ch_lang = "fr";
$ouvre_www = "open 'www'";
$ouvre_dossier = "open";
$txt_no_projet = "No project yet.<br>To create a new one, jsut create a directory in 'www'.";




if (preg_match("/^fr/", $_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
$titre_html = "Accueil WAMP5";
$titre_conf = "Configuration Serveur";
$versa = "Version de Apache:";
$versp = "Version de PHP:";
$versm = "Version de MySQL:";
$mysqlerror1 = "MySQL n'est pas lanc&eacute; ou votre configuration phpmyadmin n'est pas bonne.";
$mysqlerror2 = "connexion de phpmyadmin non disponible";
$titre_page = "Outils";
$phpinfo = "phpinfo( )";
$phpmyadmin = "PHPmyadmin 2.5.7";
$sqlitemanager = "SQLitemanager 0.9.5";
$titre_exemple = "Exemples des nouveaut&eacute;s PHP5";
$txt_simplexml = "SimpleXML";
$txt_simplexml_file = "fichier XML";
$txt_poo = "Programmation Orient&eacute;e Objet";
$txt_sqlite = "SQLite";
$txt_projet = "Vos projets";
$txt_lang = "english version";
$ch_lang = "en";
$ouvre_www = "ouvrir 'www'";
$ouvre_dossier = "ouvrir";
$txt_no_projet = "Vous n'avez pas de projet pour le moment.<br> Pour en ajouter un nouveau, cr&eacute;ez simplement un r&eacute;pertoire dans 'www'.";
}

$apache_version = apache_get_version();
$aff_ap = explode ('PHP',$apache_version);
if (file_exists('phpmyadmin/config.inc.php'))
{
include ('phpmyadmin/config.inc.php');
if (@mysql_connect('localhost',$cfg['Servers']['1']['user'] ,$cfg['Servers']['1']['password']))
	$mysql_version =  mysql_get_server_info();
else
	$mysql_version = $mysqlerror1;
}
else
$mysql_version = $mysql_error2;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=$titre_html ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #000000;
}
a:link {
	color: #003366;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
	color: #003366;
}
a:visited {
	color: #003366;
	text-decoration: none;
}
a:visited:hover {
	color: #003366;
	text-decoration: underline;
}
.titre {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	text-decoration: underline;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="70%"  border="1" align="center" cellspacing="2" bordercolor="#000000" bgcolor="#EDEDED">
  <tr>
    <td bordercolor="#EDEDED" bgcolor="#EDEDED"> <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
        <tr> 
          <td width="50%"><img src="logo.gif"></td>
          <td width="50%" valign="bottom"><div align="right" class="text">Version 1.2 - <a href="?lang=<?=$ch_lang ?>"><?=$txt_lang ?></a></div></td>
        </tr>
        <tr> 
          <td colspan="2"><hr align="center" width="100%" size="1" noshade></td>
        </tr>
      </table>
    </td>
<tr>
    <td bordercolor="#EDEDED"> <p><span class="titre"><?=$titre_conf ?></span> </p>
      <table width="590" border="0" cellspacing="0" cellpadding="0">
        <tr valign="top" class="text">
          <td width="137"><?=$versa ?></td>
          <td width="453">
           <i><?=$aff_ap[0]; ?></i>
          </td>
        </tr>
        <tr valign="top" class="text">
          <td><?=$versp ?></td>
          <td><i><? echo phpversion(); ?></i></td>
        </tr>
        <tr valign="top" class="text">
          <td><?=$versm ?></td>
          <td>
            <i><?=$mysql_version ?></i>
          </td>
        </tr>
      </table>
<br>
      <p class="titre"><?=$titre_page ?> </p>
<p class="text"><a href="exemples/phpinfo.php"><?=$phpinfo  ?></a><br>
  <a href="phpmyadmin"><?=$phpmyadmin  ?></a><br>
  <a href="sqlitemanager"><?=$sqlitemanager  ?></a></p>
<p class="titre"><?=$titre_exemple  ?></p>
<p class="text"><a href="exemples/simplexml.php"><?=$txt_simplexml  ?></a> (<a href="exemples/test.xml"><?=$txt_simplexml_file  ?></a>)<br>
  <a href="exemples/objectmodel.php"><?=$txt_poo  ?></a><br>
  <a href="exemples/sqlite.php"><?=$txt_sqlite  ?></a></p>
  <p class="titre"><?=$txt_projet  ?></p>
<table class="text" border="0">



<?
	$list_ignore = array ('.','..','exemples','phpmyadmin','sqlitemanager');


	$handle=opendir(".");
	$i = 0;
	while ($file = readdir($handle)) 
	{
		if (is_dir($file) && !in_array($file,$list_ignore))
		{	
			$tab[$i]=$file;
			$i++;
		}
	}
	closedir($handle);

if ($i)
	foreach ($tab as $rep)
	{
		echo ('<tr><td width="100"><a href="'.$rep.'"><img src="dossier.gif" border="0"> '.$rep.'</a></td><td><i><a target="_blank" href="c:/wamp/www/'.$rep.' "><font color="#000000">'.$ouvre_dossier.'</font></a></i></td></tr>');
	} 
else
echo "<tr><td>$txt_no_projet</td></tr>";


?>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td><i><a target="_blank" href="c:/wamp/www/"><font color="#000000"><?=$ouvre_www ?></font></a></i></td><td>&nbsp;</td></tr>
</table>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="100%" ><hr align="center" width="100%" size="1" noshade></td>
        </tr>
        <tr>
          <td height="23" valign="top"><div align="right"><font size="1"><span class="text"><a href="http://www.wampserver.com" target="_blank">http://www.wampserver.com</a></span></font></div></td>
        </tr>
      </table>
      <div align="right"> <font size="1"></font> </div></td>
  </tr></table>
</body>
</html>
