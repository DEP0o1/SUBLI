<?php

class BibliotecaView{

    public function ExibirBibliotecas($biblioteca = new Biblioteca){

        $controller = new BibliotecaController;
        $bibliotecas = $controller->ListarBibliotecas($biblioteca);

        foreach ($bibliotecas as $Biblioteca){

            echo" 
        <div class='biblioteca'>
          <img src='img/biblioteca1_1.jpg' alt='Biblioteca Mario Faria'>
          <h4>{$Biblioteca->nm_biblioteca}</h4>
          <p>{$Biblioteca->nm_endereco}</p>
          <p>2.4 km de você</p>
          <a href='Biblioteca.php?codigo=$Biblioteca->cd_biblioteca'>
            <button>Ver mais </button>
          </a>
          </div>";  
          // if (++$i > 3) break; NÃO FAZ ISSO ABOBADO
            
        }
    }

}

?>