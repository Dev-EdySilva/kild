<?php

/**
* Processa requisiçoes AJAX 
* @author Edileysson Silva <edigleyssonsilva@gmail.com>
* @version 0.1
* 
*/
class Http{

    private $data; // array com os dados enviados via requisição

    private $httpObjects; // dados enviados via requisição no formato stdClass

    private $converted; // flag que verifica de os dados foram convertidos
    

    /**
    * Renderiza a requisição AJAX recebida por um arquivo PHP
    * @param boolean $std = flag que define se os dados da requisição serão convertidos para stdClass
    */
    public function renderAjaxRequest($std = false){
        $data = [];
        if(count($_POST) > 0){
            $data = json_encode($_POST);
        }else if(count($_GET)){
            $data = json_encode($_GET);
        }else{
            $data = file_get_contents('php://input');
        }
        
        
        $this->data = $data;
        if($std){
            $this->converted = true;
            $this->httpObjects = $this->toStd();
        }
        
        
    }
    
    /**
    * Retorna um item enviado pela requisição
    * @param string $name = index do parametro procurado
    */
    public function getItem($name){
        
        if($this->converted){
            if(isset($this->httpObjects->{$name})){
                return $this->httpObjects->{$name};
            }else{
                throw new Exception('Item não encontrado');
            }
        }else{
            throw new Exception('Os dados não foram onvertidos para objeto stdClass');
        }
        
    }
    
    /**
    * Converte os dados para stdClass
    */
    private function toStd(){
        return json_decode($this->data);
    }
    
    /**
    * Retorna os paramêtros passados via requisição, no formato array
    */
    public function getData(){
        return $this->data;
    }
    
}