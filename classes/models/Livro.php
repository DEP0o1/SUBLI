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
        public $cd_biblioteca;
        public $cd_emprestimo;
        public $cd_reserva;
        

             public function __construct($cd_livro2 = null, $nm_livro2 = null, $autores2 = [new Autor], $editora2 = new Editora(), $generos2 = [new Genero], $idioma2 = new Idioma(), $colecao2 = new Colecao(), $assuntos2 = [new Assunto], $cd_biblioteca2 = null, $cd_emprestimo2 = null, $cd_reserva2 = null)
            {
                $this->cd_livro = $cd_livro2;
                $this->nm_livro = $nm_livro2;
                 $this->autores = $autores2;
                $this->editora = $editora2;
                 $this->generos = $generos2;
                $this->idioma = $idioma2;
                 $this->colecao = $colecao2;
                $this->assuntos = $assuntos2;
                $this->cd_biblioteca = $cd_biblioteca2;
                $this->cd_emprestimo = $cd_emprestimo2;
                $this->cd_reserva = $cd_reserva2;
            }

    }

?>