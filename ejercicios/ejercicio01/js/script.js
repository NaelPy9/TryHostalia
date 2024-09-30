"use strict"

/**
 * Añade eventos Listeners a los botones con los simbolores de operaciones posibles
*/
const numeros = document.querySelectorAll(".numero");
const operadores = document.querySelectorAll(".operador");
const cientificas = document.querySelectorAll(".cientifica");
const especiales = document.querySelectorAll(".especiales");
const buttons = document.querySelector(".buttons");

let pantallita = document.getElementById("pantallita");
let sw = document.getElementById("switch");
let resultado;

sw.addEventListener("click", transformer);

for (let numero of numeros) {
    numero.addEventListener("click", function () {
        imprimirValores(numero.innerHTML);
    });
}

for (let operador of operadores) {
    operador.addEventListener("click", function () {
        resolverOperacion(operador.innerHTML);
        if(comprobarOperadores()){
            imprimirValores(operador.innerHTML);
        }
        
    });
}

for (let especial of especiales){
    especial.addEventListener("click", function(){
        operadoresEspeciales(especial.innerHTML);
    })
}


function transformer(){
    for(let cientifica of cientificas){
        if (cientifica.style.display == 'none'){
            cientifica.style.display = 'inline-block'
            buttons.style.gridTemplateColumns = 'repeat(6, 1fr)';
        }else{
            cientifica.style.display = 'none';
            buttons.style.gridTemplateColumns = 'repeat(4, 1fr)';
        }
        
    }
}
function clearE(){
    pantallita.value = "";    
}
function clear() {
    pantallita.value = pantallita.value.substring(0, pantallita.value.length-1);
}
function comas(){
    if (comprobarComa()) {
        imprimirValores(".");
    }
}

function imprimirValores(id){
    pantallita.value += id;
}
function imprimirResultado(id){
    pantallita.value = id;
}

