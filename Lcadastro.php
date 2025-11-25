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
      
       <a class="logoLogin" href="LindexLeitor.php">
            <img src="img/subli.png" alt="" />   
        </a>

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

        <hr>

        <div class="cadastre-se">
           <p>Já possui uma conta?</p> 
           <a href="login.php"><h2>Entrar</h2></a>
        </div>

    </form>
</div>

<script>

function Mensagem(texto, tipo, nomeElementoPai) {
    const elementoPai = document.querySelector(nomeElementoPai);

    const localMsg = document.createElement('div');
    localMsg.classList.add('mensagem', tipo);

    localMsg.innerHTML = `
        <div class='titulo-mensagem'>
          <span class='material-symbols-outlined'>
            ${tipo === 'erro' ? 'error' : 'book'}
          </span>
          <h1>${tipo === 'erro' ? 'Erro' : 'Sucesso'}</h1>
        </div>
        <p>${texto}</p>
    `;

    elementoPai.appendChild(localMsg);

    setTimeout(() => {
        localMsg.classList.add("sumir");
        localMsg.addEventListener("animationend", () => localMsg.remove());
    }, 3000);
}


// ---------------------- VALIDACÃO DOS STEPS ----------------------

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

// ---- VALIDAÇÃO DO STEP 1 ----
function validarStep1() {
  const nome = steps[0].querySelector("input[type='text']")
  const data = steps[0].querySelector("input[type='date']")

  if (nome.value.trim() === "") {
      Mensagem("Preencha seu nome.", "erro", ".FormLogin")
      return false
  }

  if (data.value === "") {
      Mensagem("Informe sua data de nascimento.", "erro", ".FormLogin")
      return false
  }

  return true
}

// ---- VALIDAÇÃO DO STEP 2 ----
function validarStep2() {
  const telefone = steps[1].querySelectorAll("input")[0]
  const email = steps[1].querySelectorAll("input")[1]
  const senha = steps[1].querySelector("input[type='password']")

  if (telefone.value.trim() === "") {
      Mensagem("Informe seu telefone.", "erro", ".FormLogin")
      return false
  }

  if (email.value.trim() === "") {
      Mensagem("Informe seu email.", "erro", ".FormLogin")
      return false
  }

  if (senha.value.trim() === "") {
      Mensagem("Digite uma senha.", "erro", ".FormLogin")
      return false
  }

  return true
}

// ---- VALIDAÇÃO DO STEP 3 ----
function validarStep3() {
  const cpf = steps[2].querySelectorAll("input")[0]
  const endereco = steps[2].querySelectorAll("input")[1]
  const cep = steps[2].querySelectorAll("input")[2]

  if (cpf.value.trim() === "") {
      Mensagem("Informe seu CPF.", "erro", ".FormLogin")
      return false
  }

  if (endereco.value.trim() === "") {
      Mensagem("Informe seu endereço.", "erro", ".FormLogin")
      return false
  }

  if (cep.value.trim() === "") {
      Mensagem("Informe o CEP.", "erro", ".FormLogin")
      return false
  }

  return true
}


// ---------------------- BOTÕES ----------------------

btnProximo.forEach((btn, i) => {
  btn.addEventListener("click", () => {

    if (i === 0 && !validarStep1()) return
    if (i === 1 && !validarStep2()) return
    if (i === 2 && !validarStep3()) return

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



