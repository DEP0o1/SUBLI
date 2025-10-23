<?php

$targetDir = "img/uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if(isset($_REQUEST['preview'])) { 
    

    if (isset($_FILES["image"])) {
        $file = $_FILES["image"];
        $targetFile = $targetDir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {

            $uploadOk = 1;
        } else {
            echo json_encode(["error" => "O arquivo não é uma imagem."]);
            $uploadOk = 0;
            return;
        }


        if ($file["size"] > 5000000) {
            echo json_encode(["error" => "Desculpe, o arquivo é muito grande."]);
            $uploadOk = 0;
            return;
        }


        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo json_encode(["error" => "Desculpe, somente arquivos JPG, JPEG e PNG são permitidos."]);
            $uploadOk = 0;
            return;
        }


        if ($uploadOk == 0) {

            echo json_encode(["error" => "Desculpe, seu arquivo não foi selecionado."]);
            return;
        }
        else {

            echo json_encode([
                "success" => true,
                "response" => "Arquivo selecionado com sucesso",
            ]);
        }
    } else {

        echo json_encode(["error" => "Nenhum arquivo foi selecionado."]);
        return;
    }
}