"use strict"
let arrayPantallita = [];
function addOperator(){
    let pantallita = guardar();
    let newOperando;
    let lastSign=0;
    //Dame la posicion de la ultima ocurrencia de un signo y hago de un substring desde ese punto +1
    //al final asi conseguimos el ultimo operando añadido
    for(let i = 0; i < pantallita.length; i++){
        if("+-*/".includes(pantallita[i])){
            lastSign = i + 1;
        }
    }
    newOperando = pantallita.substring(lastSign);
    if(newOperando!=""){
        arrayPantallita.push(newOperando);    
    }
    
}
function addOperation(sign){
    if(comprobarOperadores()){
        console.log(arrayPantallita);
        arrayPantallita.push(sign);
    }
    
}
function comebackTo(){
    let cadena = arrayPantallita.join();
    return cadena;
}
function getArray(){
    return arrayPantallita;
}
function resetArray() {
    arrayPantallita.splice(0);
}