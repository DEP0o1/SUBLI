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
                const perfilLeitor = document.querySelector('.img_perfil'); 
                perfilLeitor.style.backgroundImage = `url(${ URL.createObjectURL(file)})`;   
            })
        }
    })
}


if (btnEnviar) {
        btnEnviar.addEventListener('click', (e)=>{      
            e.preventDefault(); 
        

            fetch(`/SUBLI/LdoarPerfil.php?image=1&btnCadastrar`, {  
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {     
                if(data.success){
                    alert(data.success);
                    window.location.href = '/subli/LdoarPerfil.php';
                }
            })
        });
    }