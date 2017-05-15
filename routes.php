<?php
include_once 'config/autoloader.php';
include_once 'config/database.php';

use Controller\Routes\Route;
use Front\Component\Component;



Route::when('/', function(){
    return View::render('main');
});

Route::when('/teste', 'TesteController@index');