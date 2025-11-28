<?php
require_once('config.php');
require_once('verificado.php');
$cd_email = $_SESSION['leitor'];

$nm_leitor = null;
$nm_senha = null;
$email_troca = null;
$campos = 0;
$conferido = null;
$conferido2 = null;


    if (isset($_FILES['image'])) {
    $nomeOrigial = $_FILES['image']['name'];

    $novoNome = 'perfil_' . $cd_email;

    $caminho = 'img/' . $novoNome;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho)) {
      $campos = $campos + 1 ; 
    }
  }


    if (isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != "") {
            $nm_leitor = $_REQUEST['nm_leitor'];
          $campos = $campos + 1 ; 

    }


       if (isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != "") {
            $nm_senha = $_REQUEST['nm_senha'];
          $campos = $campos + 1 ; 
    }

    if (isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != "") {
      $email_troca = $_REQUEST['email_troca'];
      $campos = $campos + 1 ; 
}


    if($campos == 3 || $campos == 2 || $campos == 1){
      $controller = new LeitorController;

      if(isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != ""){
        $conferencia_email_novo = $controller->ListarLeitores(new Leitor($email_troca,$nm_leitor,null,null,null,$nm_senha));

        if(isset($conferencia_email_novo) && $conferencia_email_novo == []){
          $conferido = true;
          if(isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != ""){
            $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,$nm_leitor));
           }
 
           if(isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != ""){
             $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,$nm_senha));
            }
 
            if(isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != ""){
             $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,null,null,null,null,null,null,null,null,$email_troca));
             $_SESSION['leitor'] = $_REQUEST['email_troca'];
 
            }
        }
      }
      else{
        $conferencia = $controller->ListarLeitores(new Leitor($cd_email,$nm_leitor,null,null,null,$nm_senha));
        if($conferencia == []){
          $conferido2 = true;
          if(isset($_REQUEST['nm_leitor']) && $_REQUEST['nm_leitor'] != ""){
            $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,$nm_leitor));
           }
 
           if(isset($_REQUEST['nm_senha']) && $_REQUEST['nm_senha'] != ""){
             $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,$nm_senha));
            }
 
            if(isset($_REQUEST['email_troca']) && $_REQUEST['email_troca'] != ""){
             $Leitor = $controller->AlterarLeitor(new Leitor($cd_email,null,null,null,null,null,null,null,null,null,null,null,null,$email_troca));
             $_SESSION['leitor'] = $_REQUEST['email_troca'];
 
            }
        }
      }
             
        }
          
        
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUBLI - Perfil</title>
    <link rel="stylesheet" href="css/leitor.css"/>
    <link rel="stylesheet" href="css/leitorPerfil.css" />
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="icon" type="image/svg+xml" href="img/FavIconBonitinho.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <!-- <script src="js/componentesJS/popupEditarPerfil.js" defer></script> -->
    <script src="js/componentesJS/popupLogout.js" defer></script>
  </head>
  <body>
<?php require_once './complementos/headerLeitor.php'; ?>  

    <main>
    <?php require_once 'barraLateral.php'; ?>
      <section class="areaPerfil">
        <form method = "POST" action="" enctype="multipart/form-data>
          <div class="titulo-areaPerfil">
              <h1>Suas informações</h1>
              <hr/>
          </div>
          
          <!-- <div class="label-input">
            <label for="">Foto de Perfil: </label>
            <input type="file" class="inputArquivo">
          </div> -->
  
          <div class="label-input">
            <label for="">Nome: </label>
            <input name ="nm_leitor"type="text" placeholder="Pedro Miguel "/>
          </div>
  
          <div class="label-input">
            <label for="">E-Mail: </label>
            <input name = "email_troca" type="text" placeholder="seuemail@gmail.com" />
          </div>
  
          <div class="label-input">
            <label for="">Senha: </label>
            <input name="nm_senha" type="password" placeholder="***********"/>
          </div>

        <div class="label-input">
          <label>Foto do livro: </label>
          <input type="file" class="inputArquivo" name="image" accept="image/*" />
        </div>

          <button type="submit" id="btnEditarPerfil">Salvar alterações</button>
''
          <?php
              // if($campos && $conferido == true || $conferido2 == true){
              //   echo $Leitor;
              // }
          ?>
        </form>
      </section>

      <!-- <section class="comprovanteRes">
        <div>
        <h1>Comprovante de Residência</h1>
        <hr/>
        <p>O comprovante de residencia deve ser entregue à uma biblioteca para efetuar totalmente o seu cadastro</p>
        </div>
      </section> -->

    </main>
  </body>
  <script>
  function Mensagem(texto, tipo, nomeElementoPai) {
    const elementoPai = document.querySelector(nomeElementoPai);

    const localMsg = document.createElement('div');
    localMsg.classList.add('mensagem', tipo);

    localMsg.innerHTML = `
        <div class='titulo-mensagem'>
          <span class='material-symbols-outlined'>
            ${tipo == 'erro' ? 'error' : 'book'}
          </span>
          <h1>${tipo == 'erro' ? 'Erro' : 'Sucesso'}</h1>
        </div>
        <p>${texto}</p>
    `;

    elementoPai.appendChild(localMsg);

    setTimeout(() => {
        localMsg.classList.add("sumir");
        localMsg.addEventListener("animationend", () => msg.remove());
    }, 3000);
}
  </script>
</html>
