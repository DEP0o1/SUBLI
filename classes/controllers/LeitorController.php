<?php

class LeitorController extends Banco
{
    function ListarLeitores($leitor = new Leitor())
    {
        
        try{

            $parametros = [
                'p_cd_email' => $leitor->cd_email,
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


     public function Logar($leitor = new Leitor()) {
        try {
            $parametros = [
                'p_cd_email'=>$leitor->cd_email,
                'p_nm_senha'=>$leitor->nm_senha
            ];
            $dados = $this->Consultar('logar_leitor', $parametros);
            //var_dump($dados);
            return $dados;
        } catch (\Throwable $th) {
            throw new Exception('Login e/ou Senha Inválida');
        }
    }


    public function AdicionarLeitor($leitor = new Leitor())
    {
        $imgPerfil = null;
         try{
        $parametros = [
                        'p_cd_email' => $leitor->cd_email,
                        'p_nm_leitor' => $leitor->nm_leitor,
                        'p_cd_cpf' => $leitor->cd_cpf,
                        'p_cd_telefone' => $leitor->cd_telefone,
                        'p_ic_comprovante_residencia' => $leitor->ic_comprovante_residencia,
                        'p_nm_senha' => $leitor->nm_senha,
                        'p_dt_nascimento' => $leitor->dt_nascimento,
                        'p_nm_endereco' => $leitor->nm_endereco,
                        'p_cd_cep' => $leitor->cd_cep
        ];

        $conferencia = $this->ListarLeitores(new Leitor($leitor->cd_email));
        if($conferencia != []){
            return "Já existe um leitor com esse email cadastrado no sistema";
        }
        else{
            $conferencia = $this->ListarLeitores(new Leitor(null,null,$leitor->cd_cpf));
            if($conferencia != []){
                return "Já existe um leitor com esse CPF cadastrado no sistema";
            }
            else{
                $conferencia = $this->ListarLeitores(new Leitor(null,null,null,$leitor->cd_telefone));
                if($conferencia != []){
                    return "Já existe um leitor com esse telefone cadastrado no sistema";
                }
                else{ 
                $this->Executar('adicionar_leitor', $parametros);
                return "Leitor cadastrado com sucesso!";
                }
            }
        }

        $cd_leitor = $dados[0]['cd_leitor'];

        if($imgPerfil != null){;  
            require_once 'upload.php';
            cadastrarImg($cd_leitor, $imgPerfil); 
        }

    }   catch(\Throwable $th) {
            throw $th;
        }
    }

    public function AlterarLeitor($leitor = new Leitor())
    {

         try{
        $parametros = [
                        'p_cd_email' => $leitor->cd_email,
                        'p_email_troca'=> $leitor->email_troca,
                        'p_nm_leitor' => $leitor->nm_leitor,
                        'p_cd_cpf' => $leitor->cd_cpf,
                        'p_cd_telefone' => $leitor->cd_telefone,
                        'p_ic_comprovante_residencia' => $leitor->ic_comprovante_residencia,
                        'p_nm_senha' => $leitor->nm_senha
        ];


        $this->Executar('alterar_leitor', $parametros);

        return "Alterações salvas com sucesso!";

    }   catch(\Throwable $th) {
            throw $th;
        }


    }

    public function ExcluirLeitor($leitor = new Leitor())
    {
        
    }

    
}



?>