<?php

class LeitorView{

public function ExibirLeitores($leitor = new Leitor, $cd_biblioteca = null){

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
                <div class='cardLeitor'>
                    <img src='img/perfil_{$Leitor->cd_email}' alt=>
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
                ";
    
                $emprestimocontroller = new EmprestimoController;
                $emprestimos = $emprestimocontroller->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($Leitor->cd_email),new Livro(), new Biblioteca($cd_biblioteca),true));
                foreach($emprestimos as $emprestimo){
                   echo"
                    <div class='livro'>
                        <img src='img/{$emprestimo->livro->cd_livro}' alt= />
                        <h2>{$emprestimo->livro->nm_livro}</h2>
                     ";
                    $autorcontroller = new AutorController;
                    $autores = $autorcontroller->ListarAutores(new Autor(null,null,$emprestimo->livro->cd_livro));
                     foreach($autores as $autor){
                        echo "<p>$autor->nm_autor</p>";
                     }
                     echo"
                        <button>Ver Mais</button>
                    </div>";
                }
                echo"
                ";           
        }
        
 }
 public function ExibirLeitoresColuna($leitor = new Leitor, $ignorar = null){
    $controller = new LeitorController;
    $leitores = $controller->ListarLeitores($leitor);

    
    foreach($leitores as $Leitor){
        $caminho_imagem_padrao = "img/perfil_padrao"; 
    
        if (empty($leitores)) {
            return;
        }
    
        $caminho_imagem_leitor = "img/perfil_$Leitor->cd_email"; 
    
        $src_imagem = file_exists($caminho_imagem_leitor) 
            ? $caminho_imagem_leitor 
            : $caminho_imagem_padrao;
        if($ignorar == $Leitor->cd_email){
        continue;
    }
        
    echo "


        <section class='outrosLeitores'>
            <div class='leitorLinha'>
                <div class='infoPequena'>
                    <img src='$src_imagem' alt=''>
                    <p>$Leitor->nm_leitor</p>
                </div>

                <p>$Leitor->cd_email</p>

                <p>$Leitor->cd_telefone</p>

                <p>$Leitor->cd_cpf</p>

                <p>Sem atrasos</p>
                <a href='BpesquisaLeitor.php?c=$Leitor->cd_email'> <button class='btnRosa'>Ver Mais</button> </a>
            </div>

        ";
    }
 }
     public function ExibirLeitorFatal($leitor = new Leitor, $cd_biblioteca){

    $controller = new LeitorController;
    $leitores = $controller->ListarLeitores($leitor);

    $caminho_imagem_padrao = "img/perfil_padrao"; 

    if (empty($leitores)) {
        return;
    }

    $leitor_encontrado = $leitores[0];

    $caminho_imagem_leitor = "img/perfil_{$leitor_encontrado->cd_email}"; 

    $src_imagem = file_exists($caminho_imagem_leitor) 
        ? $caminho_imagem_leitor 
        : $caminho_imagem_padrao;

    echo"
        <section class='resultadoPesquisaLeitor'>
        <div class='leitoresEncontrados'>
            <div class='cardLeitor'>
                <img src='{$src_imagem}' alt='Foto de perfil de {$leitor_encontrado->nm_leitor}'>
                <div class='infoPerfil'>
                    <h1>{$leitor_encontrado->nm_leitor} </h1>
                    <div class='infoDeLado'>
                        <p>
                            <span class='material-symbols-outlined'>
                                assignment_ind
                            </span> CPF: {$leitor_encontrado->nm_leitor}
                        </p>
                        <p>
                            <span class='material-symbols-outlined'>
                                call_log
                            </span> Telefone: {$leitor_encontrado->cd_telefone}
                        </p>
                    </div>
                    <p>
                        <span class='material-symbols-outlined'>
                            home
                        </span> Endereço: {$leitor_encontrado->nm_endereco}
                    </p>
                    <p>
                        <span class='material-symbols-outlined'>
                            alternate_email
                        </span> E-mail: {$leitor_encontrado->cd_email}
                    </p>
                    <div class='btnsPerfil'>
                        <button type='submit' id='btnPesuisarLeitor' class='btnRosa'>Alterar Dados</button>
                        <button type='submit' id='btnPesuisarLeitor' class='btnRosa'>Enviar Notificação</button>
                        <button type='submit' id='btnPesuisarLeitor' class='btnRosa'>Registrar Devolução</button>
                    </div>
                </div>
            </div>
        </div>
        <div class='tituloCentro'>
            <h1>Empréstimos Atuais Deste Leitor</h1>
        </div>

        <div class='exibirLivros'>";
        $emprestimo = new EmprestimoController;
        $resultado = $emprestimo->ListarEmprestimos(new Emprestimo(null,null,null,null,new Leitor($leitor_encontrado->cd_email),new Livro,new Biblioteca($cd_biblioteca), true));
        
        foreach ($resultado as $Emprestimo) {
            $Emprestimos = new LivroView;
            $livro_vazio = new Livro(null,null,[new Autor()],new Editora(),[new Genero()],new Idioma(),new Colecao,[new Assunto()],null,$Emprestimo->cd_emprestimo);
            $Emprestimos->ExibirLivrosEmprestimo($livro_vazio);
        }
        
    echo "</div>
        </section>";
}
}
?>


