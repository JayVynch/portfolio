<?php 

namespace App\Controllers;

use App\Model\User;
use Core\Controller;

/**
 * 
 */
class Home extends Controller
{

	public function index()
	{
		$name = 'stephanie';
		return $this->view('welcome',compact('name'));	
	}

	public function show()
	{
		$name = 'vynch';
		return $this->view('welcome',compact('name'));
	}
}