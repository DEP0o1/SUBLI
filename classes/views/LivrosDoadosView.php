<?php

class LivrosDoadosView
{

public function ExibirLivrosDoados($doacao = new Doacao(), $ignorar = null)
{
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);

    $caminho_imagem_padrao = "img/doacao_padrao"; 

    if (empty($doacoes)) {
        echo " 
        <div class='nao-encontrado'>

        <span class='material-symbols-outlined'>
        auto_stories_off
        </span>
      <h2>
      Nenhuma Doação encontrada
      </h2>
        </div>    
        ";
        return; 
    }

    foreach ($doacoes as $Doacao) {
        if($ignorar == $Doacao->cd_doacao ){
            continue;
        }

        $caminho_imagem_doacao = "img/doacao_{$Doacao->livro->nm_livro}"; 

        $src_imagem = file_exists($caminho_imagem_doacao) ? $caminho_imagem_doacao : $caminho_imagem_padrao;

        echo "
            <div class='livro'>
                <img src='{$src_imagem}' alt='Livro doado: {$Doacao->livro->nm_livro}'/>
                <h2>{$Doacao->livro->nm_livro}</h2>
                <p>
                    Doador: {$Doacao->leitor->nm_leitor}
                </p>
                <button class='btnRosa'><a href='BsolicDoacao.php?codigo=$Doacao->cd_doacao'>Visualizar</a></button>
            </div>
        ";
    }
}

  public function ExibirLivroDoacao($doacao = new Doacao())
{
    $controller = new DoacaoController;
    $doacoes = $controller->ListarDoacoes($doacao);

    if (empty($doacoes)) {
        echo "<p>Nenhuma doação encontrada.</p>";
    }

    $Doacao = $doacoes[0];

    $caminho_imagem_padrao = "img/doacao_padrao"; 

    $caminho_imagem_doacao = "img/doacao_{$Doacao->livro->nm_livro}"; 
    
    $src_imagem = file_exists($caminho_imagem_doacao) ? $caminho_imagem_doacao : $caminho_imagem_padrao;

    echo "
        <img src='{$src_imagem}' alt='Capa do Livro: {$Doacao->livro->nm_livro}' class='capaLivroGrande' />

          <div class= 'divColuna'>
            <div class='dadosLivroDoado'>
                <h1>{$Doacao->livro->nm_livro}</h1>
    ";

    foreach ($Doacao->livro->autores as $autor) {
        echo "
                <div class='divRowItem'>
                    <p><span class='material-symbols-outlined'>man_4</span>Autor: {$autor->nm_autor}</p>
                </div>
            ";
    }

    echo "
            <div class='divRowItem'>
                <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt='Foto do Doador' class='miniPerfil'>
                <h2>{$Doacao->leitor->nm_leitor}</h2>
            </div>

            <div class='divRowItemBtn'>
                <a href='BcadastrarLivro.php?doacao={$Doacao->cd_doacao}' class='btnDoacao'><span class='material-symbols-outlined'>library_add</span></a>
                <form method='GET' >
                    <input type='hidden' name='codigo' value='{$Doacao->cd_doacao}'>
                    <input type='hidden' name='recusado' value='true'>
                    <button class='btnDoacao' type='submit'><span class='material-symbols-outlined'>close_small</span></button>
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
                <label for='nm_livro' class='labelForm'>Titulo:</label>
                <input name='nm_livro' type='text' class='inputCadastro' 
                  placeholder='Ex. O Pequeno Principe' 
                  value ='{$doacoes[0]->livro->nm_livro}' readonly>
              </div>
            ";
    } else {
      echo "
              <div class='areaTituloLivro'>
                <label for='nm_livro' class='labelForm'>Titulo:</label>
                <input name='nm_livro' type='text' class='inputCadastro' 
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
                <label for='nm_autor' class='labelForm'>Autor:</label>
                <input name='nm_autor' type='text' class='inputCadastro'  
                  placeholder='Ex. Antoine de Saint-Exupéry' 
                  value ='{$doacoes[0]->livro->autores[0]->nm_autor}' readonly>
              </div>
            ";
    } else {
      echo "
              <div>
                <label for='nm_autor' class='labelForm'>Autor:</label>
                <input name='nm_autor' type='text' class='inputCadastro'  
                  placeholder='Ex. Antoine de Saint-Exupéry'>
              </div>
            ";
    }
  }
}
