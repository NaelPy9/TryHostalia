"use strict"
function resolverOperacion(id){
    addOperator();
    switch (id) {
        case "+":
            addOperation("+");
        break;
        case "-":
            addOperation("-");
        break;
        case "/":
            addOperation("/");
        break;
        case "*":
            addOperation("*");
        break;
        case "√":
            addOperation("√");
        break;
    
        default:
        break;
    }
}
function operadoresEspeciales(id){
    switch (id) {
        case "CE":
            clearE();
            resetArray();
        break;
        case "&lt;=":
            clear();
        break;
        case "M":
            imprimirValores(getMemory());
        break;
        case "=":
            
            imprimirResultado(resolver());
            resetArray();
        break;
        case ".":
            comas();
        break;
        default:
        break;
    }

}
function toPantalla(numString){
    return numString;
}

function comprobarOperadores(){
    let pantallita = guardar();
    let possibleSigno = pantallita.substring(pantallita.length-1);
    if ("+*-/".includes(possibleSigno)){
        return false;
    } else{
        return true;
    }
}
function comprobarComa(){
    let pantallita = guardar();
    let token=true;

    for(let i = 1; i<pantallita.length; i++){
        if(".".includes(pantallita[i]))
            token = false;
        else if("+-/*".includes(pantallita[i-1]))
            token = true;
        
    }
    if(token == true){
        return true;
    }else
        return false;    
    
}


