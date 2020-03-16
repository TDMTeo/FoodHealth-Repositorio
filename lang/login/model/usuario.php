<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../../Chef/assets/img/favicon.png"/>
  <link rel="stylesheet" href="../../../Chef/assets/css/sweetalert2.min.css">
  <script src="../../../Chef/assets/css/sweetalert2.all.min.js"></script>
  <script src="../../../Chef/assets/css/sweetalert2.min.js"></script>
</head>
</html>
<?php

  
  require_once('conexion.php');
  

class Usuario extends Conexion
  {

    public function login($user, $clave)
    {
      /*
        Antes que nada :v para los que no saben que es parent
        lo que estamos haciendo es llamar un metodo de una clase
        heredada es decir al yo colocar parent::conectar, lo que hago es
        llamar al metodo conectar de la clase patiente en este caso conexion xd
        espero haber sido claro :v continuemos
      */


      # Nos conectamos a la base de datos
      parent::conectar();

      /*
        Lo segundo que debemos hacer es filtrar la informacion que el usuario
        ingresa, recuerda nunca debes confiar en los datos que el usuario
        envia, asi que teniendo eso en cuenta usaremos unos metodos de la clase conexion
        que ayudaran a realizar los filtros necesarios
      */

      // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);

      // Si necesitas filtrar las mayusculas y los acentos habilita las lineas 36 y 37 recuerda que en la base de datos debe estar filtrado tambien para una validacion correcta
      /*$user  = parent::filtrar($user);
      $clave = parent::filtrar($clave);*/

      /*
        Para la validación del usuario podemos hacer dos cosas,
        validar que exista el email solamente y mostrar error en caso
        de que no, o validar ambos campos y mostrar un unico error,
        en este caso validare el usuario con ambos campos, si necesitas ayuda
        para hacer la filtracion 1 me puedes escribir o enviarme un email a codigoadsi@gmail.com
      */

      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
      $consulta = 'SELECT idUsuario,  Usuario, Correo, Clave, Perfil FROM usuarios WHERE correo = "'.$user.'" AND Clave=MD5("'.$clave.'")';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario  > 0){

        /* Bien ahora a jugar un poco :v */

        /*
          Realizamos la misma consulta de la linea 55 pero esta ves transformaremos el resultado en un arreglo,
          ten mucho cuidado con usar el metodo consultaArreglo ya que devuelve un arreglo de la primera fila encontrada
          es decir, como nosotros solo validamos a un usuario no hay problema pero esta funcion no funciona si
          vas a listar a los usuarios, espero que me entiendan xd
        */

        $user = parent::consultaArreglo($consulta);

        /*
          Bien espero ser un poco claro en esta parte, la variable user
          en la linea 69 pasa a ser un arreglo con los campos consultados en la linea
          48, entonces para acceder a los datos utilizamos $user[nombre_del_campo] Ok?
          bueno hagamos el ejercicio.
        */

        /*
          Inicializamos la sessión | Recuerda con las variables de sesión
          podemos acceder a la informacion desde cualquiera pagina siempre y cuando
          exista una sesión y ademas utilicemos el codigo de la linea 84
        */

        session_start();

        /*
          Las variables de sesion son muy faciles de usar, es como
          declarar una variable, lo unico diferente es que obligatoria mente
          debes usar $_SESSION[] y .... el nombre de la variable ya no sera asi
          $miVariable sino entre comillas dentro del arreglo de sesion, haber me
          dejo explicar, $_SESSION['miVariable'], recuerda que como declares la variable
          en este archivo asi mismo lo llamaras en los demas.
        */

        $_SESSION['idUsuario'] = $user['idUsuario'];
        $_SESSION['Perfil']  = $user['Perfil'];
        /*
          Que porqué almacenamos cargo? es encillo en nuestros proyectos
          pueden existir archivos que solo puede ver un usuario con el cargo de
          administrador y no un usuario estandar, asi que la variable global de
          sesion nos ayudara a verificar el cargo del usuario que ha iniciado sesion
          Ok?
        */

        /*
          Recuerda:
          cargo con valor: 1 es: Administrador
          cargo con valor: 2 es: Cliente
          cargo con valor: 3 es: Nutricionista
          cargo con valor: 4 es: Chef
          cargo con valor: 5 es: Cocinero
          cargo con valor: 6 es: Jefe Domiciliario
          cargo con valor: 7 es: Domiciliario

        */

        // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
        if($_SESSION['Perfil'] == 1){
          echo('<script>window.location="../../../Administrador/"</script>');
        }else if($_SESSION['Perfil'] == 2){
          echo('<script>window.location="../../../Cliente/"</script>');
        }else if($_SESSION['Perfil'] == 3){
          echo('<script>window.location="../../../Nutricionista/"</script>');
        }else if($_SESSION['Perfil'] == 4){
          echo('<script>window.location="../../../Chef/"</script>');
        }else if($_SESSION['Perfil'] == 5){
          echo('<script>window.location="../../../Cocinero/"</script>');
        }else if($_SESSION['Perfil'] == 6){
          echo('<script>window.location="../../../Logistica/"</script>');
        }else if($_SESSION['Perfil'] == 7){
          echo('<script>window.location="../../../Domiciliario/"</script>');
        }
        
        // u.u finalizamos aqui :v

      }else{
        // El usuario y la clave son incorrectos
       echo "<script>
              Swal.fire({
                icon: 'error',
                title: '<strong><h2> Error </h2></strong>',
                html: '<h5> El usuario y la clave no coinciden  </h5>',
                width: 400,
                type: 'success',
                padding: '3em',
                timer: 3000,
                showConfirmButton: false
                
              }).then(function() {
                window.location = '../../login.html';
            });

              </script>";
      }


      # Cerramos la conexion
      parent::cerrar();
    }

    public function registroUsuario($name, $telefono, $email, $direccion, $registrado, $clave)
    {
      parent::conectar();

      $name  = parent::filtrar($name);
      $telefono  = parent::filtrar($telefono);
      $email = parent::filtrar($email);
      $direccion  = parent::filtrar($direccion);
      $registrado  = parent::filtrar($registrado);
      $clave = parent::filtrar($clave);


      // validar que el correo no exito
      $verificarCorreo = parent::verificarRegistros('select id from usuarios where email="'.$email.'" ');


      if($verificarCorreo > 0){
        echo 'error_3';
      }else{

        parent::query('insert into usuarios(nombre, telefono, email, direccion, registrado,fechacancel, clave, cargo, estado) values("'.$name.'", "'.$telefono.'", "'.$email.'", "'.$direccion.'",
         "'.$registrado.'", "2020-12-31", MD5("'.$clave.'"), 2, 1)');

        session_start();

        $_SESSION['nombre'] = $name;
        $_SESSION['cargo']  = 2;
        $_SESSION['estado']  = 1;
        $_SESSION['fechacancel']  = "2020-12-31";

        echo '../students/';

      }

      parent::cerrar();
    }

  }


?>
