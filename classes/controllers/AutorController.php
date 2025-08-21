<?php

class AutorController extends Banco
{

    public function ListarAutores($autor)
    {
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('alterar_autores', $parametros);
    }

    public function AdicionarAutor($autor)
    {
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('adicionar_autor', $parametros);

    }

    public function AlterarAutor($autor)
    {
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('alterar_autor', $parametros);


    }

    public function ExcluirAutor($autor)
    {
        $parametros = [

            'p_cd_autor' => $autor->cd_autor,
            'p_nm_autor' => $autor->nm_autor

        ];

        $this->Executar('excluir_autor', $parametros);
    }
}
?>