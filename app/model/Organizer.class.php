<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organizer
 *
 * @author edigleysson
 */
class Organizer extends Model{
    
    private $id;
    protected $name;
    protected $email_organizer;
    protected $description;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmailOrganizer() {
        return $this->emailOrganizer;
    }

    function getDescription() {
        return $this->description;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmailOrganizer($emailOrganizer) {
        $this->emailOrganizer = $emailOrganizer;
    }

    function setDescription($description) {
        $this->description = $description;
    }


    
    
}
