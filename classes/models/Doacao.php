<?php
    class Doacao extends Model{
        public $cd_doacao;
        public $livro;
        public $biblioteca;
        public $leitor;
        public $ic_confirmado;


        public function __construct($cd_doacao2 = null, $livro2 = new Livro(), $biblioteca2 = new Biblioteca(), $leitor2 = new Leitor(), $ic_aprovado2 = null ){

            $this->cd_doacao = $cd_doacao2;
            $this->livro = $livro2;
            $this->biblioteca = $biblioteca2;
            $this->leitor = $leitor2;
            $this->ic_aprovado = $ic_aprovado2;
        }



    }
 // FATAL
?>