<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Chef/assets/img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="../Chef/assets/css/sweetalert2.all.min.js"></script>
	<script src="../Chef/assets/css/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Chef/assets/css/sweetalert2.min.css">
<!--===============================================================================================-->
</head>
</html>
<?php  
include "login/model/conn.php";
if(isset($_POST['input']) ){
 
          $si = $_POST['si'];
          if ($si == 1) {
            $dat = mysqli_real_escape_string($conn,(strip_tags($_POST['date'], ENT_QUOTES)));
          $tim = mysqli_real_escape_string($conn,(strip_tags($_POST['time'], ENT_QUOTES)));
          $nutr = mysqli_real_escape_string($conn,(strip_tags($_POST['nutri'], ENT_QUOTES)));
          $sed = mysqli_real_escape_string($conn,(strip_tags($_POST['sede'], ENT_QUOTES)));

          $nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
                $apellido = mysqli_real_escape_string($conn,(strip_tags($_POST['apellido'], ENT_QUOTES)));
                $telefono = $_POST['telefono'];
                $email = mysqli_real_escape_string($conn,(strip_tags($_POST['email'], ENT_QUOTES)));
                $ocupacion  = $_POST['ocupacion'];
                $tipodocumento  = $_POST['tipo'];
                $documento  = mysqli_real_escape_string($conn,(strip_tags($_POST['documento'], ENT_QUOTES)));
                $direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
                $username  = mysqli_real_escape_string($conn,(strip_tags($_POST['username'], ENT_QUOTES)));
                $clave  = mysqli_real_escape_string($conn,(strip_tags($_POST['clave'], ENT_QUOTES)));
                $clave2  = mysqli_real_escape_string($conn,(strip_tags($_POST['Cclave'], ENT_QUOTES)));
               
               
                    $insert1 = mysqli_query($conn, "INSERT INTO usuarios(Usuario, Correo, Clave, Perfil)
                    VALUES('$username', '$email', md5('$clave'),2)") or die(mysqli_error());
                    if($insert1){

                         $query = mysqli_query($conn, "SELECT * FROM usuarios where Usuario = '$username'");
                         $row = mysqli_fetch_array($query);

                         $id = $row['idUsuario'];

                         $insert = mysqli_query($conn, "INSERT INTO cliente(nombre, apellido, celular, correo, ocupacion, idTipoDocumento, documento,direccion, idUsuario)
                           VALUES('$nombre', '$apellido', '$telefono',  '$email', '$ocupacion', 
                           '$tipodocumento', '$documento','$direccion', '$id')") or die(mysqli_error());

                         if($insert){
                          $queryCliente = mysqli_query($conn, "SELECT * FROM cliente where nombre = '$nombre'");
                         $rowCliente = mysqli_fetch_array($queryCliente);

                         $ll = $rowCliente['idCliente'];


                         $insertCita = mysqli_query($conn, "INSERT INTO cita(idCita, idCliente, fecha, hora, estado, idNutricionista, idTipoCita, idSede)
                           VALUES(NULL, '$ll', '$dat', '$tim', 1, '$nutr', 1, '$sed')") or die(mysqli_error());

                           if($insertCita){
                              echo "<script>
                              Swal.fire(
                              'Usuario Registrado!',
                              'click en ok para continuar',
                              'success'
                            ).then(function() {
                                window.location = '../Cliente/';
                            });

                              </script>";
                        
                          }else{
                           echo "<script>
                              Swal.fire(
                              'Usuario no Registrado!',
                              'click en ok para continuar',
                              'error'
                            ).then(function() {
                                window.location = '../Cliente/';
                            });

                              </script>";
                          }
       
         }
       }
          }else{
           $nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
                $apellido = mysqli_real_escape_string($conn,(strip_tags($_POST['apellido'], ENT_QUOTES)));
                $telefono = $_POST['telefono'];
                $email = mysqli_real_escape_string($conn,(strip_tags($_POST['email'], ENT_QUOTES)));
                $ocupacion  = $_POST['ocupacion'];
                $tipodocumento  = $_POST['tipo'];
                $documento  = mysqli_real_escape_string($conn,(strip_tags($_POST['documento'], ENT_QUOTES)));
                $direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
                $username  = mysqli_real_escape_string($conn,(strip_tags($_POST['username'], ENT_QUOTES)));
                $clave  = mysqli_real_escape_string($conn,(strip_tags($_POST['clave'], ENT_QUOTES)));
                $clave2  = mysqli_real_escape_string($conn,(strip_tags($_POST['Cclave'], ENT_QUOTES)));
               
               
                    $insert1 = mysqli_query($conn, "INSERT INTO usuarios(Usuario, Correo, Clave, Perfil)
                    VALUES('$username', '$email', md5('$clave'),2)") or die(mysqli_error());
                    if($insert1){

                         $query = mysqli_query($conn, "SELECT * FROM usuarios where Usuario = '$username'");
                         $row = mysqli_fetch_array($query);

                         $id = $row['idUsuario'];

                         $insert = mysqli_query($conn, "INSERT INTO cliente(nombre, apellido, celular, correo, ocupacion, idTipoDocumento, documento,direccion, idUsuario)
                           VALUES('$nombre', '$apellido', '$telefono',  '$email', '$ocupacion', 
                           '$tipodocumento', '$documento','$direccion', '$id')") or die(mysqli_error());

                         if($insert){
                         
                              echo "<script>
                              Swal.fire(
                              'Usuario Registrado!',
                              'click en ok para continuar',
                              'success'
                            ).then(function() {
                                window.location = '../lang/login.html';
                            });

                              </script>";
                        
                          }else{
                           echo "<script>
                              Swal.fire(
                              'Usuario no Registrado!',
                              'click en ok para continuar',
                              'error'
                            ).then(function() {
                                window.location = '../lang/login.html';
                            });

                              </script>";
                          }
       
         }
       }
          }
  			

          
   

?>