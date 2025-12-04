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
    

    $Doacao = $doacoes[0];

    $caminho_imagem_padrao = "img/doacao_padrao"; 

    $nome_livro = $Doacao->livro->nm_livro ?? 'Livro Desconhecido';
    $caminho_imagem_doacao = "img/doacao_{$nome_livro}"; 
    
    $src_imagem = file_exists($caminho_imagem_doacao) ? $caminho_imagem_doacao : $caminho_imagem_padrao;

    $caminho_imagem_padrao_leitor = "img/perfil_padrao"; 
    $email_leitor = $Doacao->leitor->cd_email ?? null; 

    $src_imagem_leitor = $caminho_imagem_padrao_leitor;
    
    if ($email_leitor) {
        $caminho_imagem_leitor = "img/perfil_{$email_leitor}";
        
        if (file_exists($caminho_imagem_leitor)) {
            $src_imagem_leitor = $caminho_imagem_leitor;
        }
    }

    $nome_doador = $Doacao->leitor->nm_leitor ?? 'Doador Desconhecido';
    
    echo "
        <img src='{$src_imagem}' alt='Capa do Livro: {$nome_livro}' class='capaLivroGrande' />

        <div class='divColuna'>
            <div class='dadosLivroDoado'>
                <h1>{$nome_livro}</h1>
    ";

    if (!empty($Doacao->livro->autores) && is_array($Doacao->livro->autores)) {
        foreach ($Doacao->livro->autores as $autor) {
            $nome_autor = $autor->nm_autor ?? 'Autor Desconhecido';
            echo "
                <div class='divRowItem'>
                    <p><span class='material-symbols-outlined'>man_4</span>Autor: {$nome_autor}</p>
                </div>
            ";
        }
    } else {
         echo "
            <div class='divRowItem'>
                <p><span class='material-symbols-outlined'>man_4</span>Autor: Não informado</p>
            </div>
        ";
    }

    echo "
            <div class='divRowItem'>
                <img src='{$src_imagem_leitor}' alt='Foto do Doador' class='miniPerfil'>
                <p>{$nome_doador} <span>(Doador)</span></p>
            </div>

            <div class='divRowItemBtn'>
                <a href='BcadastrarLivro.php?doacao={$Doacao->cd_doacao}' class='btnDoacao' style='align-items: center; display: flex;'><span class='material-symbols-outlined'>library_add</span>Cadastrar</a>
                <form method='GET' >
                    <input type='hidden' name='codigo' value='{$Doacao->cd_doacao}'>
                    <input type='hidden' name='recusado' value='true'>
                    <button class='btnDoacao' type='submit' style='align-items: center; display: flex;'><span class='material-symbols-outlined'>close_small</span>Recusar</button>
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
                <input name='nm_livro' type='text' autocomplete='off' class='inputCadastro' 
                  placeholder='Ex. O Pequeno Principe' 
                  value ='{$doacoes[0]->livro->nm_livro}'>
              </div>
            ";
    } else {
      echo "
              <div class='areaTituloLivro'>
                <label for='nm_livro' class='labelForm'>Titulo:</label>
                <input name='nm_livro' type='text' autocomplete='off' class='inputCadastro' 
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
                <div class='autocomplete-container'>
                    <input name='nm_autor' type='text' autocomplete='off' id='autorInput' class='inputCadastro' placeholder='Ex. Antoine de Saint-Exupéry'  value ='{$doacoes[0]->livro->autores[0]->nm_autor}'>
                    <div class='autocomplete-list' id='autorSugestoes'></div>
                </div>
            </div>
            <input type='hidden' name='cd_autor' value='{$doacoes[0]->livro->autores[0]->cd_autor}' />
           ";
    } else {
        
        echo "
        
            <div>
                <label for='nm_autor' class='labelForm'>Autor:</label>
                <div class='autocomplete-container'>
                    <input name='nm_autor' type='text' autocomplete='off' id='autorInput' class='inputCadastro' placeholder='Ex. Antoine de Saint-Exupéry'>
                    <div class='autocomplete-list' id='autorSugestoes'></div>
                </div>
            </div>
        ";
    }
}
}
