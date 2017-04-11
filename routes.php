<?php
include_once 'config/autoloader.php';
include_once 'config/database.php';

use Controller\Routes\Route;
use Front\Component\Component;



Route::when('/', function(){
    return View::render('site.base', [
        'header' => 'app/view/site/header.component.php',
        'slider' => 'app/view/site/slider.component.php',
        'content' => 'app/view/site/home.view.php',
        'title' => '2D Media - Início'
    ]);
});

Route::when('/servicos', function(){
    return View::render('site.base_pages', [
        'header' => 'app/view/site/header.component.php',
        'content' => 'app/view/site/servicos.view.php',
        'title' => '2D Media - Serviços'
    ]);
});

Route::when('/orcamento', function(){
    return View::render('site.base_pages', [
        'header' => 'app/view/site/header.component.php',
        'content' => 'app/view/site/orcamento.view.php',
        'title' => '2D Media - Orçamento'
    ]);
});

Route::when('/institucional', function(){
    return View::render('site.base_pages', [
        'header' => 'app/view/site/header.component.php',
        'content' => 'app/view/site/institucional.view.php',
        'title' => '2D Media - Institucional'
    ]);
});

Route::when('/fale-conosco', function(){
    return View::render('site.base_pages', [
        'header' => 'app/view/site/header.component.php',
        'content' => 'app/view/site/fale-conosco.view.php',
        'title' => '2D Media - Fale Conosco'
    ]);
});

Route::when('/sobre', function(){
    return "SOBRE A EMPRESA";
});

Route::when("/teste", function(){
    $comp = new Component();
    $comp->registerComponent('headerSite', '<h1>HEADER</h1>', false);
    $comp->showHeaderSite();
});

Route::otherwise(function(){
    return "PÁGINA NÃO ENCONTRADA";
});

