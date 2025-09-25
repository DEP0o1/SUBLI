<?php

class LeitorView{

public function ExibirLeitores($leitor = new Leitor){

     $controller = new LeitorController;
     $leitores = $controller->ListarLeitores($leitor);

         foreach ($leitores as $Leitor){

            echo "
        <div class='leitorEncontrado'> 
        <img src='img/pequeno terry.webp' alt='' class='leitor'>

            <div class='infoLeitor'>
            <h2>{$Leitor->nm_leitor}</h2>

            <a href='BemprestimoPesquisa.php?codigo=$Leitor->cd_email'>
            <button class='btnAzul'>Empréstimos</button>
            </a>    
            </div>
            </div>
            ";

  }
 }
}
?>