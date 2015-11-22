<?php

class Router {

	protected $uri;

	protected $controller;

	protected $action;

	protected $params;

	protected $route;

	protected $methodPrefix;

	protected $language;


	public function getUri()
	{
		return $this->uri;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

    public function getParams()
    {
        return $this->params;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getMethodPrefix()
    {
        return $this->methodPrefix;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function __construct($uri)
    {
    	$this->uri = urldecode(trim($uri, '/'));

    	// Get defaults
    	$routes = Config::get('routes');
    	$this->route = Config::get('defaultRoute');
    	$this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
    	$this->language = Config::get('defaultLanguage');
    	$this->controller = Config::get('defaultController');
    	$this->action = Config::get('defaultAction');

    	$uriParts = explode('?',$this->uri);

    	// Get path like /lng/controller/action/param1/param2/.../...
    	$path = $uriParts[0];

    	$pathParts = explode('/', $path);

    	if (count($pathParts)) 
    	{
    		// Get language at first element
    		if (in_array(current($pathParts), array_keys($routes))) 
	    	{
	    		$this->route = current($pathParts);
	    		$this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
	    		array_shift($pathParts);
	    	}
	    	elseif (in_array(current($pathParts), Config::get('languages'))) 
	    	{
	    		$this->language = current($pathParts);
	    		array_shift($pathParts);
	    	}

	    	// Get controller - next element of array
	    	if (current($pathParts)) 
	    	{
	    		$this->controller = current($pathParts);
	    		array_shift($pathParts);
	    	}
	    	// Get action
	    	if (current($pathParts)) 
	    	{
	    		$this->action = current($pathParts);
	    		array_shift($pathParts);
	    	}

	    	// Get parameters - all the rest
	    	$this->params = $pathParts;    
    	}

    }
}