<?php

class LivrosDoadosView
{

  public function ExibirLivrosDoados($doacao = new Doacao())
  {
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);


    foreach ($doacoes as $Doacao) {

      echo "
                      <div class='livro'>
                         <img src='img/$Doacao->cd_doacao' alt='$Doacao->cd_doacao'/>
                        <h2>{$Doacao->livro->nm_livro}</h2>
                        <p>
              Doador: {$Doacao->leitor->nm_leitor}
          </p>
                        <button><a href='BcadastrarEmprestimo.php?codigo=''>Visualizar</a></button>
                    </div>
            ";
    }
  }

  public function ExibirLivroDoacao($doacao = new Doacao())
  {
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);

    echo "
            <div class='fotoMenordoacao'>
              <img src='img/{$doacoes[0]->cd_doacao}' alt='' class='imgLivroLista' />
              <img src='img/{$doacoes[0]->cd_doacao}' alt='' class='imgLivroLista' />
              <img src='img/{$doacoes[0]->cd_doacao}' alt='' class='imgLivroLista' />
              <img src='img/{$doacoes[0]->cd_doacao}' alt='' class='imgLivroLista' />
            </div>

            <img src='img/{$doacoes[0]->cd_doacao}' alt='' class='capaLivroGrande' />
          </div>

          <section class='divColuna'>
            <div class='dadosLivroDoado'>
              <h1>{$doacoes[0]->livro->nm_livro}</h1>
        ";

    foreach ($doacoes[0]->livro->autores as $autor) {
      echo "
              <div class='divRowItem'>
                <p><span class='material-symbols-outlined'>man_4</span>Autor: {$autor->nm_autor}</p>
              </div>
            ";
    }


    echo "
            <div class='divRowItem'>
              <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt='' class='miniPerfil'>
              <h2>{$doacoes[0]->leitor->nm_leitor}</h2>
            </div>

            <div class='divRowItemBtn'>
              <a href='BcadastrarLivro.php?doacao={$doacoes[0]->cd_doacao}' class='btnRosa'>Cadastrar</a>
              <form method='GET'>
                <input type='hidden' name='codigo' value='{$doacoes[0]->cd_doacao}'>
                <input type='hidden' name='recusado' value='true'>
                <button class='btnRosa' type='submit'>Recusar</button>
              </form>
            </div>
          </div>
        ";
  }

  public function Input_Livro_Doacao($doacao = new Doacao())
  {
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);

    if ($doacao != new Doacao) {
      echo "
              <div class='areaTituloLivro'>
                <label for='nm_livro' class='tituloForm'>Titulo:</label>
                <input name='nm_livro' type='text' class='inputForm' 
                  placeholder='Ex. O Pequeno Principe' 
                  value ='{$doacoes[0]->livro->nm_livro}' readonly>
              </div>
            ";
    } else {
      echo "
              <div class='areaTituloLivro'>
                <label for='nm_livro' class='tituloForm'>Titulo:</label>
                <input name='nm_livro' type='text' class='inputForm' 
                  placeholder='Ex. O Pequeno Principe'>
              </div>
            ";
    }
  }

  public function Input_Autor_Doacao($doacao = new Doacao())
  {
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);

    if ($doacao != new Doacao) {
      echo "
              <div>
                <label for='nm_autor' class='tituloForm'>Autor:</label>
                <input name='nm_autor' type='text' class='inputFormDeLado' 
                  placeholder='Ex. Antoine de Saint-Exupéry' 
                  value ='{$doacoes[0]->livro->autores[0]->nm_autor}' readonly>
              </div>
            ";
    } else {
      echo "
              <div>
                <label for='nm_autor' class='tituloForm'>Autor:</label>
                <input name='nm_autor' type='text' class='inputFormDeLado' 
                  placeholder='Ex. Antoine de Saint-Exupéry'>
              </div>
            ";
    }
  }
}
