<?php
    class Bibliotecario extends Model{
        public $cd_bibliotecario;
        public $nm_bibliotecario;
        public $nm_senha;
        public $cd_registro;
        public $cd_biblioteca;

        public function __construct($cd_bibliotecario2 = null, $nm_bibliotecario2 = null, $nm_senha2 = null, $cd_registro2 = null, $cd_biblioteca2 = null)
        {
            $this->cd_bibliotecario = $cd_bibliotecario2;
            $this->nm_bibliotecario = $nm_bibliotecario2;
            $this->nm_senha = $nm_senha2;
            $this->cd_registro = $cd_registro2;
            $this->cd_biblioteca = $cd_biblioteca2;
        }

    }
?>