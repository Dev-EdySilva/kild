<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author edigleysson
 */
class View {
    
    /**
     * Local onde se encontram as views
     * 
     * @var string
     */
     static $path='app/view/';
     
     /**
      * Atributos da view
      * 
      * @var array
      */
     static $attr;
     
     
     
     public static function render($view='', $params=''){
         $view = str_replace('.', '/', $view);
         $URI_VIEW= self::$path.$view.'.view.php';
         
         
         include_once $URI_VIEW;
     }
    
}
