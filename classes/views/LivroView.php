<?php

class LivroView{

    public function ExibirLivros($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);

        
    foreach($livros as $Livro){
        echo 
        "
        <div class='livro'>
            <img src='img/{$Livro->cd_livro}'/></img>
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
            <button><a href='LlivroLeitor.php?codigo=$Livro->cd_livro'>Ver Mais</a></button>
        </div>
        ";
        // if (++$i > 4) break; NÃO FAZ ISSO ABOBADO
        
    
    }

}

    public function ExibirLivro($livro = new Livro()){

       
        $controller = new LivroController;
        $livros = $controller->ListarLivros($livro);

        $Bcontroller = new BibliotecaController;
        $bibliotecas = $Bcontroller->ListarBibliotecas(new Biblioteca (null,null,null,[new Livro($livros[0]->cd_livro)]));
    
    foreach($livros as $Livro){
        echo 
        "
    <div class='infoLivro'>
    <h1> $Livro->nm_livro </h1>";


    foreach($Livro->autores as $autor){
      echo"
      <h2> Autor:$autor->nm_autor  </h2>
      ";
    }

      echo"
      <h2> Editora:{$Livro->editora[0]->nm_editora} </h2>
      ";
   echo"
    <h2> Disponivel em: ";

    foreach($bibliotecas as $Biblioteca){
      echo"
      $Biblioteca->nm_biblioteca </h2>";
}
    echo"
      <h2> Status: Disponível  </h2>

      <div class='linha'> </div>

      <h1> Sinopse </h1>
      <p>$Livro->ds_sinopse</p>
    </div>"
        ;



  }
     }
    }

?>

<!-- Um piloto cai com seu avião no deserto e ali encontra uma criança loura e frágil. Ela diz ter vindo de um pequeno planeta distante. E ali, na convivência com o piloto perdido, os dois repensam os seus valores e encontram o sentido da vida. Com essa história mágica, sensível, comovente, às vezes triste, e só aparentemente infantil, o escritor francês Antoine de Saint-Exupéry criou há 70 anos um dos maiores clássicos da ...  universal. Não há adulto que não se comova ao se lembrar de quando o leu quando criança. Trata-se da maior obra existencialista do século XX, segundo Martin Heidegger. Livro mais traduzido da história, depois do Alcorão e da Bíblia, ele agora chega ao Brasil em nova edição, completa, com a tradução de Luiz Fernando Emediato e enriquecida com um caderno ilustrado sobre a obra e a curta e trágica vida do autor.  -->
