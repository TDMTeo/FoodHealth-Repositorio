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
          <li class="nav-item ">
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Perfil</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <?php 

                    include('php/Conexion.php');
                    $idUsuario =  $_SESSION['idUsuario'] ;
                    $consulta = mysqli_query($conectar,"SELECT * from jefe_logistica where idUsuario = '$idUsuario'");

                    $jefe_logistica = mysqli_fetch_array($consulta);

                    $n_Documento = $jefe_logistica["n_Documento"];
                    $idTipoDocumento = $jefe_logistica["idTipoDocumento"];
                    $nombres = $jefe_logistica["nombres"];
                    $apellidos = $jefe_logistica["apellidos"];
                    $telefono = $jefe_logistica["telefono"];
                    $direccion = $jefe_logistica["direccion"];
                    $idMunicipio =  $jefe_logistica["idMunicipio"];
                    $codigopostal = $jefe_logistica["codigopostal"];
                    $descripcion = $jefe_logistica["aboutme"];

                    //Sacar el nombre del municipio

                    $consulta2 =  mysqli_query($conectar,"SELECT nombre from municipio where idMunicipio = '$idMunicipio'");

                    $Municipio = mysqli_fetch_array($consulta2);

                    $Nombre_Municipio = $Municipio["nombre"];

                    //Sacar el nombre del tipo de documento

                    $consulta3 =  mysqli_query($conectar,"SELECT nombre from tipodocumento where idTipoDocumento = '$idTipoDocumento'");

                    $TipoDocumento = mysqli_fetch_array($consulta3);

                    $Nombre_TipoDocumento = $TipoDocumento["nombre"];

                    //Sacar El nombre del rol que esta logeado
                    $consulta4 =  mysqli_query($conectar,"SELECT Perfil from Usuarios where idUsuario = '$idUsuario'");

                    $a = mysqli_fetch_array($consulta4);

                    $idRol = $a["Perfil"];

                    $consulta5 =  mysqli_query($conectar,"SELECT nombre from Rol where idRol = '$idRol'");

                    $b = mysqli_fetch_array($consulta5);

                    $Nombre_Rol = $b["nombre"];

                   ?>
                  <form>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                            <div class="tim-typo">
                              <p>
                                <?php echo $nombres; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-3" style="margin-left: -55px">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <div class="tim-typo">
                              <p>
                                <?php echo $apellidos; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <div class="tim-typo">
                              <p>
                               <?php echo $telefono; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Documento</label>
                          <div class="tim-typo">
                              <p>
                                <?php echo $n_Documento; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tipo Documento</label>
                          <div class="tim-typo">
                              <p>
                                 <?php echo $Nombre_TipoDocumento; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Direccion</label>
                          <div class="tim-typo">
                              <p>
                               <?php echo $direccion; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Municipio</label>
                          <div class="tim-typo">
                              <p>
                                <?php echo $Nombre_Municipio; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4" style="margin-left: -56px">
                        <div class="form-group">
                          <label class="bmd-label-floating">Codigo Postal</label>
                          <div class="tim-typo">
                              <p>
                                <?php echo $codigopostal; ?>
                              </p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Descripcion</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> </label>
                            <div class="tim-typo">
                              <p>
                                <?php echo $descripcion; ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--<button type="submit" class="btn btn-primary pull-right">Update Profile</button>-->
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/TEO.png" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"> <?php echo $Nombre_Rol; ?></h6>
                  <h4 class="card-title"><?php echo $nombres; ?></h4>
                  <p class="card-description">
                   <?php echo $descripcion; ?>
                  </p>
                  <a href="Perfil/Editar.php" class="btn btn-primary btn-round">modificar</a>
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
   <script src="assets/js/core/jquery.min.js"></script>
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

  
</body>

</html>