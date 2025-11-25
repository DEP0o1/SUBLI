<?php

class LivroView{

   public function ExibirLivros($livro = new Livro()){
    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);

    if (!empty($livros)) {
        foreach($livros as $Livro){
            echo "
            <div class='livro' title='{$Livro->nm_livro}'>
                <img src='img/{$Livro->cd_livro}' alt='{$Livro->nm_livro}'/>
                <h2>{$Livro->nm_livro}</h2>
                <div class='favorito'>
                  <span class='material-symbols-outlined'>favorite</span>
                </div>
            ";

            foreach($Livro->autores as $autor){
                echo "<p>{$autor->nm_autor}</p>";
            }

            echo "
                <button class='btnRosa'>
                    <a href='LlivroLeitor.php?codigo=$Livro->cd_livro'>Ver Mais</a>
                </button>
            </div>";
        }
    }else
     {
        echo "
        <div class='nao-encontrado'>
            <h1>Nenhum livro foi encontrado</h1>
            <span class='material-symbols-outlined'>menu_book</span>
        </div>";
    }
}

   public function ExibirLivro($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);

    $Bcontroller = new BibliotecaController;
    $bibliotecas = $Bcontroller->ListarBibliotecas(new Biblioteca(null,null,null,[new Livro($livros[0]->cd_livro)]));

    foreach($livros as $Livro){


        echo "
        <div class='capaLivroGrande'>
            <img src='img/{$Livro->cd_livro}' alt=''>
        </div>

        <div class='pagLivro'>

          <div class='dadosLivro'>
            <h1>{$Livro->nm_livro}</h1>";

        foreach($Livro->autores as $autor){
            echo "
            <p>
              <span class='material-symbols-outlined'>man_4</span>
              Autor: {$autor->nm_autor}
            </p>";
        }

        echo "
            <p>
              <span class='material-symbols-outlined'>corporate_fare</span>
              Editora: {$Livro->editora->nm_editora}
            </p>

            <p>
              <span class='material-symbols-outlined'>language</span>
              Idioma: {$Livro->idioma->nm_idioma}
            </p>

            <p>
              <span class='material-symbols-outlined'>calendar_month</span>
              Ano de publicação: 2018
            </p>

            <section class='areaBtn'>
              <button class='btnRosa'>
                <span class='material-symbols-outlined'>favorite</span>
                Favoritar
              </button>

              <form class='btnEmprestimo' method='GET' action=''>
                <input type='hidden' name='codigo' value='{$Livro->cd_livro}'>
                <input type='hidden' name='enviado' value='true'>
                <button class='btnRosa' id='s' type='submit'>
                  <span class='material-symbols-outlined'>check</span>
                  Reservar
                </button>";
        
        if (isset($_REQUEST['enviado'])) {
            echo '';
        }

        echo "
              </form>
            </section>
            <span>
              <p>• Disponível em: ";
        
        foreach($bibliotecas as $Biblioteca){
            echo "<a href='Biblioteca.php' class='testeStrong' title='{$Biblioteca->nm_biblioteca}'><strong>{$Biblioteca->nm_biblioteca}</strong></a>";
        }

        echo "</p>
            </span>
          </div>

          <div class='sinopse'>
          <p>{$Livro->ds_sinopse}</p>
          </div>
        </div>
        ";
    }
}
    }
?>
