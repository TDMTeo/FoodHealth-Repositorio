<?php
  session_start();
  if(isset($_SESSION['Perfil'])) 
    {
         if($_SESSION['Perfil'] == 1){
          echo('<script>window.location="../Logistica/Administrador.php"</script>');
        }else if($_SESSION['Perfil'] == 2){
           echo('<script>window.location="../Logistica/Domiciliarios.html"</script>');
        }else if($_SESSION['Perfil'] == 3){
          echo('nutricionista.php');
        }
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Iniciar Sesion</title>
  </head>
  <body style="background-image: url(../img/banner/banner2.png);">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <form method="POST" action="logincontroller.php">
      <div style="margin-right: 350px; margin-left: 350px; margin-top: 50px;">
          <h1 style="color: #fff">Iniciar Sesion</h1>
  <div class="form-group">
    <label for="exampleInputUser1" style="color: #fff">Usuario</label>
    <input type="text" id="usuario" name="usuario" class="form-control" id="exampleInputUser1" placeholder="Usuario" required="" minlength="5"  maxlength="20">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color: #fff">Clave</label>
    <input type="password" id="clave" name="clave" class="form-control" id="exampleInputPassword1" placeholder="Clave" required="" minlength="10" maxlength="60">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar</button>
    <a type="submit" href="../" class="btn btn-primary">Volver</a>
    </div>
</form>



  </body>
</html>