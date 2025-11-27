<?php

class ReservaView{

public function ExibirReservas($reserva= new Reserva){

    
     $controller = new ReservaController;
     $reservas = $controller->ListarReservas($reserva);

         foreach ($reservas as $Reserva){
            $livrocontroller = new LivroController;
            $livro = $livrocontroller->ListarLivros($Reserva->livro);
            echo " 

        <div class='livro'>
                         <img src='img/{$livro[0]->cd_livro}' alt='{$livro[0]->nm_livro}'/>
                        <h2>{$livro[0]->nm_livro}</h2>
                        <p>
            Reservante: {$Reserva->leitor->nm_leitor}
          </p>
                        <button class='btnRosa'><a href='BcadastrarEmprestimo.php?codigo=$Reserva->cd_reserva'>Visualizar</a></button>
                    </div>
            ";
  }
 }

     public function Input_Livro_Reserva($reserva = new Reserva){
        $controller = new ReservaController;
        $reservas = $controller->ListarReservas($reserva);
        
        if($reserva != new Reserva){

        echo "


        <div class='areaTituloLivro'>
                    <label for='cd_email' class='tituloForm'>Email do Leitor:</label>
                    <input name='cd_email' type='text' class='inputForm' value ='{$reservas[0]->leitor->cd_email}' readonly>
                </div>

                <div class='areaAutorLivro'>
                    <label for='cd_livro'class='tituloForm'>Código do Livro:</label>
                    <input name='cd_livro' type='text' class='inputForm' value ='{$reservas[0]->livro->cd_livro}' readonly>
                </div>
        ";
        }

        else{
            echo
        "
        <div class='areaTituloLivro'>
                    <label for='cd_email' class='tituloForm'>Email do Leitor:</label>
                    <input name='cd_email' type='text' class='inputForm' placeholder='pedro@gmail.com'>
                </div>

                <div class='areaAutorLivro'>
                    <label for='cd_livro'class='tituloForm'>Código do Livro:</label>
                    <input name='cd_livro' type='text' class='inputForm' placeholder='1'>
                </div>
        ";
        }

    }
}
?>