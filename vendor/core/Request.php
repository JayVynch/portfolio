<?php 

namespace Core;

use Core\Contracts\RequestContract;

/**
 * 
 */
class Request implements RequestContract
{
	public $server;

	private $methods = ['GET','POST',"DELETE",'PUT'];
	
	public function __construct()
	{
		$this->bootStrapServer();
	}

	protected function bootStrapServer()
	{
		foreach ($_SERVER as $key => $value) {
			$this->server[$key] = $value; 
		}
	}

	public function getBody()
	{
		if ($this->server['REQUEST_METHOD'] == 'GET') {
			return;
		}

		if ($this->server['REQUEST_METHOD'] == 'POST') {
			
			$body = array();
	      	foreach($_POST as $key => $value){
	        	$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
	      	}

	      	return $body;
		}

		if ($this->server['REQUEST_METHOD'] == 'PUT') {
			
			$body = array();
	      	foreach($_POST as $key => $value){
	        	$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
	      	}

	      	return $body;
		}
		
	}
}