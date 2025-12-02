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

            <section class='areaBtn' style='flex-direction: column;'>
              <form class='btnEmprestimo' method='GET' action=''>
              <select style='width: 100%;margin-bottom: var(--gap);' name='B' id='' class='btnRosa'>Escolha a biblioteca
              ";
              foreach($bibliotecas as $Biblioteca){
                echo "<option value='{$Biblioteca->cd_biblioteca}'>{$Biblioteca->nm_biblioteca}</option>";
              }
              echo "
              </select>
              <div style='display: flex; gap: 10px;'>
              <button class='btnRosa'>
                <span class='material-symbols-outlined'>favorite</span>
                Favoritar
              </button>


              
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
            </div>
            </section>
            <span>
              <p>• Disponível em: ";
        
        foreach($bibliotecas as $Biblioteca){
            echo "<a href='Biblioteca.php?codigo={$Biblioteca->cd_biblioteca}' class='testeStrong' title='{$Biblioteca->nm_biblioteca}'><strong>{$Biblioteca->nm_biblioteca}</strong></a>";
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


      public function ExibirLivrosEmprestimo($livro = new Livro()){
    $controller = new LivroController;
    $livros = $controller->ListarLivrosEmprestimo($livro);

    if (!empty($livros)) {
        foreach($livros as $Livro){
            echo "
            <div class='livro' title='{$Livro->nm_livro}'>
                <img src='img/{$Livro->cd_livro}' alt='{$Livro->nm_livro}'/>
                <h2>{$Livro->nm_livro}</h2>
            ";
            
              $emprestimo_controller = new EmprestimoController();
              $emprestimo = $emprestimo_controller->ListarEmprestimos(new Emprestimo($Livro->cd_emprestimo));
                echo "<p>{$emprestimo[0]->leitor->nm_leitor}</p>";
            

            echo "
            <form style=' margin-top: auto'; width: 100% ;>
             <input type='hidden' name='registrado' value=$Livro->cd_emprestimo>
               <input type='hidden' name='c' value= {$emprestimo[0]->leitor->cd_email}>
                <button type='submit' class='btnRosa' style'='font-size: medium; font-family: 'Inter''>
                   Registrar Devolução

                </button>
                </form>
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



      public function ExibirLivroBi($livro = new Livro(),$cd_biblioteca){
           $controller = new LivroController;
    $livros = $controller->ListarLivrosBi($livro);

    $Bcontroller = new BibliotecaController;
    $bibliotecas = $Bcontroller->ListarBibliotecas(new Biblioteca(null,null,null,[new Livro($livros[0]->cd_livro)]));
      $exemplarcontroller = new ExemplarController();
      $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($livros[0]->cd_livro, $cd_biblioteca));

    foreach($livros as $Livro){
echo"
          <div class='capaLivroGrande'>
        <img src='img/{$Livro->cd_livro}' alt=''>
      </div>
        <div class='pagLivro'>
        <div class='dadosLivro'>
          <h1>{$Livro->nm_livro}</h1>
          ";
            foreach($Livro->autores as $autor){
          echo"
          <p>
            <span class='material-symbols-outlined'>man_4</span>
            Autor: {$autor->nm_autor}
          </p>";
            }

            echo "
            <p>
            <span class='material-symbols-outlined'>category</span>
            Gênero: {$Livro->generos[0]->nm_genero}
          </p>
          <p>
            <span class='material-symbols-outlined'>article</span>
            Assunto: {$Livro->assuntos[0]->nm_assunto}
          </p>
          <p>
            <span class='material-symbols-outlined'>book_5</span>
            Coleção: {$Livro->colecao->nm_colecao}
          </p>
          <p>
            <span class='material-symbols-outlined'>corporate_fare</span>
            Editora: {$Livro->editora->nm_editora}
          </p>
          <p>
            <span class='material-symbols-outlined'>language</span>
            Idioma: {$Livro->idioma->nm_idioma}
          </p>

          <section class='areaBtnLivro'>
     ";
            if (isset($_REQUEST['enviado'])) {
            $exemplarcontroller = new ExemplarController();
            $Exemplar = $exemplarcontroller->AdicionarExemplar(new Exemplar($Livro->cd_livro, $cd_biblioteca));
            
            $exemplarcontroller = new ExemplarController();
            $exemplar = $exemplarcontroller->ContarExemplares(new Exemplar($Livro->cd_livro, $cd_biblioteca));
          }
          echo"
              Quantidade de Exemplares: {$exemplar[0]['COUNT(*)']}
        

            <form class='btnEmprestimo' method='GET' action=''>
              <input type='hidden' name='codigo' value='{$Livro->cd_livro}'>
              <input type='hidden' name='enviado' value='true'>
              <button class='btnRosa' id='s' type='submit'>
                <span class='material-symbols-outlined'>check</span>
                Adicionar Exemplar
              </button>
            </form>

          
          </section>
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
