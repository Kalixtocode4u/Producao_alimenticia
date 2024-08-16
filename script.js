
let ingrediente = []

let painel_repostas = document.querySelector('#p_resp')

function faz(i){
    let pe = document.createElement('p')

    pe.textContent = "voce clicou no abacaxi"
    painel_repostas.appendChild(pe);

    ingrediente.push(i)

}

/*class alimento{}

class folhas{}
class legumes{}
class frutas{}
class cereal{}
class carnes{}
class pao{}
class queijo{}*/

