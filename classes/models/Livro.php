<?php
    class Livro extends Model{
        public $cd_livro;
        public $nm_livro;
        public $autores;
        public $editora;
        public $generos;
        public $idioma;
        public $colecao;
        public $assuntos;

             public function __construct($cd_livro2 = null, $nm_livro2 = null, $autores2 = [new Autor], $editora2 = new Editora(), $generos2 = [new Genero], $idioma2 = new Idioma(), $colecao2 = new Colecao(), $assuntos2 = [new Assunto])
            {
                $this->cd_livro = $cd_livro2;
                $this->nm_livro = $nm_livro2;
                 $this->autores = $autores2;
                $this->editora = $editora2;
                 $this->generos = $generos2;
                $this->idioma = $idioma2;
                 $this->colecao = $colecao2;
                $this->assuntos = $assuntos2;

            }

    }

?>