<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new AssuntoController();

switch ($metodo) {
    case 'GET':
        try {
            $assuntos = $controlador->ListarAssuntos();
            $resposta = [];

            foreach ($assuntos as $assunto) {
                $resposta[] = [
                    'cd_assunto' => $assunto->cd_assunto,
                    'nm_assunto' => $assunto->nm_assunto
                ];
            }

            echo json_encode($resposta);
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }
        break;
    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) {
                return;
            }

            $camposJSON = ['cd_assunto', 'nm_assunto'];
            if (!validaChaves($corpo, $camposJSON)) {
                return;
            }

            if (!is_numeric($corpo['cd_assunto'])) {
                http_response_code(400);
                echo json_encode(['mensagem' => 'Código deve ser numérico.']);
                return;
            }

            if (strlen($corpo['nm_assunto']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem' => 'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $assunto = new Assunto($corpo['cd_assunto'], $corpo['nm_assunto']);
            $controlador->Adicionarassunto($assunto);
            http_response_code(200);
            echo json_encode(['mensagem' => 'Assunto adicionado com sucesso']);
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }
        break;
    default:
        http_response_code(400);
        echo json_encode(['mensagem' => 'Método Inválido']);
        break;
}

function validaCorpoRequisicao($corpo)
{
    if (is_null($corpo)) {
        http_response_code(400);
        echo json_encode(['mensagem' => 'Dados inválidos!']);
        return false;
    }
    return true;
}

function validaChaves($corpo, $campos)
{
    foreach ($campos as $campo) {
        if (!array_key_exists($campo, $corpo) || trim($corpo[$campo]) === '') {
            http_response_code(400);
            echo json_encode(["mensagem" => "Dados incorretos. Verifique a documentação da API e tente novamente!"]);
            return false;
        }
    }
    return true;
}
