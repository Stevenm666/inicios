
function prueba(x)
{
	
	if(x==4)
	{
		var valor="AMARILLO";
		document.getElementById("color").value=valor;
	}

}

function upperN() {	
  var text = document.getElementById("nombre").value;
  document.getElementById("nombre").value = text.toUpperCase();
 }

function upperT() { 
  var text = document.getElementById("tipovehi").value;
  document.getElementById("tipovehi").value = text.toUpperCase();
 }

function upperA() {
  var text = document.getElementById("apellido").value;
  document.getElementById("apellido").value = text.toUpperCase();
  } 

function upperM() {
  var text = document.getElementById("marca").value;
  document.getElementById("marca").value = text.toUpperCase();
  }

function upperC() {
  var text = document.getElementById("color").value;
  document.getElementById("color").value = text.toUpperCase();
  } 

function upperP() {
  var text = document.getElementById("placa").value;
  document.getElementById("placa").value = text.toUpperCase();
  } 

function upperD() {
  var text = document.getElementById("direc").value;
  document.getElementById("direc").value = text.toUpperCase();
  }

function upperB(){
  var text= document.getElementById("buscar").value;
  document.getElementById("buscar").value= text.toUpperCase();
} 