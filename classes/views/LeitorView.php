<?php

class LeitorView{

public function ExibirLeitores($leitor = new Leitor){

     $controller = new LeitorController;
     $leitores = $controller->ListarLeitores($leitor);

         foreach ($leitores as $Leitor){

            //  <div class='leitorEncontrado'> 
     
            //      <div class='infoLeitor'>
            //      <h2>{$Leitor->nm_leitor}</h2>
     
            //      <a href='BemprestimoPesquisa.php?codigo=$Leitor->cd_email'>
            //      <button class='btnAzul'>Empréstimos</button>
            //      </a>    
            //      </div>
            //      </div>;
            echo "
            <div class='resultadoEmPe'>
                <div class='cardLeitor'>
                    <img src='img/pequeno terry.webp' alt=>
                    <div class='infoPerfil'>
                        <h1>{$Leitor->nm_leitor} </h1>
                        <div class='infoDeLado'>
                            <p>
                                <span class='material-symbols-outlined'>
                                    assignment_ind
                                </span> CPF: {$Leitor->nm_leitor}
                            </p>
                            <p>
                                <span class='material-symbols-outlined'>
                                    call_log
                                </span> Telefone: {$Leitor->cd_telefone}
                            </p>
                        </div>
                        <p>
                            <span class='material-symbols-outlined'>
                                home
                            </span> Endereço: {$Leitor->nm_endereco}
                        </p>
                        <p>
                            <span class='material-symbols-outlined'>
                                alternate_email
                            </span> E-mail: {$Leitor->cd_email}
                        </p>
                        <div class='btnsPerfil'>
                            <button type='submit' id='btnPesuisarLeitor' class='btnRosa'>Alterar Dados</button>
                            <button type='submit' id='btnPesuisarLeitor' class='btnRosa'>Pesquisar</button>
                        </div>
                    </div>
                </div>
    
                <div class='textoEsquerda'>
                    <h1>Empréstimos deste leitor</h1>
                </div>
    
                <div class='exibirLivros'>
                    <div class='livro'>
                        <img src='img/6' alt= />
                        <h2>{$Leitor->livro->nm_livro}</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
    
                    <div class='livro'>
                        <img src='img/7' alt= />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
    
                    <div class='livro'>
                        <img src='img/8' alt= />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
    
                    <div class='livro'>
                        <img src='img/9' alt= />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
    
                    <div class='livro'>
                        <img src='img/10' alt= />
                        <h2>Pequeno principe</h2>
                        <p>machado de assis</p>
                        <button>Ver Mais</button>
                    </div>
                </div>
            </div>";           
        }
        
 }
 public function ListarLeitoresColuna($leitor = new Leitor){
    $controller = new LeitorController;
    $leitores = $controller->ListarLeitores($leitor);

    foreach($leitores as $Leitor){
        echo "


        <div class='lista-leitores'>

            <div class='lista'>

                <div class='item-lista'>
                    <div class='imagem-item-lista'>
                        <img src='img/doar.png' alt=>
                    </div>
                    <div class='conteudo-item-lista'>
                        <h2>Nome do leitor</h2>
                        <p>
                            <span class='material-symbols-outlined'>
                                assignment_ind
                            </span> CPF: 123.456.789.20
                        </p>
                        <button class='btnRosa'>
                            Ver Mais
                        </button>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

 }
}
?>


