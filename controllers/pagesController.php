<?php

Class PagesController extends Controller {

	public function index()
	{
		$this->data['testContent'] = 'We are in PagesController';
	}

	public function view()
	{
		$params = App::getRouter()->getParams();

		if (isset($params[0])) 
		{
			$alias = strtolower($params[0]);
			$this->data['content'] = "Here will be a page with $alias alias.";
		}
	}
}