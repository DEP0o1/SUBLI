<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Novo Leitor </title>
    <link rel="stylesheet" href="css/leitor.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="js/componentesJS/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
    <div class="areaCadastro">
        <form action="" class="formAvancado1">
            <div>
                <h1 class="pesquisaAvancada">Faça seu cadastro</h1>
            </div>
            <section class="areaInput">
                <div class="areaTituloLivro">
                    <label for="nm_nome" class="tituloForm">Nome:</label>
                    <input name="nm_nome" type="text" class="inputForm" placeholder="Ex. Pedro Mingel">
                </div>

                <div>
                    <label for="nm_endereco" class="tituloForm">Endereço:</label>
                    <input name="nm_endereco" type="text" class="inputFormDeLado" placeholder="Ex. Rua xxx, nº 2">
                </div>

                <div class="formDeLado">
                    <div>
                        <label for="cd_telefone" class="tituloForm">Telefone:</label>
                        <input name="cd_telefone" type="text" class="inputFormDeLado" placeholder="Ex. 13-99999999">
                    </div>
                    <div>
                        <label for="nm_senha" class="tituloForm">Senha:</label>
                        <input name="nm_senha" type="text" class="inputFormDeLado" placeholder="************">
                    </div>
                    <div>
                        <label for="dt_nascimento" class="tituloForm">Data de nascimento:</label>
                        <input name="dt_nascimento" type="date" class="inputFormDeLado" placeholder="************">
                    </div>
                </div>

                <div class="formDeLado">
                    <div>
                        <label for="cd_email" class="tituloForm">E-mail:</label>
                        <input name="cd_email" type="text" class="inputForm" placeholder="Ex. pedro@gmail.com">
                    </div>

                    <div>
                        <label class="tituloForm">CPF:</label>
                        <input type="text" class="inputForm" placeholder="Ex. 123.456.789-0">
                    </div>

                    <div>
                        <label class="tituloForm">CEP:</label>
                        <input type="text" class="inputFormDeLado" placeholder="Ex.00000-000">
                    </div>
                </div>

                <div class="formDeLado">
                    <div class="label-input">
                        <label for="" class="tituloForm">Comprovante de residência: </label>
                        <input type="file" class="inputArquivo">
                    </div>

                    <div class="label-input">
                        <label for="" class="tituloForm">Foto de Perfil: </label>
                        <input type="file" class="inputArquivo">
                    </div>
                </div>


                <div class="areaBtn">
                    <button class="btnRosa">Cadastrar</button>
                </div>
            </section>
        </form>

    </div>
</body>

</html>