<?php

class ReservaController extends Banco
{
    function ListarReservas($reserva = new Reserva())
    {
         try{
            $parametros = [
                'p_cd_reserva' => $reserva->cd_reserva,
                'p_dt_reserva' => $reserva->dt_reserva,
                'p_cd_email' => $reserva->leitor->cd_email,
                'p_cd_livro' => $reserva->livro->cd_livro,
                'p_cd_biblioteca' => $reserva->biblioteca->cd_biblioteca,
                'p_nm_leitor' =>$reserva->leitor->nm_leitor,
                'p_ic_ativa' => $reserva->ic_ativa
            ];

            $lista = [];

            $dados = $this->Consultar('listar_reservas', $parametros);
            

            // $bibliotecacontroller = new BibliotecaController;
            // $livrocontroller = new LivroController;
            // $leitorcontroller = new LeitorController;
            foreach($dados as $item){
                $Reserva = new Reserva;
                $Reserva->Hydrate($item);
                // $Doacao->biblioteca = $bibliotecacontroller->ListarBibliotecas(new Biblioteca(null,null,null,[new Livro()],[new Bibliotecario()],null,null,null,$Doacao->cd_doacao));
                $Reserva->leitor = new Leitor($item['cd_email'],$item['nm_leitor']);
                $Reserva->biblioteca = new Biblioteca($item['cd_biblioteca']);
                $Reserva->livro = new Livro($item['cd_livro']);
                array_push($lista, $Reserva);
            }
        
        
            return $lista;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AdicionarReserva($reserva = new Reserva())
    {
        try{
            $parametros = [
                'p_cd_reserva' => $reserva->cd_reserva,
                'p_cd_email' => $reserva->leitor->cd_email,
                'p_cd_livro' => $reserva->livro->cd_livro,
                'p_cd_biblioteca' => $reserva->biblioteca->cd_biblioteca
            ];


            $this->Executar('adicionar_reserva', $parametros);
            

            // $bibliotecacontroller = new BibliotecaController;
            // $livrocontroller = new LivroController;
            // $leitorcontroller = new LeitorController;
        
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function AlterarReserva($reserva = new Reserva())
    {

         try{
            $parametros = [
                'p_cd_reserva' => $reserva->cd_reserva,
                'p_dt_reserva' => $reserva->dt_reserva,
                'p_cd_email' => $reserva->leitor->cd_email,
                'p_cd_livro' => $reserva->livro->cd_livro,
                'p_cd_biblioteca' => $reserva->biblioteca->cd_biblioteca,
                'p_ic_ativa' => $reserva->ic_ativa
            ];


            $this->Executar('alterar_reserva', $parametros);
            

            // $bibliotecacontroller = new BibliotecaController;
            // $livrocontroller = new LivroController;
            // $leitorcontroller = new LeitorController;
        
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ExcluirReserva($reserva = new Reserva())
    {
        
    }


    public function ContarReservas($reserva = new Reserva())
    {
        try{


            $parametros = [
                'p_cd_livro' => $reserva->livro->cd_livro,
                'p_cd_biblioteca' => $reserva->biblioteca->cd_biblioteca,
                'p_ic_ativa' => $reserva->ic_ativa
               
    
            ];
    
            $dados = $this->Consultar('contar_reservas', $parametros);
            return $dados;
        }catch (\Throwable $th) {
            throw $th;
        }
        
    }


}


?>