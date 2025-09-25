<?php

class LivrosDoadosView {
    
    public function ExibirLivrosDoados($doacao = new Doacao()){
        $controller = new DoacaoController;
        $doacoes = $controller->ListarDoacoes($doacao);

        
        foreach($doacoes as $Doacao){
            echo 
            "
            <div class='livro'>
                <img src='img/$Doacao->cd_doacao'/>
                <h2>{$Doacao->livro->nm_livro}</h2>
            ";
            
            foreach($Doacao->livro->autores as $autor){
                echo 
                "
                <p>{$autor->nm_autor}</p>
                ";
            }
            echo
            "
                <button><a href='BsolicDoacao.php?codigo=$Doacao->cd_doacao'>Ver Doação</a></button>
            </div>
            ";
        }
        //var_dump($Livro->cd_livro);
        //var_dump($livro);
    }

    public function ExibirLivroDoacao($doacao = new Doacao()){
        $controller = new DoacaoController;
        $doacoes = $controller->ListarDoacoes($doacao);
        //var_dump($livro->nm_livro);


        echo "
        <img src='img/{$doacoes[0]->cd_doacao}' class='livroDoado'>
        <div class='infoLivroDoado'>
            <h1>{$doacoes[0]->livro->nm_livro}</h1>
        ";
        
        foreach($doacoes[0]->livro->autores as $autor){
            echo 
            "
            <p>AUTOR: {$autor->nm_autor}</p>
            ";
        }
        
        $leitorcontroller = new LeitorController();
        $leitor = $leitorcontroller->ListarLeitores(new Leitor(null,null,null,null,null,null,null,null,null,null,null,null,$doacoes[0]->cd_doacao));
        echo "
            <div class='nomeDoador'>


            <h1>{$leitor[0]->nm_leitor}</h1>

            <h1></h1>

            <div class='linha'></div>
            </div>
            
            <div class='botoes'>
            <a href='BcadastrarLivro.php?doacao={$doacoes[0]->cd_doacao}' class='aceitar'> Cadastrar </a>
            <form method='GET'>
            <input type='hidden' name='codigo' value='{$doacoes[0]->cd_doacao}'>
            <input type='hidden' name='recusado' value='true'>
            <button class='recusar' type='submit'> Recusar </button>
            </form>
            </div>
        </div>
        ";
    }



    public function Input_Livro_Doacao($doacao = new Doacao()){
        $controller = new DoacaoController;
        $doacoes = $controller->ListarDoacoes($doacao);

        if($doacao != new Doacao){

            echo "<div class='areaTituloLivro'>
            <label for='nm_livro' class='tituloForm'>Titulo:</label>
            <input name='nm_livro' type='text' class='inputForm' placeholder='Ex. O Pequeno Principe' value ='{$doacoes[0]->livro->nm_livro}' readonly>
        </div>";
        }

        else{
            echo "<div class='areaTituloLivro'>
            <label for='nm_livro' class='tituloForm'>Titulo:</label>
            <input name='nm_livro' type='text' class='inputForm' placeholder='Ex. O Pequeno Principe'>
        </div>";
        }

    }


    public function Input_Autor_Doacao($doacao = new Doacao()){
        $controller = new DoacaoController;
        $doacoes = $controller->ListarDoacoes($doacao);

        if($doacao != new Doacao){

            echo " <div>
            <label for='nm_autor' class='tituloForm'>Autor:</label>
            <input name='nm_autor' type='text' class='inputFormDeLado' placeholder='Ex. Antoine de Saint-Exupéry' value ='{$doacoes[0]->livro->autores[0]->nm_autor}' readonly>
        </div>";
        }

        else{
            echo " <div>
            <label for='nm_autor' class='tituloForm'>Autor:</label>
            <input name='nm_autor' type='text' class='inputFormDeLado' placeholder='Ex. Antoine de Saint-Exupéry' >
        </div>";
        }

    }
} 

?>