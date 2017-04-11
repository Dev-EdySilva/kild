<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author edigleysson
 */

use DAO\DBConn;

abstract class Model {
    
    protected $vars;
    private $entity;

    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    // persiste um objeto no banco de dados
     public function save(){
        $this->setConfig();
         
        
         $sql = "INSERT INTO {$this->entity} ({fields}) VALUES ({values})";
         
         $clean = self::cleanFields($this->vars);
         
        
         $fields = $clean['fields'];
         $values = self::valuesToSave($clean['values']);

         $sql = str_replace('{fields}', implode(', ', $fields), $sql);
         $sql = str_replace('{values}', implode(', ', $values), $sql);

         $conn = $this->startConn();
         $stmt = $conn->prepare($sql);
         
         if($stmt->execute()){
            $this->setId($conn->lastInsertId());
            return true;
         }else{
             return $sql;
         }
         
        
     }
     
     
     // lista todos os objetos do banco
     public function all(){
         $this->setConfig();
         
         $sql = "SELECT * FROM {$this->entity}";
         
         $conn = $this->startConn();
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         
         $all = [];
         
         while($row = $stmt->fetchObject()){
             $all[]=$row;
         }
         
         return $all;
         
     }
     
     
     // atualiza informaçeõs de um objeto no banco
     public function update($id_field='id'){
         $this->setConfig();
         $sql = "UPDATE {$this->entity} SET {fields} WHERE {where}";
         
         $clean = self::cleanFields($this->vars);
         
        
         $fields = $clean['fields'];
         $values = self::valuesToSave($clean['values']);
         $_fields = [];
         for($i=0; $i<count($fields); $i++){
             if(!is_null($values[$i]) && $values[$i] != 'NULL'){
                 $_fields[] = $fields[$i]."={$values[$i]}";
             }
         }
         
         $_fields = implode(', ', $_fields);
         
         $sql = str_replace('{fields}', $_fields, $sql);
         $sql = str_replace('{where}', "{$id_field} = '{$this->getId()}'", $sql);
         
         $conn = $this->startConn();
         $stmt = $conn->prepare($sql);
         
         if($stmt->execute()){
             return true;
         }
         
         echo $sql;
         return false;
         
     }
     
     
     
     public function setConfig(){
          $this->entity = (isset($this->table)) ? $this->table : strtolower(get_class($this)).'s';
         $this->vars = get_object_vars($this);
     }
     
     private function startConn(){
         return DBConn::get();
     }
     
     
     private static function cleanFields(array $params){
         $fields = [];
         $values = [];
           foreach($params as $key => $value){
               if($key != 'vars' && $key != 'entity' && $key != 'table'){
                   $fields[] = $key;
                   $values[] = $value;
               }
           } // endforeach
           
           return [
               'fields' => $fields,
               'values' => $values
           ];
     }
     
     
     private static function valuesToSave(array $values){
            $val=[];
            foreach($values as $value){
                if(is_null($value)){
                    $val[]= "NULL";
                }else{
                    $val[] = "'$value'";
                }
            }
            
            return $val;
     }
     
     
     
     
}
