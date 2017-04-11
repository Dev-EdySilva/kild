<?php

/*
 * Modifiquei o código
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author edigleysson
 */
class User extends Model{
    
    private $id;
    protected $table = 'user';
    protected $name;
    protected $email;
    protected $password;
    protected $ativo;
            
    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

        
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }


    function getAtivo() {
        return $this->ativo;
    }

 
    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }




    
}
