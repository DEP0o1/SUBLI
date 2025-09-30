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

  <div class="containerLogin">
    <form class="FormLogin">
      
       <div class="logoLogin">
            <img src="img/subli.png" alt="" />   
        </div>

        <h1>Faça seu Cadastro!</h1>

        <hr>

      <div class="barra-progresso">
        <div class="progresso"></div>
      </div>

      <!-- Step 1 -->
      <section class="step ativo">

        <div>
            <label for="cd_email">Nome:</label>
            <input type="text" name="cd_email" id="txtEmail" placeholder="Informe seu Email" autofocus required>
        </div>

        <div>
            <label for="nm_senha">Data de nascimento:</label>
            <input type="date" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 2 -->
      <section class="step">

      <div>
            <label for="cd_email">Telefone:</label>
            <input type="text" name="cd_email" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </div>

        <div>
            <label for="cd_email">Email:</label>
            <input type="email" name="cd_email" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </div>

        <div>
            <label for="nm_senha">Senha:</label>
            <input type="password" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 3 -->
      <section class="step">

        <div>
            <label for="cd_email">CPF:</label>
            <input type="text" name="cd_email" id="txtEmail" placeholder="Informe seu Email" autofocus>
        </div>

        <div>
            <label for="nm_senha">Endereço:</label>
            <input type="password" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div>
            <label for="nm_senha">CEP:</label>
            <input type="password" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="button" class="btnRosa proximo">Próximo</button>
        </div>

      </section>

      <!-- Step 4 -->
      <section class="step">

      <div>
            <label for="nm_senha">Comprovante de residência:</label>
            <input type="file" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div>
            <label for="ft_perfil">Foto de Perfil:</label>
            <input type="file" name="nm_senha" id="txtSenha" placeholder="Informe sua Senha">
        </div>

        <div class="areaBtn">
          <button type="button" class="btnRosa voltar">Voltar</button>
          <button type="submit" class="btnRosa">Cadastrar</button>
        </div>

      </section>

        <!-- <div class="areaBotao">
            <button class="btnRosa" id="btnEntrar" >Entrar</button>
        </div> -->

        <hr>

        <div class="cadastre-se">
           <p>Já possui uma conta?</p> 
           <a href="login.php"><h2>Entrar</h2></a>
        </div>

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



