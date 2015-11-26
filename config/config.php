<?php

Config::set('siteName', 'My MVC Framework');
Config::set('languages', array('en','br'));

//Routes. Route name => method prefix
Config::set('routes', array(
	'default' 	=> '',
	'admin' 	=> 'admin_'
));

Config::set('defaultRoute', 'default');
Config::set('defaultLanguage', 'en');
Config::set('defaultController', 'pages');
Config::set('defaultAction', 'index');

Config::set('db.dsn', 'mysql:host=localhost;dbname=mvc');
Config::set('db.user', 'root');
Config::set('db.pass', 'root');
Config::set('db.opt', array(
	PDO::ATTR_PERSISTENT => true, 
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
));