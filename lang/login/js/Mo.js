function registro() {
     var user = document.getElementById("username");
     var clave = document.getElementById("clave");
     var clave2 = document.getElementById("Cclave");
 
    if (!user.value) {
    	 user.focus();
    	 Swal.fire(
         'Error',
         'El campo Username es requerido.',
         'error'
       ); 
       return false;

    }else if (!clave.value) {
    	 Swal.fire(
         'Error',
         'El campo Clave es requerido.',
         'error'
       );
       return false;
    	 
      }else  if ((clave.value).length <5 || (clave.length) >25) {
      	clave.focus();
        	Swal.fire(
         'Error',
         'La clave debe tener una longitud entre 5 y 25 caracteres.',
         'error'
       ); 
          return false;
     } 
    else if (!clave2.value) {
    	clave2.focus();
    	 Swal.fire(
         'Error',
         'El campo Confirmacion es requerido.',
         'error'
       ); 
       return false;
    	
    }else  if (clave.value != clave2.value) {
    	clave2.focus();
    	 	 Swal.fire(
             'Error',
             'La clave y la confirmacion no son iguales.',
            'error'
         ); 
         return false;
    }else{
    	document.getElementById('div1').style.display="none";
	    document.getElementById('div2').style.display="block";
      return false;
    }
}
function registro2() {
	  var expRegNombre=/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
  var expRegApellidos=/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
  var expRegCorreo=/^\w+@(\w+\.)+\w{2,4}$/; 
	 var name = document.getElementById("nombre");
	 var apellido = document.getElementById("apellido");
	 var telefono = document.getElementById("telefono");
	 var email = document.getElementById("email");
    if (!name.value) {
    	name.focus();
    	 Swal.fire(
         'Error',
         'El campo Nombre es requerido.',
         'error'
       ); 
       return false;
    }else if (!expRegNombre.exec(name.value)){
       name.focus();
    	 Swal.fire(
         'Error',
         'El campo Nombre no esta en el formato correcto.',
         'error'
       ); 
       return false;
     }else if (!apellido.value) {
    	apellido.focus();
    	 Swal.fire(
         'Error',
         'El campo Apellido es requerido.',
         'error'
       ); 
       return false;
    }else if (!expRegApellidos.exec(apellido.value)){
       apellido.focus();
    	 Swal.fire(
         'Error',
         'El campo Apellido no esta en el formato correcto.',
         'error'
       ); 
       return false;
     }else if (!telefono.value) {
    	telefono.focus();
    	 Swal.fire(
         'Error',
         'El campo Teléfono es requerido.',
         'error'
       ); 
       return false;
    }else if ((telefono.value).length <10 ||(telefono.value).length > 15 ) {
    	telefono.focus();
    	 Swal.fire(
         'Error',
         'El campo Teléfono debe estar entre 9 y 15 numeros.',
         'error'
       ); 
       return false;
    }else if (!email.value) {
    	email.focus();
    	 Swal.fire(
         'Error',
         'El campo Email es requerido: example@gmail.com',
         'error'
       ); 
       return false;
    }else if (!expRegCorreo.exec(email.value)){
       email.focus();
    	 Swal.fire(
         'Error',
         'El campo Email no esta en el formato correcto.',
         'error'
       ); 
       return false;
     }else{
	document.getElementById('div2').style.display="none";
	document.getElementById('div3').style.display="block";
  return false;
	}
}
function registrofinal() {
     var documento = document.getElementById("documento");
     var direccion = document.getElementById("direccion");
 
    if (!documento.value) {
    	 documento.focus();
    	 Swal.fire(
         'Error',
         'El campo Documento es requerido.',
         'error'
       ); 
    	return false;


    }else if ((documento.value).length  <9 || (documento.value).length > 10 ) {
    	documento.focus();
    	 Swal.fire(
         'Error',
         'El campo Documento debe tener 9 o 10 numeros.',
         'error'
       ); 
    	return false;

    }else if (!direccion.value) {
    	direccion.focus();
    	 Swal.fire(
         'Error',
         'El campo Direccion es requerido.',
         'error'
       ); 
    	return false;
    	
    }else{
        return true;
    }
}

function registroCita(){
   var nombreC = document.getElementById("nombreC");
   var apellido = document.getElementById("apellidoC");
   var sede = document.getElementById("sede");
   var date = document.getElementById("date");
   var time = document.getElementById("time");
   var nutri = document.getElementById("nutri");

   if (!nombreC.value) {
    nombreC.focus();
         Swal.fire(
         'Error',
         'El campo Nombre es requerido.',
         'error'
       ); 
        return false;
        
   }else{
     
    return true;
        

   }
}

function validarLogin(){
  var user = document.getElementById("usuario");
  var pass = document.getElementById("clave");

  if (!user.value) {
       user.focus();
       Swal.fire(
         'Error',
         'El campo Email es requerido.',
         'error'
       ); 
       return false;

    }else if (!pass.value) {
       Swal.fire(
         'Error',
         'El campo Clave es requerido.',
         'error'
       );
       return false;
       
      }else  if ((pass.value).length <5 || (pass.length) >25) {
        pass.focus();
          Swal.fire(
         'Error',
         'La clave debe tener una longitud entre 5 y 25 caracteres.',
         'error'
       ); 
          return false;
     } else{
      return true;
     }
}