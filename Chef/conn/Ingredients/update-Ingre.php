 <?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
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
   <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <link rel="stylesheet" href="../../assets/css/sweetalert2.min.css">
   <script src="../../assets/css/sweetalert2.all.min.js"></script>
   <script src="../../assets/css/sweetalert2.min.js"></script>
  <title>Chef</title>
</head>
</html>
<?php
include "../conn.php";
if(isset($_POST['update'])){
				$id = intval($_POST['id']);
                $nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
                $cantidad   = mysqli_real_escape_string($conn,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
                $colesterol   = mysqli_real_escape_string($conn,(strip_tags($_POST['colesterol'], ENT_QUOTES)));
                $calorias      = mysqli_real_escape_string($conn,(strip_tags($_POST['calorias'], ENT_QUOTES)));
                $grasa  = mysqli_real_escape_string($conn,(strip_tags($_POST['grasa'], ENT_QUOTES)));
                $azucar  = mysqli_real_escape_string($conn,(strip_tags($_POST['azucar'], ENT_QUOTES)));
                $carbohidratos  = mysqli_real_escape_string($conn,(strip_tags($_POST['carbohidratos'], ENT_QUOTES)));
                $exis  = mysqli_real_escape_string($conn,(strip_tags($_POST['exis'], ENT_QUOTES)));
				
				$update = mysqli_query($conn, "UPDATE ingredientes SET nombre='$nombre',cantidad='$cantidad', colesterol='$colesterol', calorias='$calorias', grasa='$grasa', azucar='$azucar', carbohidratos='$carbohidratos', exis= '$exis'  WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>
                              Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Ingrediente modificado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 2000,
                                showConfirmButton: false
                                
                              }).then(function() {
                                window.location = '../../ingredients.php';
                            });

                              </script>";
				}else{
					echo "<script>
                          Swal.fire({
                            icon: 'error',
                            title: '<strong><h2> Error </h2></strong>',
                            html: '<h5> Error al modificar el ingrediente </h5>',
                            type: 'success',
                            padding: '3em',
                            timer: 2000,
                            showConfirmButton: false
                            
                          }).then(function() {
                            window.location = '../../ingredients.php';
                        });

                          </script>";
				}
			}
  ?>