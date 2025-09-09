<?php
    class Leitor extends Model{
        public $cd_email;
        public $nm_leitor;
        public $cd_cpf;
        public $cd_telefone;
        public $ic_comprovante_residencia;
        public $nm_senha;
        public $dt_nascimento;
        public $nm_endereco;
        public $cd_cep;
        public $cd_emprestimo;
        public $cd_evento;
        public $cd_reserva;
        public $cd_doacao;

        public function __construct($cd_email2 = null, $nm_leitor2 = null, $cd_cpf2 = null, $cd_telefone2 = null, $ic_comprovante_residencia2 = null, $nm_senha2 = null, $dt_nascimento2 = null, $nm_endereco2= null, $cd_cep2 = null, $cd_emprestimo2 = null, $cd_evento2 = null, $cd_reserva2 = null, $cd_doacao2 = null)
        {
            $this->cd_email = $cd_email2;
            $this->nm_leitor = $nm_leitor2;
            $this->cd_cpf = $cd_cpf2;
            $this->cd_telefone = $cd_telefone2;
            $this->ic_comprovante_residencia = $ic_comprovante_residencia2;
            $this->nm_senha = $nm_senha2;
            $this->dt_nascimento = $dt_nascimento2;
            $this->nm_endereco = $nm_endereco2;
            $this->cd_cep = $cd_cep2;
            $this->cd_emprestimo = $cd_emprestimo2;
            $this->cd_evento = $cd_evento2;
            $this->cd_reserva = $cd_reserva2;
            $this->cd_doacao = $cd_doacao2;
        }   

    }
?>