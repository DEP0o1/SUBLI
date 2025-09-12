<?php

class LivrosDoadosView {
    
    public function ExibirLivrosDoados($livro = new Livro()){
        $controller = new LivroController;
        $livros = $controller->ListarLivros($livro);

        
        foreach($livros as $Livro){
            echo 
            "
            <div class='livro'>
                <img src='img/$Livro->cd_livro'/>
                <h2>{$Livro->nm_livro}</h2>
            ";
            
            foreach($Livro->autores as $autor){
                echo 
                "
                <p>{$autor->nm_autor}</p>
                ";
            }
            echo
            "
                <button><a href='BsolicDoacao.php?codigo=$Livro->cd_livro'>Visualizar Doação</a></button>
            </div>
            ";
        }
        //var_dump($Livro->cd_livro);
    }
    public function ExibirLivroDoacao( $livro = new Livro()){
        $controller = new LivroController;
        $livros = $controller->ListarLivros($livro);
        //var_dump($livro->nm_livro);

        echo "
        <img src='img/{$livro->cd_livro}' class='livroDoado'>
        <div class='infoLivroDoado'>
            <h1>$livro->nm_livro</h1>
        ";
        
        foreach($livro->autores as $autor){
            echo 
            "
            <p>AUTOR: {$autor->nm_autor}</p>
            ";
        }
        
        echo "
            <div class='nomeDoador'>
            <h1></h1>
            <div class='linha'></div>
            </div>
            
            <div class='botoes'>
            <a href='BcadastrarLivro.php' class='aceitar'> Cadastrar </a>
            <button class='recusar'> Recusar </button>
            </div>
        </div>
        ";
    }
}

?>