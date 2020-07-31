    function modificarI(cod){
      var contra= confirm("¿Estas seguro de querer cambiar el estado del servicio?");
      if(contra==true){
         newwindow=window.open("actesta.php?id="+cod,'name','height=1,width=1');
    }else{
      alert("No se puede proseguir a la siguiente accion.");
    }
  }

    function modificarE(cod){
      var contra= confirm("¿Estas seguro de querer cambiar el estado del lavador?");
      if(contra==true){
         newwindow=window.open("act_esta_l.php?id="+cod,'name','height=1,width=1');
    }else{
      alert("No se puede proseguir a la siguiente accion.");
    }
  }  

     function modificarC(cod,placa){
      var contra= confirm("¿Estas seguro de querer editar este usuario?");
      if(contra==true){
          window.location=("actcliform.php?documento="+cod+"&placa="+placa);
   }else{
      alert("No se puede proseguir a la siguiente accion.");
    }  
  }

   function guardado(){
    var x=document.getElementById("valor").value;
    var y=document.getElementById("ganancias").value;
    var z=document.getElementById("servicios").value;

      var contra= prompt("Ingrese Contraseña:");
      if(contra=="123"){
        alert("Se ha cerrado la caja de hoy");
        newwindow=window.open("guardar_informe.php?valor="+x+"&ganancias="+y+"&servicios="+z);
         window.location=("index.php");

   }else{
      alert("Ingrese la contraseña para continuar");     
    }  
  }

    function modificarl(cod) {
      window.location=("actlavform.php?documento="+cod);
  }

  function upperD(){
    var x=document.getElementById("buscar").value;
    document.getElementById("buscar").value=x.toUpperCase();
  }

  function topnav(){
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
