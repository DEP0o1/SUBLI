<?php

class BibliotecaController extends Banco
{
    function ListarBibliotecas($biblioteca = new Biblioteca())
    {
        $parametros = [

            'p_cd_biblioteca' => $biblioteca->cd_biblioteca,
            'p_nm_biblioteca' => $biblioteca->nm_biblioteca,
            'p_cd_livro' => $biblioteca->livros[0]->cd_livro,
            'p_cd_bibliotecario' => $biblioteca->bibliotecarios[0]->cd_bibliotecario,
            'p_cd_evento' => $biblioteca->cd_evento

        ];

        $lista = [];
        $livrocontroller = new LivroController;
        $bibliotecariocontroller = new BibliotecarioController;
        $dados = $this->Consultar('listar_bibliotecas', $parametros);
            foreach($dados as $item){
            $Biblioteca = new Biblioteca;
            $Biblioteca->Hydrate($item);
            $Biblioteca->bibliotecarios = $bibliotecariocontroller->ListarBibliotecarios(new Bibliotecario(null,null,null,null,$Biblioteca->cd_biblioteca));
            $Biblioteca->livros = $livrocontroller->ListarLivros(new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],$Biblioteca->cd_biblioteca));
            array_push($lista, $Biblioteca);
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