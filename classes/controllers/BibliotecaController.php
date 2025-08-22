<?php

class BibliotecaController extends Banco
{
    function ListarBibliotecas($biblioteca = new Biblioteca())
    {
        $parametros = [

            'p_cd_biblioteca' => $biblioteca->cd_biblioteca,
            'p_nm_biblioteca' => $biblioteca->nm_biblioteca

        ];

        $lista = [];
        $dados = $this->Consultar('listar_bibliotecas', $parametros);
            foreach($dados as $item){
            $biblioteca = new Biblioteca;
            $biblioteca->Hydrate($item);
            array_push($lista, $biblioteca);
        }
        return $lista;
    }

    public function AdicionarBiblioteca($biblioteca = new Biblioteca())
    {

    }

    public function AlterarBiblioteca($biblioteca = new Biblioteca())
    {

    }

    public function ExcluirBiblioteca($biblioteca = new Biblioteca())
    {
        
    }
}


?>