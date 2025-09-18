<?php
    class Emprestimo extends Model{
        public $cd_emprestimo;
        public $dt_emprestimo;
        public $dt_devolucao_esperada;
        public $dt_devolucao;
        public $leitor;
        public $livro;
        public $biblioteca;
        public $ic_ativa;

    public function __construct($cd_emprestimo2 = null, $dt_emprestimo2 = null, $dt_devolucao_esperada2 = null, $dt_devolucao2 = null, $leitor2 = new Leitor(), $livro2 = new Livro(), $biblioteca2 = new Biblioteca(), $ic_ativa2 = null)
    {
        $this->cd_emprestimo = $cd_emprestimo2;
        $this->dt_emprestimo = $dt_emprestimo2;
        $this->dt_devolucao_esperada = $dt_devolucao_esperada2;
        $this->dt_devolucao = $dt_devolucao2;
        $this->leitor = $leitor2;
        $this->livro = $livro2;
        $this->biblioteca = $biblioteca2;
        $this->ic_ativa = $ic_ativa2;
    }



    }
       
?>