<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../Chef/assets/img/favicon.png"/>
  <link rel="stylesheet" href="../../Chef/assets/css/sweetalert2.min.css">
  <script src="../../Chef/assets/css/sweetalert2.min.js"></script>
</head>
</html>
<?php

  # Leemos las variables enviadas mediante Ajax
  $user = $_POST['usuario'];
  $clave = $_POST['clave'];

  # Verificamos que los campos no esten vacios, el chiste de este if es que si almenos una variable (o campo) esta vacio mostrara error_1
  if(empty($user) || empty($clave)){

    # mostramos la respuesta de php (echo)
     echo "<script>
              Swal.fire({
                icon: 'error',
                title: '<strong><h2> Error </h2></strong>',
                html: '<h5> Los campos no pueden ir vacios  </h5>',
                width: 400,
                type: 'success',
                padding: '3em',
                timer: 3000,
                showConfirmButton: false
                
              }).then(function() {
                window.location = './';
            });

              </script>";

  } else if (strlen($clave) < 6){

     echo "<script>
              Swal.fire({
                icon: 'error',
                title: '<strong><h2> Error </h2></strong>',
                html: '<h5> La clave debe tener mínimo 6 caracteres  </h5>',
                width: 400,
                type: 'success',
                padding: '3em',
                timer: 3000,
                showConfirmButton: false
                
              }).then(function() {
                window.location = './';
            });

              </script>";

  } else{

    # Incluimos la clase usuario
    require_once('../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

    # Llamamos al metodo login para validar los datos en la base de datos
    $usuario -> login($user, $clave);

    

  }


?>
