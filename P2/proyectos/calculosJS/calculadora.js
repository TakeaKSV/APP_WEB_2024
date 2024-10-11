function operaciones() {
    let numero1 = parseInt(document.getElementById('number1').value);
    let numero2 = parseInt(document.getElementById('number2').value);
    let operacion = document.getElementById('operacion1').value;

    let resultado;
    let operacionString;    

    if (isNaN(numero1) || isNaN(numero2)) {
        resultado = "Por favor ingresa números válidos.";
    } else {
        switch (operacion) {
            case '1':
                resultado = numero1 + numero2;
                operacionString = `${numero1} + ${numero2}`;
                break;
            case '2':
                resultado = numero1 - numero2;
                operacionString = `${numero1} - ${numero2}`;
                break;
            case '3':
                resultado = numero1 * numero2;
                operacionString = `${numero1} * ${numero2}`;
                break;
            case '4':
                if (numero2 !== 0) {
                    resultado = numero1 / numero2;
                    operacionString = `${numero1} / ${numero2}`;
                } else {
                    resultado = "No se puede dividir entre cero.";
                    operacionString = "";
                    alert("q puta mierda estas aciendo estas tontito o eres familiar de un pendejo o le hechas la culpa a alguien mas por tus pendejas acciones estas pendejo")
                }
                break;
            default:
                resultado = "Operación no válida.";
                operacionString = "";
        }
    }

    if (operacionString !== "") {
        document.getElementById('resultado').innerText = `${operacionString} = ${resultado}`;
    } else {
        document.getElementById('resultado').innerText = `${resultado}`;
    }
}
