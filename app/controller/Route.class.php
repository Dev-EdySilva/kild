<?php


/**
 * Permite o trabalho de rotas baseado no ngRoute presente no AngularJS
 * 
 * @version 0.3
 * @author Edigleysson <edigleyssonsilva@gmail.com>
 * @copyright (c) 2017, Edigleysson Silva
 * 
 * 0.2 => Adicionada a funcinoalidade de passagem de parâmetros na URL
 * 0.3 => Adicionada a funcionalidade de roteamento com passagem de closure em forma de string da forma (ClassName@methodName) baseada em Laravel
 */

namespace Controller\Routes;

class Route {
    
    /**
     * Lista de rotas definidas
     * 
     * @var array
     */
    static $routes=[];
    
    /**
     * Rota default caso não seja encontrada uma especificada
     * 
     * @var string
     */
    static $ohter=null;
    
    /**
     * Define um formato de passagem de parâmetros em url
     */
    private static $regex_replace='/(\{\w{1,}\})/';
    
    private static $regex='/(\_separator\_\w{1,}\_separator\_)/';

    /**
     * Define uma rota
     * 
     * @param string $route Descrição da rota
     * @param closure $call_func Função a ser executar quando chamar a rota
     * @return void
     */
    public static function when($route, $call_func){
        
        // verificando se é uma URL com parâmetros
        if(preg_match(self::$regex_replace, $route, $matches) ){
            $route = str_replace('{', '_separator_', str_replace('}', '_separator_', $route));
            self::$routes[$route] = $call_func;
                    
            return;
        }
        
        self::$routes[$route] = $call_func;
    }
    
    /**
     * Define uma rota padrão
     */
    public static function otherwise($closure){
        if(is_callable($closure)){
            self::$ohter=$closure;
        }else{
            throw new \Exception("Esperada uma função no closure");
        }
    }
    

    
    /**
     * 
     */
    public static function run($url){
        $keys = array_keys(self::$routes);
       
        if($url != '/' && $url[strlen($url)-1]=='/'){
            $url = substr($url, 0, strlen($url)-1);
        }
       
        if(in_array($url, $keys)){

            $clos = self::$routes[$url];

            if( is_string($clos) ){
                $aux = explode('@', $clos);
                $obj = new $aux[0];
                return $obj->{$aux[1]}();
            }

            // executando função
            return call_user_func(self::$routes[$url]);
        }else{
             
            //verificando se é com parâmetros
            foreach( $keys as $r ){
                if(preg_match(self::$regex, $r)){
                   
                   $aux = explode('/', $r);
                   array_pop($aux);
                   
                   $c1 = implode('/', $aux).'/';
                   
                   $aux = explode('/', $url);
                   array_pop($aux);
                   
                   $c2 = implode('/', $aux).'/';
                   
                   
                   if($c1 === $c2){
                        $checkURL = URI;
                        $value_param = $checkURL[count($checkURL)-1];
                        return call_user_func(self::$routes[$r], $value_param);
                   }
                    
                }
                
            }
            
            
                if(self::$ohter){
                    return call_user_func(self::$ohter);
                }else{
                    throw new \Exception('Erro 404');
                }          
            
            
        }
    }
    
}
