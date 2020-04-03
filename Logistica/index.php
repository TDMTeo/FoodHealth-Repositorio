<?php
  session_start();
  if(!isset($_SESSION['Perfil'])) 
    {
        header('Location: ../');  
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Jefe de logística</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">  
      
  <link rel="stylesheet" href="plugins/animate.css/animate.css">  
  <link rel="stylesheet" type="text/css" href="assets/css/Estilo.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/admin.png">
  <script src="assets/js/core/jquery.min.js"></script>
  <script>
        $(document).ready(function (){
          $('.view').on('click', function(event){
              var id = 2;
              $.ajax({
                type:"POST",
                url:"index.php",
                data:{id:id},
                success: function(data){
                      $('#Notificacion').modal('show');
                      $div = $(this).closest('div');
                      $('#id').val(event.target.attributes[2].value);
                      $('#asunto').val(event.target.text.trim());
                      $('#mensaje').val(event.target.attributes[3].value);
                  }
                });
          });
        });
      </script>
</head>
  <?php include("php/conexion.php");
  ?>  

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white">
      <div class="logo">
        <a href="index.php" class="simple-text logo-mini">
          FoodHealth
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active   ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Domiciliarios.php">
              <i class="material-icons">directions_run</i>
              <p>Domiciliarios</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Ruta/">
              <i class="material-icons">directions_bike</i>
              <p>Ruta</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="Pedidos.php">
              <i class="material-icons">fastfood</i>
              <p>Pedidos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="CodigoQR/">
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
            <a class="navbar-brand" href="javascript:;">Inicio</a>
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
                  <span class="notification">
                       <?php 

                     $idUsuario = $_SESSION['idUsuario'];

                     $consulta = mysqli_query($conectar,'SELECT COUNT(id) as "Cantidad" from notificaciones where para = '.$idUsuario.' and leido = "no"');

                     $notificaciones = mysqli_fetch_array($consulta);
                     $cantidad = $notificaciones["Cantidad"];

                     echo $cantidad;
                   ?>
                  </span>
                  <p class="d-lg-none d-md-block">
                    Notificaciones 
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php
                 $no_leidos = "SELECT * from notificaciones where para = ".$idUsuario." and leido = 'no' ORDER BY id DESC LIMIT 4";
                  $leido = mysqli_query($conectar, $no_leidos);
                  while ($notificaciones = mysqli_fetch_array($leido)) {
                    ?>
                     <a class="dropdown-item view" href="#" id="<?php echo $notificaciones['id']?>" descripcion="<?php echo $notificaciones['mensaje']?>">
                       <?php echo $notificaciones['asunto'] ?>
                      </a>        
               <?php } ?>
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
                  <a class="dropdown-item" href="Perfil.php">Perfil</a>
                  <a class="dropdown-item" href="Perfil/Editar.php">Configurar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="cerrarsesion.php">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Rutas</h4>
                  <p class="card-category">Este es el historial de las rutas </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Domiciliario</th>
                          <th>Tiempo Aproximado</th>
                          <th>Tiempo Estimado</th>
                          <th>Codigo QR</th>
                          <th>Direccion Predeterminada</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select nombres, Tiempo_Aproximado, Tiempo_Estimado, CodigoQR, DireccionPredeterminada,Estado.Estado 
                          from domiciliario, ruta, pedido, estado
                          where domiciliario.idDomiciliario = ruta.idDomiciliario and ruta.idRuta = pedido.idRuta and pedido.idEstado = estado.idEstado";
                        $tabla = mysqli_query($conectar, $query);

                        while ($fila = mysqli_fetch_array($tabla)) {?>
                          <tr>
                            <td><?php echo $fila['nombres']?></td>
                            <td><?php echo $fila['Tiempo_Aproximado']?></td>
                            <td><?php echo $fila['Tiempo_Estimado']?></td>
                            <td><?php 
                            if ($fila['CodigoQR']== "") {
                              echo $fila['CodigoQR'];
                            }else{
                              echo '<IMG SRC="CodigoQR/'.$fila['CodigoQR'].'" width="100px" height="100px>"';
                            }
                           ?></td>
                            <td><?php echo $fila['DireccionPredeterminada']?></td>
                            <td><?php echo $fila['Estado']?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
              <!-------------------------------------------------- Modal para editar estado ------------------------------------------------------>
        <div class="modal fade" id="Notificacion" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Notificacion </h5>
                </div>
                  <div class="card-body">
                    <form action="Notificaciones/leido.php" method="POST">
                   <h2><?php /*
                      $Usuario = $_POST['id'];
                      echo $Usuario;
                       */?></h2> 
                 <div class="modal-body">
                            <div class="form-group">
                              <label></label>
                              <input type="hidden" class="form-control" name="id" id="id" value="id" required>
                              <input type="text" class="form-control" name="asunto" id="asunto" value="asunto" required>
                              <input type="text" class="form-control" name="mensaje" id="mensaje" value="mensaje" required>
                            </div>
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Asunto</label>
                            <div class="tim-typo">
                              <p>
                            
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-3" style="margin-left: -55px">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <div class="tim-typo">
                              <p>

                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <div class="tim-typo">
                              <p>

                              </p>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary" name="Cerrar" value="Cerrar">Cerrar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-----------------------------------------------------Modal para editar estado ------------------------------------------------------->
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

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>

      <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       md.showNotification("success","done","Se ha leido la notificacion",100,"bottom","right");
                    });
                  </script>';

            } 
          if($_POST["mensaje"] === "2") {
              echo '<script>
                      $(document).ready(function() {
                       md.showNotification("success","done_all","Se ha modificado correctamente",100,"bottom","right");
                    });
                  </script>';
            }
          if($_POST["mensaje"] === "3") {
              echo '<script>
                      $(document).ready(function() {
                       md.showNotification("success","done_all","Se ha deshabilitado correctamente",100,"bottom","right");
                    });
                  </script>';
            } 
          }
         ?>

</body>

</html>