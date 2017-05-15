<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author edigleysson
 */



use DAO\DBConn;

class Auth {
    
    public static $user;
    
    /**
     * Checa se um usuário já está logado
     */
    public static function check(){
        return (isset($_SESSION['user']) && $_SESSION['auth']);
    }
    
    /**
     * Recupera informações de um usuário logado
     * 
     * @return object - stdClass do usuário logado
     */
    public static function user(){
        if(!self::$user){
           self::$user = $_SESSION['user'];
        }
        
        return self::$user;
    }
    
    
    /**
     * Autentica um usuário baseado nos parametros de consulta
     * 
     * @param array $params - Parametros de consulta
     * @return int - 1 caso seja autenticado ou 0 caso não seja
     */
    public static function authenticate(array $params){
        
        DAO::$conn = DBConn::get();
        
       
        $db = new DAO();
        $db->select('users');
        
        $counter=0;
        
        
        foreach($params as $param => $value){
            
            if($counter == 0){
                $db->where($param, DAO::equal($value));
            }else{
                $db->_and($param, DAO::equal($value));
            }
            
            
            $counter++;
        }
        
        $db->limit(0, 1);
        $r = $db->run();
        $total = $r->rowCount();
        
        if( $total ){
            $_SESSION['user'] = $r->fetchObject();
            $_SESSION['auth'] = true;
        }
        
        
        return $total;
       
        
    }
    
    public static function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
    }
    
}
