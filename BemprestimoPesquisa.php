<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bibliotecario.css">
    <script src="js/componentesJS/header.js"></script>
    
    <link rel="shortcut icon" href="img/pequeno terry.webp" type="image/x-icon">
</head>
  <?php
    require_once './complementos/headerBibliotecario.php';
  ?>
  
<body>
    <div class="filtrosEmprestimos">
        <select class="selectQuaseRosa">
            <option value="" disabled selected hidden>Em Atrazo</option>
            <option value="2">1 Semana</option>
            <option value="0">1 Mês</option>
            <option value="1">Mais de um Mêes</option>
        </select>
        <select class="selectQuaseRosa">
            <option value="" disabled selected hidden>Em Prazo</option>
            <option value="2">falta 1 Semana</option>
            <option value="0">falta 1 Mês</option>
            <option value="1">falta Mais de um Mês</option>
        </select>
    </div>

    <div class="areaResultadoPesquisa">
        <div class="resultadoPesquisa">
                    <div class="areaLivro">
                    
                    <img src="img/robo.webp" alt="" class="capaLivro">
                    <h3>Eu robo</h3>
                    
                    <p>Isac assimov</p>
                    <button class="btnRosa ">Ver Mais</button>
            </div>
                        <div class="areaLivro">
                    
                    <img src="img/calibaeabruxasilviafederici-0-cke.webp" alt="" class="capaLivro">
                    <h3>Caliba e a Bruxa</h3>
                    
                    <p>Clara Amorim</p>
                    <button class="btnRosa  ">Ver Mais</button>
            </div>
                    <div class="areaLivro">
                    
                    <img src="img/o-urso-que-nao-era.webp" alt="" class="capaLivro">
                    <h3>O Urso que Não era</h3>
                    
                    <p>Frank Tehlis</p>
                    <button class="btnRosa  ">Ver Mais</button>
            </div>
                <div class="areaLivro">
                    
                    <img src="img/nietzche.webp" alt="" class="capaLivro">
                    <h3>A Genealogia da Moral</h3>
                    
                    <p>Nietzche</p>
                    <button class="btnRosa  ">Ver Mais</button>
            
        </div>
            <div class="areaLivro">
                    
                    <img src="img/vantagens.webp" alt="" class="capaLivro">
                    <h3>As vantagens de ser Invisivel</h3>
                    
                    <p>Aintoine de Saint-Exupéry</p>
                    <button class="btnRosa  ">Ver Mais</button>
    
        </div>


        
    </div>

    <div class="areaResultadoPesquisa">
        <div class="resultadoPesquisa">
                    <div class="areaLivro">
                    
                    <img src="img/miseravel.jpg" alt="" class="capaLivro">
                    <h3>Os Miseraveis</h3>
                    
                    <p>Cauã Nunes</p>
                    <button class="btnRosa  ">Ver Mais</button>
            </div>
                        <div class="areaLivro">
                    
                    <img src="img/O_LIVRO_DOS_INSULTOS_15785095791068183SK1578509579B.webp" alt="" class="capaLivro">
                    <h3>O Livro dos Insultos</h3>
                    
                    <p>Léo Lins</p>
                    <button class="btnRosa  ">Ver Mais</button>
            </div>
                    <div class="areaLivro">
                    
                    <img src="img/capitaes-da-areia.webp" alt="" class="capaLivro">
                    <h3>Capitães de Areia</h3>
                    
                    <p>Baco Exu do blues</p>
                    <button class="btnRosa  ">Ver Mais</button>
            </div>
                <div class="areaLivro">
                    
                    <img src="img/como-eu-era-antes-de-voce-livro-cke.webp" alt="" class="capaLivro">
                    <h3>Como Eu Era 
                        
                        Antes de Você</h3>
                    
                    <p>Demi Lovato</p>
                    <button class="btnRosa  ">Ver Mais</button>
            
        </div>
            <div class="areaLivro">
                    
                    <img src="img/como-mudar-o-mundo.jpg" alt="" class="capaLivro">
                    <h3>Como Mudar o Mundo</h3>
                    
                    <p>DEUS</p>
                    <button class="btnRosa  ">Ver Mais</button>
    
        </div>


        
    </div>
</body>