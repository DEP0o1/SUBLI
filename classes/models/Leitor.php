<?php
    class Leitor extends Model{
        public $cd_email_leitor;
        public $nm_leitor;
        public $cd_cpf;
        public $cd_telefone;
        public $ic_comprovante_residencia;
        public $nm_senha;

        public function __construct($cd_email_leitor2 = null, $nm_leitor2 = null, $cd_cpf2 = null, $cd_telefone2 = null, $ic_comprovante_residencia2 = null, $nm_senha2 = null)
        {
            $this->cd_email_leitor = $cd_email_leitor2;
            $this->nm_leitor = $nm_leitor2;
            $this->cd_cpf = $cd_cpf2;
            $this->cd_telefone = $cd_telefone2;
            $this->ic_comprovante_residencia = $ic_comprovante_residencia2;
            $this->nm_senha = $nm_senha2;
        }

    }
?>