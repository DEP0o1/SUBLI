<?php

class BibliotecaView{

    public function ExibirBibliotecas($biblioteca = new Biblioteca){

        $controller = new BibliotecaController;
        $bibliotecas = $controller->ListarBibliotecas($biblioteca);

        foreach ($bibliotecas as $Biblioteca){

        //     echo" 
        // <div class='biblioteca'>
        //   <img src='img/biblioteca1_1.jpg' alt='Biblioteca Mario Faria'>
        //   <h4>{$Biblioteca->nm_biblioteca}</h4>
        //   <p>{$Biblioteca->nm_endereco}</p>
        //   <p>2.4 km de você</p>
        //   <a href='Biblioteca.php?codigo=$Biblioteca->cd_biblioteca'>
        //     <button>Ver mais </button>
        //   </a>
        //   </div>";  

          echo "
          <div class='item-lista'>
          <div class='imagem-item-lista'>
            <img src='img/biblioteca1_1.jpg' alt=''>
          </div>
          <div class='conteudo-item-lista'>
            <h1>{$Biblioteca->nm_biblioteca}<span>
            • Fechado
            </span></h1>
            <div class='conteudo-item-lista-doador'>
              <span class='material-symbols-outlined'>
                location_on
              </span>
              <p>{$Biblioteca->nm_endereco}</p>
            </div>
            <a href='Biblioteca.php?codigo=$Biblioteca->cd_biblioteca'>
            <button class='btnRosa'>
              Ver Mais
            </button>
            </a>
          </div>
        </div>
          ";
          // if (++$i > 3) break; NÃO FAZ ISSO ABOBADO
            
        }
    }


    public function ExibirBibliotecasSelect($biblioteca = new Biblioteca){

        $controller = new BibliotecaController;
        $bibliotecas = $controller->ListarBibliotecas($biblioteca);

        foreach ($bibliotecas as $Biblioteca){

            echo" 
                <option value='{$Biblioteca->cd_biblioteca}'>{$Biblioteca->nm_biblioteca}</option>
            ";  
   
            
        }


    }

}

?>
