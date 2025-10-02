<?php

class EventoView{

public function ExibirEventos($evento = new Evento){

     $controller = new EventoController;
     $eventos = $controller->ListarEventos($evento);

         foreach ($eventos as $Evento){


        //   <div class='areaEvento'>
        //   <h2></h2>
        //   <h3>
        //     {$Evento->ds_evento}
        //   </h3>
        //   <p>data: </p>
        //   <button class='btnRosa'>Ver Mais</button>
        // </div> 
            echo " 
        <div class='item-lista' title='{$Evento->nm_evento}'>
      <div class='imagem-item-lista-evento'>
        <img src='img/doar.png' alt=''>
      </div>
      <div class='conteudo-item-lista'>
        <h2>{$Evento->nm_evento}</h2>
        <h3>{$Evento->dt_evento}</h3>
        <div class='conteudo-item-lista-doador'>
          <img src='https://cdn.sfstation.com/assets/images/events/08/24802081856853977_orig.jpg' alt=''>
          <p>Adamastor</p>
          <h3>(Responsável)</h3>
          <div class='data-evento'>
            <span class='material-symbols-outlined'>
                location_on
              </span>
          </div>
        </div>
        <a href='BsolicEvento.php'>
        <button class='btnRosa'>
          Ver Mais
        </button>
        </a>
      </div>
    </div>

            ";

  }
 }
}
?>