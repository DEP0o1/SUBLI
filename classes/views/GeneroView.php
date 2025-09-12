<?php

    class GeneroView{
        public function SelectGeneros($genero = new Genero()){
            $controller =  new GeneroController;
            $generos = $controller ->ListarGeneros($genero);


            foreach ($generos as $genero){

                echo" 
                    <option value='{$genero->cd_generos}'>{$genero->nm_generos}</option>
                ";  
       
                
            }

            
        }
    }

?>