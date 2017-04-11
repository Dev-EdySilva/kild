<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller\User;

/**
 * Description of UserController
 *
 * @author edigleysson
 */
class UserController {
    
    /*
     * Registra um novo usuário no banco de dados
     */
    public function create($data){
        $user = new User();
        $user->setName("Edy");
        $user->setEmail("edigleyssonsila@maa.com");
        $user->setPassword(sha1('123'));
        
        $user->save();
    }
    
}
