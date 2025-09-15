const btnCadastro = document.getElementById("btnCadastro");
if (btnCadastro) {
  btnCadastro.addEventListener("click", function (e) {
    e.preventDefault();

    const bloqueio = document.createElement("div");
    bloqueio.id = "bloqueio";

    const telaLogout = document.createElement("div");
    telaLogout.id = "popup";

    const barraTitulo = document.createElement("div");
    barraTitulo.id = "barra-titulo";
    const titulo = document.createElement("h1");
    titulo.textContent = "Cadastre-se/Faça seu Login";
    barraTitulo.append(titulo);

    const formulario = document.createElement("form");
    formulario.method = "POST";
    formulario.id = "form-popup";

    item = document.createElement("div");
    item.classList.add("areaInputCadastro");

    item2 = document.createElement("div");
    item2.classList.add("areaBTNCadastro");

    const tituloInput = document.createElement("label");
    tituloInput.id = "labelPopup";
    tituloInput.textContent = "Email:";

    const inputEmail = document.createElement("input");
    inputEmail.id = "inputEmail";
    inputEmail.name = "email";
    inputEmail.placeholder = "seuemail@gmail.com";

    const tituloInputSenha = document.createElement("label");
    tituloInputSenha.id = "labelPopupSenha";
    tituloInputSenha.textContent = "Senha:";

    const inputSenha = document.createElement("input");
    inputSenha.id = "inputSenha";
    inputSenha.name = "senha";
    inputSenha.placeholder = "**********";

    const btnCadastre = document.createElement("button");
    btnCadastre.id = "btnConfirmar";
    btnCadastre.textContent = "Confirmar";

    const btnEntrar = document.createElement("button");
    btnEntrar.id = "btnEntrar";
    btnEntrar.textContent = "Cancelar";
    btnEntrar.addEventListener("click", function (e) {
      e.preventDefault();
      telaLogout.remove();
      bloqueio.remove();
      document.querySelector("body").style.overflow = "visible";
    });

    item2.append(btnEntrar);
    item2.append(btnCadastre);

    item.append(tituloInput);
    item.append(inputEmail);
    item.append(tituloInputSenha);
    item.append(inputSenha);

    formulario.append(item);
    formulario.append(item2);

    telaLogout.append(barraTitulo);
    telaLogout.append(formulario);

    document.querySelector("body").prepend(bloqueio);
    document.querySelector("body").prepend(telaLogout);
    document.querySelector("body").style.overflow = "hidden";
  });

  fetch(`api/leitor.php?e=${email}&s=${senha}`)
    .then(function (resposta) {
      return resposta.json();
    })
    .then(function (dadosJSON) {
      if ("mensagem" in dadosJSON) {
        Mensagem(dadosJSON["mensagem"], "erro", "form");
      } else {
        window.location.href = "LindexLeitor.php";
      }
    });
}
