<?php
    require_once('config.php');
	header('Content-Type: application/json');
	$metodo = $_SERVER['REQUEST_METHOD'];
    $cd_email = $_SESSION['leitor'];
    $cd_livro = $_REQUEST['codigo'];
    $cd_biblioteca = 1;
	$controller = new ReservaController();

	switch ($metodo) {

        case 'POST':
			try {
				$controller->AdicionarReserva(new Reserva(null,null,new Leitor($cd_email),new Livro($cd_livro),new Biblioteca($cd_biblioteca)));

				http_response_code(200);
				echo json_encode(['mensagem'=>'Reserva feita']);
			} catch (\Throwable $th) {
				http_response_code(500);
				echo json_encode(['mensagem'=>$th->getMessage()]);	
			}
			break;

    }



	function validaCorpoRequisicao($corpo) {
		if (is_null($corpo))
		{
			http_response_code(400);
			echo json_encode(['mensagem'=>'Dados Inváidos!']);
			return false;
		}
		return true;
	}
	function validaChaves($corpo, $campos) {
		for ($i=0; $i < count($campos); $i++) { 
			if (!array_key_exists($campos[$i], $corpo))
			{
				http_response_code(400);
				echo json_encode(['mensagem'=>'Dados incorretos. Verifique a documentação da API e tente novamente!']);
				return false;
			}
			if ($corpo[$campos[$i]] == ''){
				http_response_code(400);
				echo json_encode(['mensagem'=>'Dados incorretos. Verifique a documentação da API e tente novamente!']);
				return false;
			}
		}
		return true;
	}
?>