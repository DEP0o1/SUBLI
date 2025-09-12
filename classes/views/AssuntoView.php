<?php

    class AssuntoView{
        public function SelectAssuntos($assunto = new Assunto()){
            $controller =  new AssuntoController;
            $assuntos = $controller ->ListarAssuntos($assunto);


            foreach ($assuntos as $assunto){

                echo" 
                    <option value='{$assunto->cd_assunto}'>{$assunto->nm_assunto}</option>
                ";  
       
                
            }

            
        }
    }

?>