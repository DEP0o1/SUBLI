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
            <div >
                <h1 class="pesquisaAvancada">Faça seu cadastro</h1>
            </div>
        <section class="areaInput">
            <div class="areaTituloLivro">
                <label class="tituloForm">Nome:</label>
                <input type="text" class="inputForm" placeholder="Ex. Pedro Mingel"> 
            </div>
            
            <div class="areaAutorLivro">
                <label class="tituloForm">E-mail:</label>
                <input type="text" class="inputForm" placeholder="Ex. pedro@gmail.com"> 
            </div>
            
                <div>
                    <label class="tituloForm">Endereço:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex. Rua xxx, nº 2">
                </div>

            <div class="formDeLado">
                <div>
                    <label class="tituloForm">Telefone:</label>
                    <input type="text" class="inputFormDeLado" placeholder="Ex. 13-99999999">
                </div>
                <div>
                    <label class="tituloForm">Senha:</label>
                    <input type="text" class="inputFormDeLado" placeholder="************">
                </div>
                <div>
                    <label class="tituloForm">Data de nascimento:</label>
                    <input type="date" class="inputFormDeLado" placeholder="************">
                </div>
            </div>

            <div class="formDeLado">
                <div>
                    <label class="tituloForm">RG:</label>
                    <input type="text" class="inputForm" placeholder="Ex. 22.222.222-2">
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

             <div class="label-input">
            <label for="" class="tituloForm">Comprovante de residência: </label>
            <input type="file" class="inputArquivo">
          </div>

            <div class="areaBtn">
            <button class="btnRosa">Cadastrar</button>
            </div>
            </section>
        </form>

    </div>
</body>
</html>