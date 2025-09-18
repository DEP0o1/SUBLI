<?php

    class Exemplar extends Model {
        public $cd_livro;
        public $cd_biblioteca;
        public $cd_exemplar;
        public $dt_insercao;
        public $ic_reservado;
        public function __construct($cd_livro2= null, $cd_biblioteca2 = null, $cd_exemplar2 = null,$dt_insercao2 = null,$ic_reservado2 = null)
            {
                $this->cd_livro = $cd_livro2;
                $this->cd_biblioteca = $cd_biblioteca2;
                $this->cd_exemplar = $cd_exemplar2;
                $this->dt_insercao = $dt_insercao2;
                $this->ic_reservado = $ic_reservado2;
            }

    }

?>