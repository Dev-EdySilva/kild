<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of URI
 *
 * @author edigleysson
 */
class URI {
    
    private static $uri;
    
    
    public static function getUri(){
        return self::$uri;
    }
    
    public static function setUri($uri){
        self::$uri = $uri;
    }
    
}
