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
        <img src='img/{$Livro->cd_livro}' class='capaLivroEmprestado'></img>
    <div class='infoLivro'>
    <h1> $Livro->nm_livro </h1>";


    foreach($Livro->autores as $autor){
      echo"
      <h2> Autor:$autor->nm_autor  </h2>
      ";
    }
    $editoracontroller = new EditoraController();
    $editora = $editoracontroller->ListarEditoras(new Editora(null,null,$Livro->cd_livro));
      echo"
      <h2> Editora:{$editora[0]->nm_editora} </h2>
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

<!-- public function ExibirLivro($livro = new Livro()){

    $controller = new LivroController;
    $livros = $controller->ListarLivros($livro);

    $Bcontroller = new BibliotecaController;
    $bibliotecas = $Bcontroller->ListarBibliotecas(new Biblioteca (null,null,null,[new Livro($livros[0]->cd_livro)]));

    foreach($livros as $Livro){

        $editoracontroller = new EditoraController();
        $editora = $editoracontroller->ListarEditoras(new Editora(null,null,$Livro->cd_livro));

        echo "
        <img src='img/{$Livro->cd_livro}.jpg' alt='' class='capaLivroGrande'>

        <div class='pagLivro'>

          <div class='dadosLivro'>
            <h1> {$Livro->nm_livro} </h1>";

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
              Editora: {$editora[0]->nm_editora}
            </p>

            <p>
              <span class='material-symbols-outlined'>language</span>
              Idioma: {$Livro->ds_idioma}
            </p>

            <p>
              <span class='material-symbols-outlined'>calendar_month</span>
              Ano de publicação: {$Livro->ano_publicacao}
            </p>

            <div class='botaoStatus'>
              <button class='btnRosa'>
                <span class='material-symbols-outlined'>favorite</span>
                Favoritar
              </button>

              <button class='btnRosa'>
                <span class='material-symbols-outlined'>check</span>
                Reservar
              </button>
              <span><p>• Disponível em: ";

        foreach($bibliotecas as $Biblioteca){
            echo " {$Biblioteca->nm_biblioteca} ";
        }

        echo "</p></span>
            </div>
          </div>

          <div class='sinopse'>
            <p>{$Livro->ds_sinopse}</p>
          </div>

        </div>
        ";
    }
} -->


