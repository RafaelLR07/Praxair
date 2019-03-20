// Registro paciente 



function mayus(e) {
  e.value=  e.value.toUpperCase();
}

function valida_pac_reg(){
  $('.alert').remove();
  let valor1 = $('#cedula').val();
  
  console.log(valor1);
  
  let express = new RegExp('([A-Z])'+'([A-Z])'+'([A-Z])'+'([A-Z])'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\/)'+'(\\d)');
  
    if(!express.test(valor1)){
      
      $('#pacii').before('<div class="alert alert-danger"> ' + " La cedula debe cumplir el patron ejem: ASDF123456/7" + ' </div>');
      return false;
    }else{
      return true;
    }


}

function valida_pac(){
  $('.alert').remove();
  let valor1 = $('#cedula').val();
  
  console.log(valor1);
  
  let express = new RegExp('([A-Z])'+'([A-Z])'+'([A-Z])'+'([A-Z])'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\d)'+'(\\/)'+'(\\d)');
  
    if(!express.test(valor1)){
      
      alerta("Debe cumplir el patron ejem: ASDF123456/7");
      return false;
    }else{
      return true;
    }


}

function alerta(texto) {
  $('#div_pac').before('<div class="alert alert-danger"> ' +texto+ ' </div>');
}








/*var abc = '#ddddd';
document.getElementById('test').innerHTML = '<a href="' + abc + '">Link</a>';
ocument.getElementById("Cuerpo").innerHTML = abc;*/
 function abc(esto)
  {
   // lo que tu quieras
   document.getElementById("Cuerpo").innerHTML = 2+2+2+2+2;
   return false;
   
  }

  function mensaje(){
      console.log("adsd");
  }


function  LimpiarPacientes_1(){

   document.getElementById('cedula').value="";
   document.getElementById('Paciente').value="";
   document.getElementById('Nombre').value="";
   document.getElementById('telefono').value="";
   document.getElementById('fecha').value="";
   document.getElementById('edad').value="";
   
 
}

function  LimpiarPacientes_11(){

   document.getElementById('cedula').value="";
   document.getElementById('Paciente').value="";
   document.getElementById('Nombre').value="";
   document.getElementById('telefono').value="";
   document.getElementById('fecha').value="";
   document.getElementById('edad').value="";
   document.getElementById('Paterno').value="";
   document.getElementById('Materno').value="";
   
 
}

function  LimpiarPacientes_22(){

   document.getElementById('Nombre_fav').value="";
   document.getElementById('Parentesco').value="";
   document.getElementById('Email').value="";
   document.getElementById('telefono_fav').value="";
   document.getElementById('Paterno_fav').value="";
   document.getElementById('Materno_fav').value="";
   
 
}


function  LimpiarPacientes_2(){

   document.getElementById('Nombre_fav').value="";
   document.getElementById('Parentesco').value="";
   document.getElementById('Email').value="";
   document.getElementById('telefono_fav').value="";
   
 
}



function  LimpiarPacientes_3(){

   document.getElementById('ciudad').value="";
   document.getElementById('municipio').value="";
   document.getElementById('colonia').value="";
   document.getElementById('cp').value="";
   document.getElementById('calle').value="";
   document.getElementById('calle1').value="";
   document.getElementById('calle2').value="";
   document.getElementById('exterior').value="";
   document.getElementById('interior').value="";
   
 
}

function  limpiar_area(){
   document.getElementById('observaciones').value="";

   
 
}
