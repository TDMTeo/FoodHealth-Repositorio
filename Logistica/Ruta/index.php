<?php
session_start();
if(!isset($_SESSION['Perfil'])) 
{
  header('Location: ../../');  
}
?>
<?php 
include_once "conexion.php";
$sentencia = $base_de_datos->query("SELECT Ruta.idRuta, ruta.idDomiciliario, ruta.Tiempo_Aproximado, GROUP_CONCAT(Pedido.idPedido,'..', pedido.CodigoQR, '..', estado.Estado SEPARATOR '__') AS pedido 

  FROM ruta INNER JOIN domiciliario ON domiciliario.idDomiciliario = ruta.idDomiciliario INNER JOIN pedido ON pedido.idRuta = ruta.idRuta INNER JOIN estado ON estado.idEstado = pedido.idEstado GROUP BY ruta.idRuta ORDER BY ruta.idRuta;");

$Ruta = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<head>
  <title>Rutas </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">  

  <link rel="stylesheet" href="plugins/animate.css/animate.css">  
  <link rel="stylesheet" type="text/css" href="../assets/css/Estilo.css">
  <link rel="shortcut icon" type="image/x-icon" href="../img/ruta.png">
  <script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../plugins/sweetAlert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white">
      <div class="logo">
        <a href="../index.php" class="simple-text logo-mini">
          FoodHealth
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../index.php">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Domiciliarios.php">
              <i class="material-icons">directions_run</i>
              <p>Domiciliarios</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">directions_bike</i>
              <p>Ruta</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Pedidos.php">
              <i class="material-icons">fastfood</i>
              <p>Pedidos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../CodigoQR/">
              <i class="material-icons">blur_linear</i>
              <p>Generar QR</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Ruta</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end"> 
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">1</span>
                  <p class="d-lg-none d-md-block">
                    Notificaciones 
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="Pedidos.php">Se ha cambiado de estado del pedido</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Cuenta
                  </p>
                </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="../Perfil.php">Perfil</a>
                  <a class="dropdown-item" href="../Perfil/Editar.php">Configurar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../cerrarsesion.php">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <?php
          if(isset($_GET["status"]))
          {
            if($_GET["status"] === "1")
            {
              ?>
              <?php
                  echo "<script>
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ruta desactivada correctamente',
                    showConfirmButton: true,
                    confirmButtonColor: 'green',
                    
                  })
                  </script>" ?>
              <?php
            }else if($_GET["status"] === "2")
            {
              ?>
              <?php
                  echo "<script>
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ruta creada correctamente',
                    showConfirmButton: true,
                    confirmButtonColor: 'green',
                    
                  })
                  </script>" ?>
              <?php
            }
          }
              ?>
         
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Rutas </h4>
                  <div class="pull-right">
                    <a style="background: white; color: black" href="./addRuta.php" class="btn btn-primary"><i class="material-icons">add</i></a> 
                  </div>
                  <p class="card-category"> Historial de rutas </p>
                </div>
                <br>
                <table id="lookup" class="table">
                  <div class="table-responsive">
                    <thead  class=" text-primary">
                      <th>#</th>
                      <th>Domiciliario</th>
                      <th>Tiempo_Aproximado</th>
                      <th>Pedidos</th>
                      <th>Deshabilitar</th>
                    </thead>
                    <tbody>
                      <?php foreach($Ruta as $Ruta){ ?>
                        <th><?php echo $Ruta->idRuta ?></th>
                        <th><?php echo $Ruta->idDomiciliario ?></th>
                        <th><?php echo $Ruta->Tiempo_Aproximado ?></th>
                        <td>
                          <table id="lookup" class="table">
                            <thead  class="text-primary">
                              <tr>
                                <th>Código</th>
                                <th>Código QR</th>
                                <th>Estado</th> 
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach(explode("__", $Ruta->pedido) as $RutaConcatenada){ 
                                $Route = explode("..", $RutaConcatenada)
                                ?>
                                <tr>
                                  <td><?php echo $Route[0] ?></td>
                                  <td><IMG SRC="../CodigoQR/<?php echo $Route[1] ?>" width="100px" height="100px>"></td>
                                  <td><?php echo $Route[2] ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </td>
                        <td><a class="btn btn-danger" href="<?php echo "deleteFood.php?idAlimento=" . $Ruta->idAlimento?>"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  FoodHealth
                </a>
              </li>
            </ul>
          </nav>
          <!-- your footer here -->
          
        </div>
      </footer>
    </div>
  </div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Mplugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
<!--<script>
              $(document).ready(function() {
               md.showNotification("No hay pedidos con codigo QR","top","left");
            });
          </script>
-->
<?php 
  if (isset($_POST["mensaje"])) {
    if($_POST["mensaje"] === "1") {
      echo '<script>
              $(document).ready(function() {
               md.showNotification("warning","info","Verifique que los pedidos tengan su QR y/o Estado Correspondiente",100,"bottom","right");
            });
          </script>';
    }
    
  }


 ?>

        

  
</body>

</html>