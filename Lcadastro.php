<?php
require_once('config.php');


$cd_email = $_POST['cd_email'] ?? null;
$nm_leitor = $_POST['nm_leitor'] ?? null;
$cd_cpf = $_POST['cd_cpf'] ?? null;
$cd_telefone = $_POST['cd_telefone'] ?? null;
$nm_senha = $_POST['nm_senha'] ?? null;
$dt_nascimento = $_POST['dt_nascimento'] ?? null;
$nm_endereco = $_POST['nm_endereco'] ?? null;
$cd_cep = $_POST['cd_cep'] ?? null;

$ic_comprovante_residencia = true;

$cadastroRealizado = false;

if (
    $cd_email && $nm_leitor && $cd_cpf && $cd_telefone &&
    $nm_senha && $dt_nascimento && $nm_endereco && $cd_cep
) {

    $controller = new LeitorController();

    $conferencia = $controller->ListarLeitores(
        new Leitor(
            $cd_email,
            $nm_leitor,
            $cd_cpf,
            $cd_telefone,
            $ic_comprovante_residencia,
            $nm_senha,
            $dt_nascimento,
            $nm_endereco,
            $cd_cep
        )
    );

    if ($conferencia == []) {
        $controller->AdicionarLeitor(
            new Leitor(
                $cd_email,
                $nm_leitor,
                $cd_cpf,
                $cd_telefone,
                $ic_comprovante_residencia,
                $nm_senha,
                $dt_nascimento,
                $nm_endereco,
                $cd_cep
            )
        );

        $cadastroRealizado = true;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUBLI - Cadastro</title>
  <link rel="stylesheet" href="css/leitor.css">
  <link rel="stylesheet" href="css/mobile.css">
  <script src="js/componentesJS/header.js"></script>

  <style>
    
    .step {
      visibility: hidden;
      height: 0;
      overflow: hidden;
      opacity: 0;
      transition: 0.3s;
    }
    .step.ativo {
      visibility: visible;
      height: auto;
      opacity: 1;
    }
  </style>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

</head>

<body>

<div class="containerLogin">

<form class="FormLogin" method="POST" action="" enctype="multipart/form-data">

<a class="logoLogin" href="LindexLeitor.php">
    <img src="img/subli.png" alt="" />   
</a>

<h1>Faça seu Cadastro!</h1>
<hr>

<div class="barra-progresso"><div class="progresso"></div></div>

<!-- STEP 1 -->
<section class="step ativo">

    <div>
        <label for="nm_leitor">Nome:</label>
        <input type="text" name="nm_leitor" placeholder="Seu nome" required>
    </div>

    <div>
        <label for="dt_nascimento">Data de nascimento:</label>
        <input type="date" name="dt_nascimento" required>
    </div>

    <div class="areaBtn">
        <button type="button" class="btnRosa proximo">Próximo</button>
    </div>

</section>

<!-- STEP 2 -->
<section class="step">

    <div>
        <label for="cd_telefone">Telefone:</label>
        <input type="text" name="cd_telefone" placeholder="Ex. 13-99999999" required>
    </div>

    <div>
        <label for="cd_email">Email:</label>
        <input type="email" name="cd_email" placeholder="Seu email" required>
    </div>

    <div>
        <label for="nm_senha">Senha:</label>
        <input type="password" name="nm_senha" required>
    </div>

    <div class="areaBtn">
        <button type="button" class="btnRosa voltar">Voltar</button>
        <button type="button" class="btnRosa proximo">Próximo</button>
    </div>

</section>

<!-- STEP 3 -->
<section class="step">

    <div>
        <label for="cd_cpf">CPF:</label>
        <input type="text" name="cd_cpf" required>
    </div>

    <div>
        <label for="nm_endereco">Endereço:</label>
        <input type="text" name="nm_endereco" required>
    </div>

    <div>
        <label for="cd_cep">CEP:</label>
        <input type="text" name="cd_cep" required>
    </div>

    <div class="areaBtn">
        <button type="button" class="btnRosa voltar">Voltar</button>
        <button type="button" class="btnRosa proximo">Próximo</button>
    </div>

</section>

<!-- STEP 4 -->
<section class="step">

    <div>
        <label for="comprovante">Comprovante de residência:</label>
        <input type="file" name="comprovante">
    </div>

    <div>
        <label for="foto">Foto de perfil:</label>
        <input type="file" name="foto">
    </div>

    <div class="areaBtn">
        <button type="button" class="btnRosa voltar">Voltar</button>
        <button type="submit" class="btnRosa">Cadastrar</button>
    </div>

    <?php 
    if ($cadastroRealizado) { 
        echo "<p style='color: green; margin-top:15px;'>Cadastro realizado com sucesso!</p>"; 
    } 
    ?>

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


const steps = document.querySelectorAll(".step");
const btnProximo = document.querySelectorAll(".proximo");
const btnVoltar = document.querySelectorAll(".voltar");
const progresso = document.querySelector(".progresso");

let stepAtual = 0;

function mostrarStep(n) {
  steps.forEach((s, i) => {
    s.classList.toggle("ativo", i === n);
  });

  progresso.style.width = `${((n + 1) / steps.length) * 100}%`;
}


function validarStep1() {
  const nome = steps[0].querySelector("input[name='nm_leitor']");
  const data = steps[0].querySelector("input[name='dt_nascimento']");
  if (!nome.value.trim()) { Mensagem("Preencha seu nome.", "erro", ".FormLogin"); return false; }
  if (!data.value) { Mensagem("Informe sua data de nascimento.", "erro", ".FormLogin"); return false; }
  return true;
}

function validarStep2() {
  const telefone = steps[1].querySelector("input[name='cd_telefone']");
  const email = steps[1].querySelector("input[name='cd_email']");
  const senha = steps[1].querySelector("input[name='nm_senha']");
  if (!telefone.value.trim()) { Mensagem("Informe seu telefone.", "erro", ".FormLogin"); return false; }
  if (!email.value.trim()) { Mensagem("Informe seu email.", "erro", ".FormLogin"); return false; }
  if (!senha.value.trim()) { Mensagem("Digite uma senha.", "erro", ".FormLogin"); return false; }
  return true;
}

function validarStep3() {
  const cpf = steps[2].querySelector("input[name='cd_cpf']");
  const endereco = steps[2].querySelector("input[name='nm_endereco']");
  const cep = steps[2].querySelector("input[name='cd_cep']");
  if (!cpf.value.trim()) { Mensagem("Informe seu CPF.", "erro", ".FormLogin"); return false; }
  if (!endereco.value.trim()) { Mensagem("Informe seu endereço.", "erro", ".FormLogin"); return false; }
  if (!cep.value.trim()) { Mensagem("Informe o CEP.", "erro", ".FormLogin"); return false; }
  return true;
}

btnProximo.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    if (i === 0 && !validarStep1()) return;
    if (i === 1 && !validarStep2()) return;
    if (i === 2 && !validarStep3()) return;

    if (stepAtual < steps.length - 1) {
      stepAtual++;
      mostrarStep(stepAtual);
    }
  });
});

btnVoltar.forEach(btn => {
  btn.addEventListener("click", () => {
    if (stepAtual > 0) {
      stepAtual--;
      mostrarStep(stepAtual);
    }
  });
});

mostrarStep(stepAtual);

</script>

</body>
</html>
