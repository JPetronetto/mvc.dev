<?php

require_once(ROOT.DS.'config'.DS.'config.php');

function __autoload($className)
{	
	$className = strtolower($className);
	$libPath = ROOT.DS.'lib'.DS.$className.'.class.php';
	$controllersPath = ROOT.DS.'controllers'.DS.str_replace('controller', '', $className).'Controller.php';
	$modelsPath = ROOT.DS.'models'.DS.$className.'.php';

	if (file_exists($libPath))
	{
		require_once($libPath);
	}
	elseif (file_exists($controllersPath))
	{
		require_once($controllersPath);
	}
	elseif (file_exists($modelsPath))
	{
		require_once($modelsPath);
	}
	else
	{
		throw new Exception("Failed to include class $className");
	}

}