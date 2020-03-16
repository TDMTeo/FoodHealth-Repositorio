<?php
session_start();
if(!isset($_SESSION['Perfil'])) 
{
  header('Location: ../../');  
}
?>
<?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
?>
<?php include "../php/Conexion.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <title>Agregar ruta</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">  

  <link rel="stylesheet" href="plugins/animate.css/animate.css">  
  <link rel="stylesheet" type="text/css" href="../assets/css/Estilo.css">
  <link rel="shortcut icon" type="image/x-icon" href="../img/ruta.png">
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
            <a class="nav-link" href="Ruta/">
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
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Agregar Ruta</a>
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
                  <a class="dropdown-item" href="Perfil.php">Perfil</a>
                  <a class="dropdown-item" href="Perfil/Editar.php">Configurar</a>
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
          if(isset($_GET["status"])){
            if($_GET["status"] === "3"){
             ?>
             <div class="alert alert-info">
              Pedido quitado de la lista
             </div>
             <?php
           }else if($_GET["status"] === "4"){
             ?>
             <div class="alert alert-warning">
               <strong>Error:</strong> El ingrediente que buscas no existe
             </div>
             <?php
           }else{
             ?>
             <div class="alert alert-danger">
               <strong>Error:</strong> Algo salió mal mientras se realizaba la ruta 
             </div>
             <?php
           }
         }
         ?>
         <div class="row">
          <div class="col-md-12">
            <div class="card">

              <div class="card-header card-header-primary">
                <h4 class="card-title "> Agregar Ruta </h4>
                <p class="card-category"> Agregar Ruta</p>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div class="container" >
                    <form method="post" action="addPedido.php" class="form-horizontal row-fluid" style="padding: 10px; background-color: white; border-radius: 10px">
                     <div style="width: 100%" >
                      <div class="row">
                       <div class="col">
                         <label for="Pedido" class="control-label">Selecciona un pedido:</label>
                         <div class="controls">
                           <select name="Pedido" id="Pedido" class="form-control">
                             <?php
                             $queryy = $conectar -> query ("SELECT * FROM pedido");
                             while ($valoress = mysqli_fetch_array($queryy)) {
                              echo '<option value="'.$valoress[idPedido].'">'.$valoress[CodigoQR].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="material-icons">add</i> Agregar Pedido</button>
                      </form>
                      <br><br>
                      <table class="table table-bordered">
                       <thead>
                        <tr>
                         <th>Código</th>
                         <th>Código QR</th>
                         <!-- 	<th>Estado</th> -->
                         <th>Quitar</th>
                       </tr>
                     </thead>
                     <tbody>
                      <?php foreach($_SESSION["carrito"] as $indice => $Pedidos){ 
                       ?>
                       <tr>
                         <td><?php echo $Pedidos->idPedido ?></td>
                         <td><?php echo $Pedidos->CodigoQR ?></td>
                         <!-- <td><?php echo $Ruta->idEstado ?></td> -->
                         <td><a class="btn btn-danger" href="<?php echo "quitar.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                       </tr>
                     <?php } ?>
                   </tbody>
                 </table>

                 <form action="./terminar.php" method="POST">
                   <label for="domiciliario">Domiciliario:</label>
                   <select name="domiciliario" id="domiciliario" class="form-control">
                    <?php
                    $query = $conectar -> query ("SELECT * FROM domiciliario");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[iddomiciliario].'">'.$valores[nombres].'</option>';
                    }
                    ?>
                  </select><br>
                  <label for="nombreAlimento">Nombre del jefe de Logistica:</label>
                  <!-- <input autocomplete="off" autofocus class="form-control" name="JefeLogistica" required type="text" id="JefeLogistica" placeholder="Escribe el nombre" type="text" minlength="3"><br> -->
                  <select name="JefeLogistica" id="JefeLogistica" class="form-control">
                    <?php
                    $query = $conectar -> query ("SELECT * FROM jefe_logistica");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores[idjefe_logistica ].'">'.$valores[nombres].'</option>';
                    }
                    ?>
                  </select><br>

                  <button type="submit" class="btn btn-success"><i class="material-icons">save</i> Terminar</button>
                  <a href="./cancelar.php" class="btn btn-danger pull-right"><i class="material-icons">clear</i> Cancelar</a>
                </form>
              </div>
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
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="../https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
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


</body>

</html>
