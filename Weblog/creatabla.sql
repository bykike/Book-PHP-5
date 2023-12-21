 Base de datos weblogdb  ejecut�ndose en localhost

# phpMyAdmin SQL Dump
# version 2.5.7
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tiempo de generaci�n: 16-09-2004 a las 09:17:27
# Versi�n del servidor: 4.0.18
# Versi�n de PHP: 5.0.1
# 
# Base de datos : `weblogdb`
# 

# --------------------------------------------------------

#
# Estructura de tabla para la tabla `art�culo`
#

DROP TABLE IF EXISTS `art�culo`;
CREATE TABLE `art�culo` (
  `AId` bigint(20) unsigned NOT NULL auto_increment,
  `AT�tulo` text NOT NULL,
  `ATexto` text NOT NULL,
  `AFecha` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`AId`)
) TYPE=MyISAM AUTO_INCREMENT=52 ;



# --------------------------------------------------------

#
# Estructura de tabla para la tabla `comentario`
#

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `CId` bigint(20) unsigned NOT NULL auto_increment,
  `CAId` bigint(20) unsigned NOT NULL default '0',
  `CUsuario` text NOT NULL,
  `CTexto` text NOT NULL,
  `CFecha` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`CId`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;


