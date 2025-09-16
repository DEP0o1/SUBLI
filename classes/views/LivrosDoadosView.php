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
                <button><a href='BsolicDoacao.php?codigo=$Doacao->cd_doacao'>Visualizar Doação</a></button>
            </div>
            ";
        }
        //var_dump($Livro->cd_livro);
        //var_dump($livro);
    }
<<<<<<< HEAD
    public function ExibirLivroDoacao( $livro = new Livro()){
        $controller = new LivroController;
        $livros = $controller->ListarLivros($livro);
=======
    public function ExibirLivroDoacao( $doacao = new Doacao()){
        $controller = new DoacaoController;
        $doacoes = $controller->ListarDoacoes($doacao);
        //var_dump($livro->nm_livro);
>>>>>>> 9bdf38c237f5590bab3880e0404c63b7d7521b09

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
<<<<<<< HEAD
            <h1>pedro</h1>
=======

            <h1>{$leitor[0]->nm_leitor}</h1>

            <h1></h1>
>>>>>>> 9bdf38c237f5590bab3880e0404c63b7d7521b09
            <div class='linha'></div>
            </div>
            
            <div class='botoes'>
            <a href='BcadastrarLivro.php?doacao={$doacoes[0]->cd_doacao}' class='aceitar'> Cadastrar </a>


            <button class='recusar'> Recusar </button>
            </div>
        </div>
        ";
    }
} 

?>