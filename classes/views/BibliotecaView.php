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
            <img src='img/biblioteca{$Biblioteca->cd_biblioteca}_1' alt=''>
          </div>
          <div class='conteudo-item-lista'>
            <h1>{$Biblioteca->nm_biblioteca}<span>
            • Fechado
            </span></h1>
            <div class='conteudo-item-lista-biblioteca'>
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


    public function ExibirBiblioteca($biblioteca = new Biblioteca){

      $controller = new BibliotecaController;
      $bibliotecas = $controller->ListarBibliotecas($biblioteca);

      foreach ($bibliotecas as $Biblioteca){

echo "
        <h1 class='textoMeio'>{$Biblioteca->nm_biblioteca}</h1>
        <section class='bibliotecas'>
          <div class='bibliotecaPerfil'>
            <div class='bibliotecaFotos'>
              <img id='main-image' src='img/biblioteca{$Biblioteca->cd_biblioteca}_1' alt='Foto Principal da Biblioteca'>

              <div id='thumbnails' class='carrosselBiblioteca'>
                <img class='thumbnail active' src='img/biblioteca{$Biblioteca->cd_biblioteca}_1' alt='Miniatura 1'>
                <img class='thumbnail' src='img/biblioteca{$Biblioteca->cd_biblioteca}_2' alt='Miniatura 2'>
                <img class='thumbnail' src='img/biblioteca{$Biblioteca->cd_biblioteca}_3' alt='Miniatura 3'>
              </div>
            </div>

            <div class='informacoesBiblioteca'>

              <div class='informacaoBiblioteca'>
            <div class='informacaoBibliotecaTitulo'>
              <span class='material-symbols-outlined'>
                nest_clock_farsight_analog
              </span>
              <h1>Horario de funcionamento</h1>
            </div>

            <p>Segunda a Sexta 11:00-15:00 18:00-00:00 <br>
              Sábado a Domingo 11:00-15:30 18:00-00:00
            </p>
          </div>

          <div class='informacaoBiblioteca'>
            <div class='informacaoBibliotecaTitulo'>
              <span class='material-symbols-outlined'>
                call
              </span>
              <h1>Telefone</h1>
            </div>

            <p>+55 13 9913-4754</p>
          </div>

          <div class='informacaoBiblioteca'>
            <div class='informacaoBibliotecaTitulo'>
              <span class='material-symbols-outlined'>
                location_on
              </span>
              <h1>Endereço</h1>
            </div>

            <p>{$Biblioteca->nm_endereco}</p>
            <section class='areaMapaBiblioteca'>
              <div class='mapa' id='map'>
                <div id='carregando'>
                  <div class='spinner'></div>
                  <p>Carregando mapa...</p>
                </div>
              </div>
            </section>
    </section>
        ";
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
