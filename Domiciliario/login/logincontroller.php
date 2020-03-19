<?php

  # Leemos las variables enviadas mediante Ajax
  $user = $_POST['usuario'];
  $clave = $_POST['clave'];

  # Verificamos que los campos no esten vacios, el chiste de este if es que si almenos una variable (o campo) esta vacio mostrara error_1
  if(empty($user) || empty($clave)){

    # mostramos la respuesta de php (echo)
    echo 'NO PUEDEN IR VACIOS';

  } else if (strlen($clave) < 6){

    echo 'CLAVE MUY CORTA';

  } else{

    # Incluimos la clase usuario
    require_once('login.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

    # Llamamos al metodo login para validar los datos en la base de datos
    $usuario -> login($user, $clave);

    

  }


?>
