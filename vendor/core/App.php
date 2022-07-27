<?php 

namespace Core;

use Core\Request;
use Core\Routes;


/**
 * 	Main Core of the system
 */
class App
{
	protected $controller = 'Home';

	protected $method = 'index';

	protected $params = [];

	protected $router;

	public function __construct()
	{
		// $path = dirname(dirname(__Dir__)).'/app/controllers/';

		// $url = $this->parseUrl();


		// if (file_exists($path.$url[0].'php')) {
			
		// 	$this->controller = ucfirst($url[0]);

		// 	unset($url[0]);
		// }

		// require_once $path.$this->controller.".php";

		// $router = new Routes(new Request);

		// $this->controller = new $this->controller;

		// if (isset($url[1])) {
		// 	if(method_exists($this->controller, $url[1]) ){
		// 		$this->method = $url[1];
		// 		unset($url[1]);
		// 	} 

		// 	else{
		// 		return http_response_code(404);
		// 	}
		// }

		// $this->params = $url ? array_values($url) : [];

		// call_user_func_array([$this->controller,$this->method], $this->params);


	}

	protected function parseUrl()
	{
		if (isset($_GET['url'])) {
			return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}