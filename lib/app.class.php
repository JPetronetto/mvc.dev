<?php

Class App {

	protected static $router;

    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        Lang::load(self::$router->getLanguage());

        $controllerClass = ucfirst(self::$router->getController().'Controller');
        $controllerMethod = self::$router->getMethodPrefix().self::$router->getAction();
        
        // Instancing the controller
        $controllerObject = new $controllerClass();

        if (method_exists($controllerObject, $controllerMethod)) 
        {
        	// Controller's may return a view
            $viewPath = $controllerObject->$controllerMethod();
            $viewObject = new View($controllerObject->getData(), $viewPath);
            $content = $viewObject->render();
        }
        else
        {
        	throw new Exception("Method $controllerMethod of class $controllerClass was not found.");	
        }

        $layout = self::$router->getRoute();
        $layoutPath = VIEWS_PATH.DS.$layout.'.html';
        $layoutViewObj = new View(compact('content'), $layoutPath);
        echo $layoutViewObj->render();
    }

}