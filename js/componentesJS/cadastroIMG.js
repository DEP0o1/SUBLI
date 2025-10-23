const formData = new FormData();   
const fileInput = cadastrarUsuario.querySelector('#fileInput') 
const btnEnviar = document.getElementById('btnEditarPerfil'); 

if (fileInput) {
    fileInput.addEventListener('change', function(event){ 
        const file = event.target.files[0];
        if (file) {   

            formData.append('image', file); 

            fetch('api/upload.php?preview', {  
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) 
            .then(data => {
                if(data.error){
                    console.error('Erro:' ,data.error)
                    return;
                }
                const perfilPaciente = document.querySelector('.img_perfil'); 
                perfilPaciente.style.backgroundImage = `url(${ URL.createObjectURL(file)})`;   
            })
        }
    })
}


if (btnEnviar) {
        btnEnviar.addEventListener('click', (e)=>{      
            e.preventDefault(); 

            // aqui, no meu caso eu insiro os outros valores do meu formulário de cadastro. Caso você queira inserir apenas a imagem ignore essas linhas
            formData.append('nome', document.getElementById('nome').value);
            formData.append('cpf', document.getElementById('cpf').value);
            formData.append('profissional', document.getElementById('profissional').value);
        

            fetch(`/Psicodesk/areaPacientes.php?image=1&btnCadastrar`, {  // envia o formulario para areaPacientes.php via api (onde será feito o cadastro do paciente)
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {     // retorna a resposta da areaPacientes.php
                if(data.success){
                    alert(data.success);
                    window.location.href = '/Psicodesk/areaPacientes.php';
                }
            })
        });
    }