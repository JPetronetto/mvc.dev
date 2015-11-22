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