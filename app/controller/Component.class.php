<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Component
 *
 * @author edigleysson
 */

namespace Front\Component;

class Component {
    
    static $components;
    
    public function registerComponent($name, $content, $require=true){
        self::$components[strtolower($name)] = [
            'content' => $content,
            'require' => $require
        ];
    }
    
    public function __call($name, $arguments) {
            $name = strtolower($name);
            $keys = array_keys(self::$components);
            $index = str_replace('show', '', $name);
            if(!in_array($index, $keys)){
                throw new \Exception("Componente ". $index.' não definido');
            }
            
            
            $component = self::$components[$index];
            
            if(!$component['require']){
                 echo $component['content'];
                 return;
            }
            
            require_once $component['content'];
            

    }
    
}
