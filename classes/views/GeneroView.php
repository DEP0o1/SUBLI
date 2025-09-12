<?php

    class GeneroView{
        public function SelectGeneros($genero = new Genero()){
            $controller =  new GeneroController;
            $generos = $controller ->ListarGeneros($genero);


            foreach ($generos as $genero){

                echo" 
                    <option value='{$genero->cd_genero}'>{$genero->nm_genero}</option>
                ";  
       
                
            }

            
        }
    }

?>