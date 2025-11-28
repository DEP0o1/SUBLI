<?php

class LivroController extends Banco
{
    function ListarLivros($livro = new Livro())
    {
         try{

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
                'p_cd_biblioteca' => $livro->cd_biblioteca,
                'p_cd_emprestimo' => $livro->cd_emprestimo
                
            ];
            $lista = [];
            $dados = $this->Consultar('listar_livros', $parametros);
            

            // $assuntocontroller = new AssuntoController;
            // $colecaocontroller = new ColecaoController;
            // $idiomacontroller = new IdiomaController;
            // $generocontroller = new GeneroController;
            $autorcontroller = new AutorController;

     
            foreach($dados as $item){
                $Livro = new Livro;
                $Livro->Hydrate($item);
                // $Livro->assuntos = $assuntocontroller->ListarAssuntos(new Assunto(null,null,$Livro->cd_livro));
                // $Livro->colecao = $colecaocontroller->ListarColecoes(new Colecao(null,null,$Livro->cd_livro));
                // $Livro->idioma = $idiomacontroller->ListarIdiomas(new Idioma(null,null,$Livro->cd_livro));
                // $Livro->generos = $generocontroller->ListarGeneros(new Genero(null,null,$Livro->cd_livro));
                $Livro->autores = $autorcontroller->ListarAutores(new Autor(null,null,$Livro->cd_livro));
                 $Livro->editora = new Editora($item["cd_editora"],$item["nm_editora"]);
                 $Livro->idioma = new Idioma($item["cd_idioma"],$item["nm_idioma"]);
                array_push($lista, $Livro);
            }
          

            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    /*====================*/

function ListarProximoLivro($livro = new Livro){
        try {
            $dados = $this->Consultar('ListarProximoLivro');
            return $dados; 

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /*===========o codigo livro ser o coalesce=========*/

     function ListarLivrosEmprestimo($livro = new Livro())
    {
         try{

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
                'p_cd_biblioteca' => $livro->cd_biblioteca,
                'p_cd_emprestimo' => $livro->cd_emprestimo
                
            ];
            $lista = [];
            $dados = $this->Consultar('listar_livros_emprestimo', $parametros);
            

            // $assuntocontroller = new AssuntoController;
            // $colecaocontroller = new ColecaoController;
            // $idiomacontroller = new IdiomaController;
            // $generocontroller = new GeneroController;
            $autorcontroller = new AutorController;

     
            foreach($dados as $item){
                $Livro = new Livro;
                $Livro->Hydrate($item);
                // $Livro->assuntos = $assuntocontroller->ListarAssuntos(new Assunto(null,null,$Livro->cd_livro));
                // $Livro->colecao = $colecaocontroller->ListarColecoes(new Colecao(null,null,$Livro->cd_livro));
                // $Livro->idioma = $idiomacontroller->ListarIdiomas(new Idioma(null,null,$Livro->cd_livro));
                // $Livro->generos = $generocontroller->ListarGeneros(new Genero(null,null,$Livro->cd_livro));
                $Livro->autores = $autorcontroller->ListarAutores(new Autor(null,null,$Livro->cd_livro));
                 $Livro->editora = new Editora($item["cd_editora"],$item["nm_editora"]);
                 $Livro->idioma = new Idioma($item["cd_idioma"],$item["nm_idioma"]);
                 $Livro->cd_emprestimo = $item["cd_emprestimo"];
                array_push($lista, $Livro);
            }
          

            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }


    public function AdicionarLivro($livro = new Livro())
    
    {
        try{
        $parametros = [

            'p_cd_livro' => $livro->cd_livro,
            'p_nm_livro' => $livro->nm_livro,

            'p_cd_editora' => $livro->editora->cd_editora,
            'p_nm_editora' => $livro->editora->nm_editora,

            'p_cd_idioma' => $livro->idioma->cd_idioma,
            'p_nm_idioma' => $livro->idioma->nm_idioma,

            'p_cd_colecao' => $livro->colecao->cd_colecao,
            'p_nm_colecao' => $livro->colecao->nm_colecao,

            'p_cd_genero' => $livro->generos[0]->cd_genero,
            'p_nm_genero' => $livro->generos[0]->nm_genero,

            'p_cd_autor' => $livro->autores[0]->cd_autor,
            'p_nm_autor' => $livro->autores[0]->nm_autor,

            'p_cd_assunto' => $livro->assuntos[0]->cd_assunto,
            'p_nm_assunto' => $livro->assuntos[0]->nm_assunto,
            
            'p_ds_sinopse' => $livro->ds_sinopse,

            'p_cd_biblioteca' => $livro->cd_biblioteca


        ];

            $assuntocontroller = new AssuntoController;
            $colecaocontroller = new ColecaoController;
            $idiomacontroller = new IdiomaController;
            $generocontroller = new GeneroController;
            $autorcontroller = new AutorController;
            $editoracontroller = new EditoraController;
            
            if(!is_null($livro->assuntos[0]->cd_assunto) || !is_null($livro->assuntos[0]->nm_assunto)){
                $assuntos = $assuntocontroller->ListarAssuntos(new Assunto($livro->assuntos[0]->cd_assunto,$livro->assuntos[0]->nm_assunto));
                if($assuntos == []){
                    return "Livro não cadastrado: assunto não existe";
                }
            }
            else{
                return;
            }


            if(!is_null($livro->colecao->cd_colecao) || !is_null($livro->colecao->nm_colecao)){
                $colecao = $colecaocontroller->ListarColecoes(new Colecao($livro->colecao->cd_colecao, $livro->colecao->nm_colecao));
                 if($colecao == []){
                    return "Livro não cadastrado: coleção não existe";
                }
            }
            else{
                return;
            }
            
            if(!is_null($livro->idioma->cd_idioma) || !is_null($livro->idioma->nm_idioma)){
                $idioma = $idiomacontroller->ListarIdiomas(new Idioma($livro->idioma->cd_idioma,$livro->idioma->nm_idioma));
                 if($idioma == []){
                    return "Livro não cadastrado: idioma não existe";
                }
            }    
            else{
                return;
            }
            
            if(!is_null($livro->generos[0]->cd_genero) || !is_null($livro->generos[0]->nm_genero)){
                $generos = $generocontroller->ListarGeneros(new Genero($livro->generos[0]->cd_genero,$livro->generos[0]->nm_genero));
                 if($generos == []){
                    return "Livro não cadastrado: genero não existe";
                }
            }
            else{
                return;
            }
            
            if(!is_null($livro->autores[0]->cd_autor) || !is_null($livro->autores[0]->nm_autor)){
                $autores = $autorcontroller->ListarAutores(new Autor($livro->autores[0]->cd_autor,$livro->autores[0]->nm_autor));
                 if($autores == []){
                    return "Livro não cadastrado: autor não existe";
                }
            }
            else{
                return;
            }

            if(!is_null($livro->editora->cd_editora) || !is_null($livro->editora->nm_editora)){
                $editora = $editoracontroller->ListarEditoras(new Editora($livro->editora->cd_editora, $livro->editora->nm_editora));
                 if($editora == []){
                    return "Livro não cadastrado: editora não existe";
                }
            }
            else{
                return;
            }
        $this->Executar('adicionar_livro', $parametros);


        return "Livro cadastrado com sucesso!";
    }catch (\Throwable $th) {
        throw $th;
    }
    }

    public function AlterarLivro($livro = new Livro())
    {

    }

    public function ExcluirLivro($livro = new Livro())
    {
        
    }

    public function ContarLivrosProcurados($data)
    {
        try{
            $parametros = [
                'p_data' => $data
            ];
            $dados = $this->Consultar('contar_livros_procurados',$parametros);
            return $dados;
        }catch (\Throwable $th) {
            throw $th;
        }
}



}


//  $livro = new Livro(1,1,[new Autor()])


?>