<?php

class Model{
    function Hydrate($array){
        foreach($array as $chave=>$valor){
            if(property_exists($this, $chave)){
                $this->$chave = $valor;
            }
        }
    }
}