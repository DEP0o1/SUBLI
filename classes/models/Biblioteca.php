<?php

    class Biblioteca extends Model{
        public $cd_biblioteca;
	    public $nm_biblioteca;
        public $nm_endereco;
        public $livros;
        public $bibliotecarios;
        public $cd_emprestimo;
        public $cd_evento;
        public $cd_reserva;
               public $cd_doacao;


        public function __construct($cd_biblioteca2 = null, $nm_biblioteca2 = null, $nm_endereco2 = null, $livros2 = [new Livro],$bibliotecarios2 = [new Bibliotecario], $cd_emprestimo2 = null, $cd_evento2 = null, $cd_reserva2 = null, $cd_doacao2 = null)
        {
            $this->cd_biblioteca = $cd_biblioteca2;
            $this->nm_biblioteca = $nm_biblioteca2;
            $this->nm_endereco = $nm_endereco2;
            $this->livros = $livros2;
            $this->bibliotecarios = $bibliotecarios2;
            $this->cd_emprestimo = $cd_emprestimo2;
            $this->cd_evento = $cd_evento2;
            $this->cd_reserva = $cd_reserva2;
            $this->cd_doacao = $cd_doacao2;

        }
    }
        // FATAL

?>