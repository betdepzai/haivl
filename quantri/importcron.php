<?php
/**
 * YouTube Auto Importer for phpMelody 1.7.x and higher
 * This is NOT a free plugin. You are not allowed to
 * give away this plugin or to sell it to anyone
 * without permission of melodymods.com
 *
 * To this mod the Melodymods.com "Open source licence for paid plugins" applies
 * See http://melodymods.com/support/licences.htm#opensource
 *
 * @author Dirk-jan Mollema - Melodymods.com
 * @copyright All rights reserved - February 2013
 * @package com.melodymods.youtube_autoimport
 * @version 1.0
 *
 * Contact: dirkjan@sanoweb.nl
 */
chdir(dirname(__FILE__));
ini_set('display_errors',1);
if(!isset($_SERVER['PHP_SELF']) || strpos($_SERVER['PHP_SELF'],'admin') === false){
	//Fake PHP SELF for modframework so it will load backend only modules
	$_SERVER['PHP_SELF'] = __FILE__;
}
require_once('../config.php');
define('WTF',true);
define('EOL',"\r\n");
require_once('functions.php');
require_once('../include/functions.php');
require_once('../include/user_functions.php');
if(!$modframework->is_installed('mod_youtube_autoimport')){
	exit('Mod not installed... Exiting');
}
//This can happen
if(!$modframework->is_loaded('mod_youtube_autoimport')){
	require_once(ABSPATH.'plugins/mod_youtube_autoimport.class.php');
}
@set_time_limit(0);
$importer = new mod_youtube_autoimport();
error_reporting(E_ALL ^ E_NOTICE);
$importer->run();
?>