<?php

class AssuntoController extends Banco
{

    public function ListarAssuntos($assunto)
    {
        
        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        $this->Executar('listar_assuntos', $parametros);

    }

    public function AdicionarAssunto($assunto)
    {

        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        $this->Executar('adicionar_assunto', $parametros);


    }

    public function AlterarAssunto($assunto)
    {

        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        $this->Executar('alterar_assunto', $parametros);

    }

    public function ExcluirAssunto($assunto)
    {
        $parametros = [

            'p_cd_assunto' => $assunto->cd_assunto,
            'p_nm_assunto' => $assunto->nm_assunto

        ];

        $this->Executar('excluir_assunto', $parametros);
    }
}
?>