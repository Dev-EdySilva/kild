<?php

function url($url=''){
    if(!defined('BASE_URL')){
        throw new Exception('Contante BASE_URL não definida');
    }
    
    return BASE_URL.'/'.$url;
}

function asset($url=''){
    if(!defined('BASE_URL')){
        throw new Exception('Contante BASE_URL não definida');
    }
    
    return BASE_URL.'/public/'.$url;
}