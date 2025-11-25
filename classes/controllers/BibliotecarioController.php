<?php

class BibliotecarioController extends Banco
{
    function ListarBibliotecarios($bibliotecario = new Bibliotecario())
    {

         try{
            $parametros = [

                'p_cd_bibliotecario' => $bibliotecario->cd_bibliotecario,
                'p_nm_bibliotecario' => $bibliotecario->nm_bibliotecario,
                'p_cd_registro' => $bibliotecario->cd_registro,
                'p_cd_biblioteca' => $bibliotecario->cd_biblioteca
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_bibliotecarios', $parametros);
            foreach($dados as $item){
                $bibliotecario = new Bibliotecario;
                $bibliotecario->Hydrate($item);
                $bibliotecario->cd_biblioteca = $item["cd_biblioteca"];
                array_push($lista, $bibliotecario);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
        


    }

    public function AdicionarBibliotecario($bibliotecario = new Bibliotecario())
    {
             try{
        $parametros = [

            'p_cd_bibliotecario' => $bibliotecario->cd_bibliotecario,
            'p_nm_bibliotecario' => $bibliotecario->nm_bibliotecario

        ];

        $this->Executar('adicionar_bibliotecario', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }
    

    public function AlterarBibliotecario($bibliotecario = new Bibliotecario())
    {

        try{
        $parametros = [

            'p_cd_bibliotecario' => $bibliotecario->cd_bibliotecario,
            'p_nm_bibliotecario' => $bibliotecario->nm_bibliotecario

        ];

        $this->Executar('alterar_bibliotecario', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }

    }

    public function ExcluirBibliotecario($bibliotecario = new Bibliotecario())
    {
             try{
        $parametros = [

            'p_cd_bibliotecario' => $bibliotecario->cd_bibliotecario,
            'p_nm_bibliotecario' => $bibliotecario->nm_bibliotecario

        ];

        $this->Executar('excluir_bibliotecario', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }

    public function LogarBibliotecario($bibliotecario = new Bibliotecario){
        try {
            $parametros = [
                'p_cd_bibliotecario'=>$bibliotecario->cd_bibliotecario,
                'p_nm_senha'=>$bibliotecario->nm_senha
            ];
            $dados = $this->Consultar('logar_bibliotecario', $parametros);
            //var_dump($dados);
            return $dados;
        } catch (\Throwable $th) {
            throw new Exception('Login e/ou Senha Inválida');
        }
    }
}



?>