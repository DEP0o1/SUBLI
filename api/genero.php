<?php

require_once('config.php');
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new GeneroController();

switch ($metodo) {
    case 'GET':
        try {
            $generos = $controlador->ListarGeneros();
            $resposta = [];

            foreach ($generos as $genero) {
                $resposta[] = [
                    'cd_genero' => $genero->cd_genero,
                    'nm_genero' => $genero->nm_genero
                ];
            }

            echo json_encode($resposta);
        } catch (Exception $erro) {
            http_response_code(500);
            echo json_encode(['mensagem' => $erro->getMessage()]);
        }

        break;

        case 'PUT':
    try {
        $corpo = json_decode(file_get_contents('php://input'), true);
        if (!validaCorpoRequisicao($corpo)) { return; }

        $camposJSON = ['cd_genero','nm_genero'];
        if (!validaChaves($corpo, $camposJSON)) { return; }

        // Validação do código
        if ($corpo['cd_genero'] !== "" && !is_numeric($corpo['cd_genero'])) {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Código deve ser numérico.']);
            return;
        }

        if ($corpo['cd_genero'] === "") {
            $corpo['cd_genero'] = null;
        } else {
            $corpo['cd_genero'] = intval($corpo['cd_genero']);
        }

        // Validação do nome
        if (strlen($corpo['nm_genero']) < 3) {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Nome deve ter no mínimo 3 caracteres.']);
            return;
        }

        $genero = new Genero($corpo['cd_genero'], $corpo['nm_genero']);
        $resultado = $controlador->AlterarGenero($genero);

        if ($resultado === false || $resultado === 0 || $resultado === "Genero não existe") {
            http_response_code(400);
            echo json_encode(['mensagem' => 'Gênero não existe! Insira outro código de um gênero existente']);
            return;
        }

        http_response_code(200);
        echo json_encode(['mensagem' => 'Gênero alterado com sucesso']);

    } catch (Exception $erro) {
        http_response_code(500);
        echo json_encode(['mensagem'=>$erro->getMessage()]);
    }
    break;


    case 'POST':
        try {
            $corpo = json_decode(file_get_contents('php://input'), true);
            if (!validaCorpoRequisicao($corpo)) { return; }

            $camposJSON = ['nm_genero'];
            if (!validaChaves($corpo, $camposJSON)) { return; }

            if (!is_numeric($corpo['cd_genero']) && $corpo['cd_genero'] != "" ) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Código deve ser numérico.']);
                return;
            }
            else{
                if(is_numeric($corpo['cd_genero'])){
                }
                else{
                    $corpo['cd_genero'] = null;
                }
                
            }

            if (strlen($corpo['nm_genero']) < 3) {
                http_response_code(400);
                echo json_encode(['mensagem'=>'Nome deve ter no mínimo 3 caracteres.']);
                return;
            }

            $genero = new Genero($corpo['cd_genero'], $corpo['nm_genero']);
          $resultado =  $controlador->AdicionarGenero($genero);

            if($resultado == "Genero não cadastrado! Já existe outro genero com esse código"){
                echo json_encode(['mensagem'=>'Genero não cadastrado! Já existe outro genero com esse código']);
            }
           
            else{
                http_response_code(200);
                echo json_encode(['mensagem'=>'Genero adicionado com sucesso']);
            }
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
