<?php

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
                'p_cd_biblioteca' => $emprestimo->biblioteca->cd_biblioteca,
                'p_ic_ativa' => $emprestimo->ic_ativa
            ];
            $lista = [];
            $dados = $this->Consultar('listar_emprestimos', $parametros);

            // $bibliotecacontroller = new BibliotecaController;
            // $livrocontroller = new LivroController;
            // $leitorcontroller = new LeitorController;
            // $autorController = new AutorController;
            foreach($dados as $item){
                $Emprestimo = new Emprestimo;
                $Emprestimo->Hydrate($item);
                // // $Emprestimo->livro = new Livro;
                // // $Emprestimo->livro->autores = $autorController->ListarAutores(new Autor(null, null, $item['cd_livro'])); 

                array_push($lista, $Emprestimo);
            }
           
            return $lista;
    }catch (\Throwable $th) {
            throw $th;
        }
}

    public function AdicionarEmprestimo($emprestimo = new Emprestimo())
    {
        try{
            $parametros = [
    
                'p_cd_emprestimo' => $emprestimo->cd_emprestimo,
                'p_dt_devolucao_esperada' => $emprestimo->dt_devolucao_esperada,
                'p_cd_email' => $emprestimo->leitor->cd_email,
                'p_cd_livro' => $emprestimo->livro->cd_livro,
                'p_cd_biblioteca' => $emprestimo->biblioteca->cd_biblioteca,
                
            ];
            $leitorcontroller = new LeitorController;
            $livrocontroller = new LivroController;

            if(!is_null($emprestimo->livro->cd_livro)){
                $livro = $livrocontroller->ListarLivros(new Livro($emprestimo->livro->cd_livro));
                if($livro == []){
                    return "Emprestimo não cadastrado: livro não existe";
                }
            }
            else{
                return "Você precisa preencher o campo código do livro";
            }

            if(!is_null($emprestimo->leitor->cd_email)){
                $leitor = $leitorcontroller->ListarLeitores(new Leitor($emprestimo->leitor->cd_email));
                if($leitor == []){
                    return "Emprestimo não cadastrado: leitor não existe";
                }
            }
            else{
               return "Você precisa preencher o campo de email";
            }

            if(is_null($emprestimo->dt_devolucao_esperada)){
                  return "Você precisa preencher o campo de devolução";
            }

            $this->Executar('adicionar_emprestimo', $parametros);
            return "Emprestimo cadastrado com sucesso!";
        }catch (\Throwable $th) {
            throw $th;
    
        }
    }

    public function AlterarEmprestimo($emprestimo = new Emprestimo())
    {

    }

    public function ExcluirEmprestimo($emprestimo = new Emprestimo())
    {
        
    }


    public function ContarEmprestimos($emprestimo = new Emprestimo())
    {
        try{


            $parametros = [
                'p_cd_livro' => $emprestimo->livro->cd_livro,
                'p_cd_biblioteca' => $emprestimo->biblioteca->cd_biblioteca,
                'p_ic_ativa' => $emprestimo->ic_ativa
            ];
    
            $dados = $this->Consultar('contar_emprestimos', $parametros);
            return $dados;
        }catch (\Throwable $th) {
            throw $th;
        }
        
    }

}
?>