<?php

class LivroController extends Banco
{
    function ListarLivros($livro = new Livro())
    {
         try{

            $assuntocontroller = new AssuntoController;
            $assuntos = $assuntocontroller->ListarAssuntos($livro->$asssunto);

            $colecaocontroller = new ColecaoController;
            $colecao = $colecaocontroller->ListarColecoes($livro->$colecao);

            $idiomacontroller = new IdiomaController;
            $idioma = $idiomacontroller->ListarIdiomas($livro->$idioma);

            $generocontroller = new GeneroController;
            $generos = $generocontroller->ListarGeneros($livro->$generos);


            $autorcontroller = new AutorController;
            $autores = $autorcontroller->ListarAutores($livro->$autores);
            
            $editoracontroller = new EditoraController;
            $editora = $editoracontroller->ListarEditoras($livro->$editora);


            $parametros = [

                'p_cd_livro' => $livro->cd_livro,
                'p_nm_livro' => $livro->nm_livro,
                'p_cd_assunto' => $assuntos->cd_assunto,
                'p_nm_assunto' => $assuntos->nm_assunto,
                'p_cd_colecao' => $colecao->cd_colecao,
                'p_nm_colecao' => $colecao->nm_colecao,
                'p_cd_idioma' => $idioma->cd_idioma,
                'p_nm_idioma' => $idioma->nm_idioma,
                'p_cd_genero' => $generos->cd_genero,
                'p_nm_genero' => $generos->nm_genero,
                'p_cd_autor' => $autores->cd_autor,
                'p_nm_autor' => $autores->nm_autor,
                'p_cd_editora' => $editora->cd_editora,
                'p_nm_editora' => $editora->nm_editora,
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_livros', $parametros);
            foreach($dados as $item){
                $livro = new Livro;
                $livro->Hydrate($item);
                array_push($lista, $livro);
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


?>