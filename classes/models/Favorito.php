<?php
class Favorito {
    public $cd_livro;
    public $cd_email;

    public function __construct($cd_livro = null, $cd_email = null){
        $this->cd_livro = $cd_livro;
        $this->cd_email = $cd_email;
    }
}


?>