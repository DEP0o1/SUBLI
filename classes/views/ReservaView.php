<?php

class ReservaView{

public function ExibirReservas($reserva= new Reserva){

     $controller = new ReservaController;
     $reservas = $controller->ListarReservas($reserva);

         foreach ($reservas as $Reserva){
            $livrocontroller = new LivroController;
            $livro = $livrocontroller->ListarLivros($Reserva->livro);
            echo " <div class='areaEvento'>
          <h2>{$livro[0]->nm_livro}</h2>
          <h3>
            Reservado por: {$Reserva->leitor->nm_leitor}
          </h3>
          <button class='btnRosa'>Ver Mais</button>
        </div> 
            ";



  }
 }
}
?>