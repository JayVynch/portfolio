<?php 

use App\Controllers\Home;
use Core\Request;
use Core\Routes;

$route = new Routes();

$route->get('/user',[ Home::class,'show']);

$route->get('/home',[ Home::class,'index']);