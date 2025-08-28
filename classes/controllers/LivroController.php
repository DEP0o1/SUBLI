<?php

class LivroController extends Banco
{
    function ListarLivros($livro = new Livro())
    {
         try{

            
            // if($livro->assuntos){
            //     $assuntocontroller = new AssuntoController;
            //     $assuntos = $assuntocontroller->ListarAssuntos($livro->assuntos[0]);
            // }
            
            // if($assuntos){
            //     $assunto = $assuntos[0];
            // };

            // $colecaocontroller = new ColecaoController;
            // $colecao = $colecaocontroller->ListarColecoes($livro->colecao);

            //   if($colecao){

            //     $colecao = $colecao[0];
            // };

            // $idiomacontroller = new IdiomaController;
            // $idioma = $idiomacontroller->ListarIdiomas($livro->idioma);

            //   if($idioma){

            //     $idioma = $idioma[0];
            // };

            // $generocontroller = new GeneroController;
            // $generos = $generocontroller->ListarGeneros($livro->generos);

            //   if($generos){

            //     $genero = $generos[0];
            // };

            // $autorcontroller = new AutorController;
            // $autores = $autorcontroller->ListarAutores($livro->autores);

            //   if($autores){

            //     $autor = $autores[0];
            // }
            
            // $editoracontroller = new EditoraController;
            // $editora = $editoracontroller->ListarEditoras($livro->editora);
            //   if($editora){

            //     $editora = $editora[0];
            // }


           


            $parametros = [
                'p_cd_livro' => $livro->cd_livro,
                'p_nm_livro' => $livro->nm_livro,
                'p_cd_assunto' => $livro->assuntos[0]->cd_assunto,
                'p_nm_assunto' => $livro->assuntos[0]->nm_assunto,
                'p_cd_colecao' => $livro->colecao->cd_colecao,
                'p_nm_colecao' => $livro->colecao->nm_colecao,
                'p_cd_idioma' => $livro->idioma->cd_idioma,
                'p_nm_idioma' => $livro->idioma->nm_idioma,
                'p_cd_genero' => $livro->generos[0]->cd_genero,
                'p_nm_genero' => $livro->generos[0]->nm_genero,
                'p_cd_autor' => $livro->autores[0]->cd_autor,
                'p_nm_autor' => $livro->autores[0]->nm_autor,
                'p_cd_editora' => $livro->editora->cd_editora,
                'p_nm_editora' => $livro->editora->nm_editora,
    
            ];
            $lista = [];
            $dados = $this->Consultar('listar_livros', $parametros);
            
            $autorcontroller = new AutorController;
            foreach($dados as $item){
                $Livro = new Livro;
                $Livro->Hydrate($item);
                $Livro->autores = $autorcontroller->ListarAutores(new Autor(null,null,$Livro->cd_livro));
                array_push($lista, $Livro);
            }
          

            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AdicionarLivro($livro = new Livro())
    {

    }

    public function AlterarLivro($livro = new Livro())
    {

    }

    public function ExcluirLivro($livro = new Livro())
    {
        
    }
}


//  $livro = new Livro(1,1,[new Autor()])

?>