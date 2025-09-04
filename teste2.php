<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrossel de Livros</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .carrossel-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            padding: 20px 0;
        }
        
        .carrossel {
            display: flex;
            transition: transform 0.5s ease;
            gap: 20px;
        }
        
        .livro {
            flex: 0 0 calc(20% - 20px);
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .livro:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .livro img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .livro h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .livro p {
            color: #666;
            font-size: 14px;
        }
        
        .seta {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.8);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 10;
            transition: background 0.3s ease;
        }
        
        .seta:hover {
            background: rgba(255, 255, 255, 1);
        }
        
        .seta-esquerda {
            left: 10px;
        }
        
        .seta-direita {
            right: 10px;
        }
        
        .indicadores {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }
        
        .indicador {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ccc;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .indicador.ativo {
            background: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Biblioteca Virtual</h1>
        
        <div class="carrossel-container">
            <button class="seta seta-esquerda">&#10094;</button>
            <div class="carrossel">
                <?php
                $livros = [
                    ["titulo" => "Dom Casmurro", "imagem" => "https://covers.openlibrary.org/b/id/10309248-L.jpg", "autor" => "Machado de Assis"],
                    ["titulo" => "O Cortiço", "imagem" => "https://covers.openlibrary.org/b/id/8270292-L.jpg", "autor" => "Aluísio Azevedo"],
                    ["titulo" => "Iracema", "imagem" => "https://covers.openlibrary.org/b/id/8896672-L.jpg", "autor" => "José de Alencar"],
                    ["titulo" => "Vidas Secas", "imagem" => "https://covers.openlibrary.org/b/id/8269968-L.jpg", "autor" => "Graciliano Ramos"],
                    ["titulo" => "O Alienista", "imagem" => "https://covers.openlibrary.org/b/id/8269853-L.jpg", "autor" => "Machado de Assis"],
                    ["titulo" => "Memórias Póstumas", "imagem" => "https://covers.openlibrary.org/b/id/8269868-L.jpg", "autor" => "Machado de Assis"],
                    ["titulo" => "O Guarani", "imagem" => "https://covers.openlibrary.org/b/id/8896671-L.jpg", "autor" => "José de Alencar"],
                    ["titulo" => "Macunaíma", "imagem" => "https://covers.openlibrary.org/b/id/8269998-L.jpg", "autor" => "Mário de Andrade"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],["titulo" => "O Triste Fim de Policarpo", "imagem" => "https://covers.openlibrary.org/b/id/8896668-L.jpg", "autor" => "Lima Barreto"],
                    ["titulo" => "Capitães da Areia", "imagem" => "https://covers.openlibrary.org/b/id/8896669-L.jpg", "autor" => "Jorge Amado"]
                ];
                
              
                foreach ($livros as $livro) {
                    echo '<div class="livro">';
                    echo '<img src="' . $livro['imagem'] . '" alt="' . $livro['titulo'] . '">';
                    echo '<h3>' . $livro['titulo'] . '</h3>';
                    echo '<p>' . $livro['autor'] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
            <button class="seta seta-direita">&#10095;</button>
            
            <div class="indicadores">
                <?php
         
                $numIndicadores = ceil(count($livros) / 5);
                for ($i = 0; $i < $numIndicadores; $i++) {
                    echo '<div class="indicador' . ($i === 0 ? ' ativo' : '') . '" data-indice="' . $i . '"></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carrossel = document.querySelector('.carrossel');
            const livros = document.querySelectorAll('.livro');
            const setaEsquerda = document.querySelector('.seta-esquerda');
            const setaDireita = document.querySelector('.seta-direita');
            const indicadores = document.querySelectorAll('.indicador');
            
 
            const livrosPorVez = 5;
            let livroAtual = 0;
            const totalLivros = livros.length;
            const totalSlides = Math.ceil(totalLivros / livrosPorVez);
            

            function ajustarCarrossel() {
                const larguraLivro = livros[0].offsetWidth + 20;
                carrossel.style.width = (larguraLivro * livrosPorVez) + 'px';
            }
            

            function atualizarCarrossel() {
                const larguraLivro = livros[0].offsetWidth + 20;
                const deslocamento = -livroAtual * larguraLivro * livrosPorVez;
                carrossel.style.transform = `translateX(${deslocamento}px)`;
                
                indicadores.forEach((indicador, index) => {
                    if (index === livroAtual) {
                        indicador.classList.add('ativo');
                    } else {
                        indicador.classList.remove('ativo');
                    }
                });
                

                setaEsquerda.style.display = livroAtual === 0 ? 'none' : 'block';
                setaDireita.style.display = livroAtual === totalSlides - 1 ? 'none' : 'block';
            }
            

            setaEsquerda.addEventListener('click', function() {
                if (livroAtual > 0) {
                    livroAtual--;
                    atualizarCarrossel();
                }
            });
 
            setaDireita.addEventListener('click', function() {
                if (livroAtual < totalSlides - 1) {
                    livroAtual++;
                    atualizarCarrossel();
                }
            });
            

            indicadores.forEach(indicador => {
                indicador.addEventListener('click', function() {
                    livroAtual = parseInt(this.getAttribute('data-indice'));
                    atualizarCarrossel();
                });
            });
            

            window.addEventListener('resize', function() {
                ajustarCarrossel();
                atualizarCarrossel();
            });
            

            ajustarCarrossel();
            atualizarCarrossel();
        });
    </script>
</body>
</html>