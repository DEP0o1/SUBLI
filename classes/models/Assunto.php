<?php

    class Assunto extends Model {
        public $cd_assunto;
        public $nm_assunto;
        public $cd_livro;



            public function __construct($cd_assunto2 = null, $nm_assunto2 = null, $cd_livro2 = null)
            {
                $this->cd_assunto = $cd_assunto2;
                $this->nm_assunto = $nm_assunto2;
                $this->cd_livro = $cd_livro2;
            }
    }

?>

