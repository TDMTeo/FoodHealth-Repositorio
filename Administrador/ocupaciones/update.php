<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 1){
    session_destroy();
    header('location: ../../');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="../../Chef/assets/img/favicon.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <title>Administrador</title>
</head>
</html>
<?php
include "../../Chef/conn/conn.php";
if(isset($_POST['update'])){
				$id = intval($_POST['id']);
                $nombre  = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
                if(isset($_POST['estado'])){
                  $estado  = $_POST['estado'];
                  $estado = "1";
                } else {
                  $estado = "0";
                }
                
				
				$update = mysqli_query($conn, "UPDATE  ocupacion SET nombre='$nombre', estado='$estado' 
          WHERE  idOcupacion='$id'") or die(mysqli_error());
				if($update){
					echo "<script>
                              Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Modificado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 2000,
                                showConfirmButton: false
                                
                              }).then(function() {
                                window.location = '../ocupaciones/';
                            });

                              </script>";
				}else{
					echo "<script>
                          Swal.fire({
                            icon: 'error',
                            title: '<strong><h2> Error </h2></strong>',
                            html: '<h5> Error al modificar </h5>',
                            type: 'success',
                            padding: '3em',
                            timer: 2000,
                            showConfirmButton: false
                            
                          }).then(function() {
                            window.location = '../ocupaciones/';
                        });

                          </script>";
				}
			}
  ?>