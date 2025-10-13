<?php

class AssuntoController extends Banco
{

    public function ListarAssuntos($assunto = new Assunto())
    {
        try{


            $parametros = [

                'p_cd_assunto' => $assunto->cd_assunto,
                'p_nm_assunto' => $assunto->nm_assunto,
                'p_cd_livro' => $assunto->cd_livro
    
            ];
    
            $lista = [];
            $dados = $this->Consultar('listar_assuntos', $parametros);
            foreach($dados as $item){
                $assunto = new Assunto;
                $assunto->Hydrate($item);
                array_push($lista, $assunto);
            }
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
        
    }
    

    public function AdicionarAssunto($assunto = new Assunto())
    {
        try{
        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        if($assunto->cd_assunto != null){
            $codigo = $this->ListarAssuntos(new Assunto($assunto->cd_assunto));
            if($codigo != []){
                return "Assunto não cadastrado! Já existe outro assunto com esse código";
            }
        }

        $this->Executar('adicionar_assunto', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }

    public function AlterarAssunto($assunto = new Assunto())
    {
        try{
        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        $this->Executar('alterar_assunto', $parametros);
    }catch (\Throwable $th) {
        throw $th;
    }
    }

    public function ExcluirAssunto($assunto = new Assunto())
    {
        try{
            $parametros = [

                'p_cd_assunto' => $assunto->cd_assunto,
                'p_nm_assunto' => $assunto->nm_assunto
    
            ];
    
            $this->Executar('excluir_assunto', $parametros);
        } catch (\Throwable $th) {
            throw $th;
        }
    
    }
}
?>