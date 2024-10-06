let memoria;
function resolver(){
    
    addOperator();
    let toResolve = getArray();
    
    let temp;
    for(let i = 0; i < toResolve.length; i++){
        if("+-*/√".includes(toResolve[i])){
            switch (toResolve[i]) {
                case "+":
                    memoria = sumar(parseFloat(toResolve[i-1]), parseFloat(toResolve[i+1]));

                break;
                case "-":
                    memoria = restar(parseFloat(toResolve[i-1]), parseFloat(toResolve[i+1]));

                break;
                case "*":
                    memoria = multiplicar(parseFloat(toResolve[i-1]), parseFloat(toResolve[i+1]));

                break;
                case "/":
                    memoria = dividir(parseFloat(toResolve[i-1]), parseFloat(toResolve[i+1]));

                break;
                case "√":
                    console.log("entra");
                    memoria = raiz(parseFloat(toResolve[i+1]));

                break;
            
                default:
                break;
            }
            toResolve.splice(0,3);
            toResolve.unshift(memoria);
            i = 0;
        }
        
    }
    if (memoria != undefined){
        return memoria;    
    } else{
        return "0";
    }
    
}
function getMemory(){
    if(memoria != undefined)
    {
        return memoria;
    }else
        return "0";
    
}
function sumar(operando1, operando2){
    return parseFloat(operando1+operando2);
}
function restar(operando1, operando2){
    return operando1-operando2;
}
function multiplicar(operando1, operando2){
    return operando1*operando2;
}
function dividir(operando1, operando2){
    return operando1/operando2;
}
function raiz(operando){
    return Math.sqrt(operando);
}