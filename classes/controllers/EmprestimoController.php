<?php
a
class EmprestimoController extends Banco
{
    function ListarEmprestimos($emprestimo = new Emprestimo())
    {
        try{

            $parametros = [
                'p_cd_emprestimo' => $emprestimo->cd_emprestimo,
                'p_dt_emprestimo' => $emprestimo->dt_emprestimo,
                'p_dt_devolucao_esperada' => $emprestimo->dt_devolucao_esperada,
                'p_dt_devolucao' => $emprestimo->dt_devolucao,
                'p_cd_email' => $emprestimo->leitor->cd_email,
                'p_nm_leitor' => $emprestimo->leitor->nm_leitor,
                'p_cd_livro' => $emprestimo->livro->cd_livro,
                'p_cd_biblioteca' => $emprestimo->biblioteca->cd_biblioteca
            ];
            $lista = [];
            $dados = $this->Consultar('listar_emprestimos', $parametros);

            $bibliotecacontroller = new BibliotecaController;
            $livrocontroller = new LivroController;
            $leitorcontroller = new LeitorController;
            foreach($dados as $item){
                $Emprestimo = new Emprestimo;
                $Emprestimo->Hydrate($item);
                $Emprestimo->biblioteca = $bibliotecacontroller->ListarBibliotecas(new Biblioteca(null,null,null,[new Livro()],[new Bibliotecario()], $Emprestimo->cd_emprestimo));
                $Emprestimo->leitor = $leitorcontroller->ListarLeitores(new Leitor(null,null,null,null,null,null,$Emprestimo->cd_emprestimo));
                $Emprestimo->livro = $livrocontroller->ListarLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo));
                array_push($lista, $Emprestimo);
            }
           
            return $lista;
    }catch (\Throwable $th) {
            throw $th;
        }
}

    public function AdicionarEmprestimo($emprestimo = new Emprestimo())
    {

    }

    public function AlterarEmprestimo($emprestimo = new Emprestimo())
    {

    }

    public function ExcluirEmprestimo($emprestimo = new Emprestimo())
    {
        
    }
}


?>