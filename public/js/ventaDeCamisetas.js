window.onload=inicio;
var reyes=["figura1","figura2","figura3","figura4"];
var camisetas=["camisetaNegra.png","camisetaBlanca.png"];
var camisetaActual=0;
var reyActual=Math.floor(Math.random()*reyes.length);
var size=2;
//Este es la imagen por defecto que se muestra en cuanto a franelas
function inicio(){
	// Eventos y acciones iniciales
	window.onkeydown=teclado;
	document.querySelector(".camiseta").
	insertAdjacentHTML("beforeend", `<img  id="dibujo" src="img/${camisetas[camisetaActual]}">`);
	document.querySelector("#dibujo").onclick= cambiarCamiseta;
	document.querySelector(".imagen").innerHTML= `<img  id="rey" src="img/${reyes[reyActual]}.png">`;
	document.querySelector("#rey").onclick= cambiarRey;
	let reyConMayuculas= reyes[reyActual].substring(0,1).toUpperCase() + reyes[reyActual].substring(1).toLowerCase();
	document.querySelector(".texto").innerHTML= `I ♡ ${reyConMayuculas}`;
}

//Funciones del teclado

function teclado(e)
{
	let longitud=document.querySelector(".texto").innerHTML.length;
	if(longitud>15)
	{
		e.preventDefault();
	}else{
		let codigo= e.key;
		if(codigo=="+")
		{
			if(size<3)
			{
				size+=.1;
			}
			e.preventDefault();
		}

		if(codigo=="-")
			{
				if(size>1)
				{
					size-=.1;
				}
				e.preventDefault();
			}
		document.querySelector(".texto").style.fontSize=size+"em"; 
	}
}
//Este permite cambiar la imagen 
function cambiarCamiseta(){
	camisetaActual= Number(!camisetaActual) ;
	document.querySelector("#dibujo").src=`img/${camisetas[camisetaActual]}`;
}
//Este permite cambiar la imagen de la camisa
function cambiarRey(){
	reyActual++;
	if(reyActual>=reyes.length)
	{
		reyActual=0;
	}
	document.querySelector("#rey").src=`img/${reyes[reyActual]}.png`;
}

function evitarLaAccionPorDefecto(e){
	// Cuando queremos que no se ejecute una acción automática (como ir a una URL al hacer clic en un enlace <a> o escribir en un DIV o INPUT al pulsar una tecla)
	e.prevenDefault();
}

function evitarPropagacion(){
	// Al leer stopPropagation() se corta la ejecución de cualquier otra función que estuviese en cola esperando para ser ejecutada a continuación
	event.stopPropagation();
}

function imprimir(){
	// Imprime lo que haya en pantalla en ese momento. Si sólo se desea que imprima unos elementos y no otros o personalizar lo que se envía a la impresora, se debería utilizar en conjunción con mediaqueries (@media print) de CSS.
	window.print();
}