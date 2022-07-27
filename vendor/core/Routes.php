<?php 

namespace Core;

use Core\Request;

class Routes
{
	protected $request;

	private $httpMethods = ['GET','POST',"DELETE",'PUT'];

	protected $uri;

	public function __construct()
	{
		$this->request = new Request;
	}

	public function get($route, $controllers)
	{

		$this->uri = (array) $controllers;

		if ($this->request->server['REQUEST_METHOD'] != 'GET') {
			return $this->badMethodCall();
		}

		$routeMaps = $this->parseRoute($route,$controllers);
		$url = $this->parseUrl();

		foreach ($routeMaps as $value){
			$routeMap[] = $value;
		}
		
		if ($routeMaps[2] == $url) {
			$controller = $routeMaps[0];

			$method = $routeMaps[1];

			if (class_exists($controller)) {
				if (method_exists($controller, $method)) {
					return call_user_func([new $controller,$method],$route);
				}
			}
		}
	}

	protected function badMethodCall()
	{
		header("{$this->request->server['SERVER_PROTOCOL']} 405 Method Not Allowed");
		
	}

	protected function classNotFound()
	{
		header("{$this->request->server['SERVER_PROTOCOL']} 404 Class does not exists");
	}

	protected function badClassMethodCall($method)
	{
		header("{$this->request->server['SERVER_PROTOCOL']} 404 {$method} Not found");
		
	}

	protected function parseRoute($route,$controller)
	{
		$controller[] = $route;

		return $controller;
	}

	protected function parseUrl()
	{
		$uri = $this->request->server['REQUEST_URI'];

		$url = substr($uri, 11);

		return $url;
	}
}