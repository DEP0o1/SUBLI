<?php

class DoacaoController extends Banco
{
    function ListarDoacoes($doacao = new Doacao())
    {
        
        
       
        try{
            $parametros = [
                'p_cd_doacao' => $doacao->cd_doacao,
                'p_cd_livro' => $doacao->livro->cd_livro,
                'p_nm_livro' => $doacao->livro->nm_livro,
                'p_cd_biblioteca' => $doacao->biblioteca->cd_biblioteca,
                'p_cd_email' => $doacao->leitor->cd_email,
                'p_nm_biblioteca' => $doacao->biblioteca->nm_biblioteca,
                'p_nm_leitor' => $doacao->leitor->nm_leitor,
                'p_ic_aprovado' => $doacao->ic_aprovado
            ];

            $lista = [];

            $dados = $this->Consultar('listar_doacoes', $parametros);
            

            // $bibliotecacontroller = new BibliotecaController;
            // $livrocontroller = new LivroController;
            // $leitorcontroller = new LeitorController;
            foreach($dados as $item){
                $Doacao = new Doacao;
                $Doacao->Hydrate($item);
                // $Doacao->biblioteca = $bibliotecacontroller->ListarBibliotecas(new Biblioteca(null,null,null,[new Livro()],[new Bibliotecario()],null,null,null,$Doacao->cd_doacao));
                // $Doacao->leitor = $leitorcontroller->ListarLeitores(new Leitor(null,null,null,null,null,null,null,null,null,$Doacao->cd_doacao));
                // $Doacao->livro = $livrocontroller->ListarLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,null,null,$Doacao->cd_doacao));
                array_push($lista, $Doacao);
            }
          
        
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }


    }

    public function AdicionarDoacao($doacao = new Doacao())
    {

    }

    public function AlterarDoacao($doacao = new Doacao())
    {

    }

    public function ExcluirDoacao($doacao = new Doacao())
    {
        
    }
}



?>