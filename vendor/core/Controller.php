<?php 

namespace Core;

/**
 * 
 */
class Controller
{
	
	public function model($model = '')
	{

		require_once dirname(dirname(__Dir__))."/app/models/".$model.".php";

		return new $model();
	}

	public function view($view,$data=null)
	{
		require_once dirname(dirname(__Dir__))."/views/".$view.".php";
	}
}