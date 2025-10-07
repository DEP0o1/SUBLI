<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new AutorController();

switch ($metodo) {
    case 'GET':
        try {
            $autores = $controlador->ListarAutores();
            $resposta = [];

            foreach ($autores as $autor) {
                $resposta[] = [
                    'cd_autor' => $autor->cd_autor,
                    'nm_autor' => $autor->nm_autor
                ];
            }

            echo json_encode($resposta);

        } catch (Exception $erro) {
            http_response_code(200);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }


    break;

    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['cd_autor', 'nm_autor'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_autor'])) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }

            if (strlen($corpo['nm_autor']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $autor = new Autor($corpo['cd_autor'], $corpo['nm_autor']);
            $controlador->AdicionarAutor($autor);
            http_response_code(200);
            echo json_encode(['mensagem'=>'Autor adicionado com sucesso']);
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem'=>$erro->getMessage()]);
        }
        break;
    default:
        http_response_code(400);
        echo json_encode(['mensagem'=>'Método Inválido']);
        break;
}

function validaCorpoRequisicao($corpo){
    if (is_null($corpo)) {
        http_response_code(400);
        echo json_encode(['mensagem'=>'Dados inválidos!']);
        return false;
    }
    return true;
}

function validaChaves($corpo, $campos){
    foreach ($campos as $campo) {
        if (!array_key_exists($campo, $corpo) || trim($corpo[$campo]) === '') {
            http_response_code(400);
            echo json_encode(["mensagem"=>"Dados incorretos. Verifique a documentação da API e tente novamente!"]);
            return false;
        }
    }
    return true;
}
?>
