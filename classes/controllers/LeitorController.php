<?php

class LeitorController extends Banco
{
    function ListarLeitores($leitor = new Leitor())
    {
        try{

            $parametros = [
                'p_email_leitor' => $leitor->cd_email,
                'p_nm_leitor' => $leitor->nm_leitor,
                'p_cd_cpf' => $leitor->cd_cpf,
                'p_cd_telefone' => $leitor->cd_telefone,
                'p_cd_evento' => $leitor->cd_evento,
                'p_cd_doacao' => $leitor->cd_doacao,
                'p_cd_emprestimo' => $leitor->cd_emprestimo
    
            ];
            $lista = [];
            $dados = $this->Consultar('listar_leitores', $parametros);
            


            foreach($dados as $item){
                $Leitor = new Leitor;
                $Leitor->Hydrate($item);
                array_push($lista, $Leitor);
            }
          

            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AdicionarLeitor($leitor = new Leitor())
    {

    }

    public function AlterarLeitor($leitor = new Leitor())
    {

    }

    public function ExcluirLeitor($leitor = new Leitor())
    {
        
    }
}


?>