<?php

class BibliotecaView{

    public function ExibirBibliotecas($biblioteca = new Biblioteca){

        $controller = new BibliotecaController;
        $bibliotecas = $controller->ListarBibliotecas($biblioteca);

        


    }
}

?>