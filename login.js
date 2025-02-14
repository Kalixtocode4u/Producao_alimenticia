let email = document.getElementById('emailInput')
let senha = document.getElementById('senhaInput')

function verificar(){
    if(email.value == 'admin@email.com' && senha.value == '123456'){
        console.log('deucerto!');
        window.location.href = 'admin.html'
    }else{
        console.log('Erro!');
    }
}