$('#login').click(function(){

  // Traemos los datos de los inputs
  var user  = $('#user').val();
  var clave = $('#clave').val();

  // Envio de datos mediante Ajax
  $.ajax({
    method: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: 'controller/loginController.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: {user_php: user, clave_php: clave},
    // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
    beforeSend: function(){
      // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
      $('#load').show();
    },
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function(res){
      // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
      $('#load').hide();

      // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
      if(res == 'error_1'){
        //FUNCIONA
        swal('Error', 'Por favor ingrese todos los campos', 'error');
      }else if(res == 'error_2'){
        //FUNCIONA
        swal('Error', 'Por favor ingrese un email valido', 'warning');
      }else if (res == 'error_4'){
        //FUNCIONA
        swal('Error', 'La contraseña debe contener mínimo 6 caracteres', 'warning');
      }
      else if(res == 'error_3'){
        //SE DAÑA AQUÍ
        swal('Error', 'El usuario y contraseña que ingresaste es incorrecto', 'error');
      }
      else{
        // Redireccionamos a la página que diga corresponda el usuario
        window.location.href= res
      }

    }
  });

});


$('#registro').click(function(){

  var form = $('#formulario_registro').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/registroController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        //Funciona
        swal('Error', 'Campos obligatorios, por favor llena todos los campos', 'warning');
      }else if(res == 'error_5'){
        //Funciona
        swal('Error', 'Por favor ingresa un nombre válido', 'warning');
      }else if(res == 'error_9'){
        //Funciona
        swal('Error', 'Por favor ingresa un teléfono válido', 'warning');
      }else if(res == 'error_10'){
        //Funciona
        swal('Error', 'Por favor ingresa una dirección válida', 'warning');
      }else if(res == 'error_4'){
        //Funciona
        swal('Error', 'Por favor ingresa un correo válido', 'warning');
      }else if(res == 'error_6'){
        //Funciona
        swal('Error', 'Las contraseñas deben contener mínimo 6 caracteres', 'warning');
      }
      else if(res == 'error_2'){
        //Funciona
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        //Funciona
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }
       else{ 
        window.location.href = res ;
      }
    }
  });

});