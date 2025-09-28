<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUBLI - Cadastro</title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="css/mobile.css">
  <script src="js/componentesJS/header.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
  <div class="areaCadastro">
    <form action="" class="formAvancado1">

      <div>
        <h1 class="pesquisaAvancada">Faça seu cadastro</h1>
      </div>

      <div class="barra-progresso">
        <div class="progresso"></div>
      </div>

      <!-- Step 1 -->
      <section class="step ativo">

        <div class="areaTituloLivro">
          <label for="nm_nome" class="tituloForm">Nome:</label>
          <input name="nm_nome" type="text" class="inputForm" placeholder="Ex. Pedro Mingel">
        </div>

        

        <div>
            <label for="dt_nascimento" class="tituloForm">Data de nascimento:</label>
            <input name="dt_nascimento" type="date" class="inputFormDeLado">
          </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 2 -->
      <section class="step">

        <div class="formDeLado">
          <div>
            <label for="cd_telefone" class="tituloForm">Telefone:</label>
            <input name="cd_telefone" type="text" class="inputFormDeLado" placeholder="Ex. 13-99999999">
          </div>

          <div>
            <label for="cd_email" class="tituloForm">E-mail:</label>
            <input name="cd_email" type="text" class="inputForm" placeholder="Ex. pedro@gmail.com">
          </div>

          <div>
            <label for="nm_senha" class="tituloForm">Senha:</label>
            <input name="nm_senha" type="password" class="inputFormDeLado" placeholder="************">
          </div>
          
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 3 -->
      <section class="step">

        <div class="formDeLado">
          

          <div>
            <label class="tituloForm">CPF:</label>
            <input type="text" class="inputForm" placeholder="Ex. 123.456.789-0">
          </div>

          <div>
          <label for="nm_endereco" class="tituloForm">Endereço:</label>
          <input name="nm_endereco" type="text" class="inputFormDeLado" placeholder="Ex. Rua xxx, nº 2">
        </div>

          <div>
            <label class="tituloForm">CEP:</label>
            <input type="text" class="inputFormDeLado" placeholder="Ex.00000-000">
          </div>
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 4 -->
      <section class="step">

        <div class="formDeLado">
          <div class="label-input">
            <label class="tituloForm">Comprovante de residência: </label>
            <input type="file" class="inputArquivo">
          </div>

          <div class="label-input">
            <label class="tituloForm">Foto de Perfil: </label>
            <input type="file" class="inputArquivo">
          </div>
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="submit" class="btnRosa">Cadastrar</button>
        </div>

      </section>

    </form>
  </div>
  <script>
    const steps = document.querySelectorAll(".step")
    const btnProximo = document.querySelectorAll(".proximo")
    const btnVoltar = document.querySelectorAll(".voltar")
    const progresso = document.querySelector(".progresso")

    let stepAtual = 0

    function mostrarStep(n) {
      steps.forEach((s, i) => {
        s.classList.toggle("ativo", i === n)
      })
      progresso.style.width = `${((n + 1) / steps.length) * 100}%`
    }

    btnProximo.forEach(btn => {
      btn.addEventListener("click", () => {
        if (stepAtual < steps.length - 1) {
          stepAtual++
          mostrarStep(stepAtual)
        }
      })
    })

    btnVoltar.forEach(btn => {
      btn.addEventListener("click", () => {
        if (stepAtual > 0) {
          stepAtual--
          mostrarStep(stepAtual)
        }
      })
    })

    mostrarStep(stepAtual)
  </script>
</body>
</html>



