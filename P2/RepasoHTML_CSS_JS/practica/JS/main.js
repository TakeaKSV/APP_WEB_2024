//Este es un comentario de una linea

/* Esto es
un comentario
de varias lineas
*/

//alerta :o
// alert("Soy el chivo")

//variables

var nombre='El chibo Rodriguez';
let nombre2='Yamiroba';
let edad=20;
let logica=true;
let estatura=1.80;

//Mostrar en pantalla con Write
let concatenacion='La persona: '+nombre2+", tiene la edad de: "+edad+" años.";
// document.write("<h1>"+concatenacion+"</h1><br>");
// document.write('La persona: '+nombre2+", tiene la edad de: "+edad+" años.");

//Mostrar en pantalla con document.getElementbyID

let datos=document.getElementById("informacion");
datos.innerHTML=`
    <br>
    <hr>
    <h1>La persona ${nombre2}, tiene una altura de: ${edad} años</h1>
    <hr>
    <br>
`;

let datos2=document.getElementById("informacion2");
datos2.innerHTML+="<h2>La edad es: " +edad+"</h2>";

//Condicionales if

if (estatura>=1.90)
    {
        document.write("Es una persona alta :o")
        datos.innerHTML+=`
        <hr>
        <h3>Es una persona alta</h3>
    `
    }
else
    {
        document.write("Es una persona de estatura promedio D:")
        datos.innerHTML+=`
        <hr>
        <h3>Es una persona de estatura promedio</h3>
        `;
    }

for(let i=1;i<=5;i++)
    {
        datos.innerHTML+=`<hr><h3>For: el numero es ${i} </h3>`
    }

let i = 1;
while (i<=5)
    {
        datos.innerHTML+=`<hr><h3>While: el numero es ${i} </h3>`
        i++;
    }

// do while (i=<5)
//     {
//         datos.innerHTML+=`<hr><h3>Do While: el numero es ${i} </h3>`
//         i++;
//     }

//Funciones

//1. Que no recibe paramentros y no regresa valor

function suma()
{
    let n1=2;
    let n2=4;
    suma=n1+n2;
    console.log("La suma es: "+suma);
    datos.innerHTML+=`<hr><h3> La suma es: ${suma}</h3>`
}

suma();

//2. Que no recibe parametros y regresa valor

function suma2()
{
    let n1=2;
    let n2=4;
    suma=n1+n2;
    return suma
}

let sum=suma2();
datos.innerHTML+=`<hr><h3> La suma es: ${sum}</h3>`

//Que recibe parametro y no regresa valor

function suma3(numero1, numero2)
{
    let n1=numero1;
    let n2=numero2;
    suma=n1+n2;
    datos.innerHTML+=`<hr><h3> La suma3 es: ${sum}</h3>`

}

suma3(3, 4);

//Que recibe parametros y regresa valor

function suma4(numero1, numero2)
{
    let n1=numero1;
    let n2=numero2;
    suma=n1+n2;
    return suma;
}

sum=suma4(8, 5);
datos.innerHTML+=`<hr><h3> La suma es: ${sum}</h3>`

//arreglo

let animales={}
animales[0]="Perico";
animales[1]="Leon";
animales[2]="Perro";

datos.innerHTML+=`<hr><h3> El rey de la selva es: ${animales[0]}</h3>`

for(let i=0;i<3;i++)
{
    datos.innerHTML+=`<hr><h3> El rey de la selva es: ${animales[i]}</h3>`
}

animales.forEach(element => {
    datos.innerHTML+=`<hr><h3> El rey de la selva es: ${element}</h3>`
});

// funcion de flexha

// funcion normal

function sumaR(a, b)
{
    return a+b
}

datos.innerHTML*=`<hr><h3>La sumaR es: ${sumaR(3, 6)} </h3>`;

const sumaFlecha=(a, b)=>a+b;

datos.innerHTML+=`<hr><h3> La sumaFlecha es: ${sumaFlecha(3, 6)}</h3>`;