<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 5){
    session_destroy();
    header('location: ../');
  }

?>

<?php
include ('../Chef/conn/conn.php');
$id = $_SESSION['idUsuario'];
$sql = mysqli_query($conn,"SELECT * FROM cocineros WHERE idUsuario = '$id'");
if(mysqli_num_rows($sql) == 0){
                header("Location: ../");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
?>

<?php
include ('../Chef/conn/conn.php');
$id = $_SESSION['idUsuario'];
$sql = mysqli_query($conn,"SELECT * FROM usuarios WHERE idUsuario = '$id'");
if(mysqli_num_rows($sql) == 0){
                header("Location: ../");
            }else{
                $rowa = mysqli_fetch_assoc($sql);
            }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../Chef/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cocinero
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../Chef/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../Chef/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a class="simple-text logo-normal">
          Menú Principal
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="#">
              <i class="material-icons">person</i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="menustoprepare.php">
              <i class="material-icons">content_paste</i>
              <p>Menús a preparar</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./customers.php">
              <i class="material-icons">how_to_reg</i>
              <p>Clientes</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="foods.php">
              <i class="material-icons">ballot</i>
              <p>Alimentos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ingredients.php">
              <i class="material-icons">ballot</i>
              <p>Ingredientes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="closelogin.php">
              <i class="material-icons">power_settings_new</i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Perfil</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Buscar...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">5 Clientes Nuevos</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Perfil
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="closelogin.php">Cerrar Sesión</a>
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
                  <h4 class="card-title">Editar perfil</h4>
                  <p class="card-category">Complete su perfil</p>
                </div>
                <div class="card-body">
                   <form method="POST" action="account/edit-profile.php">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company (disabled)</label>
                          <input type="text" class="form-control" value="Food Health" readonly required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" value="<?php echo $rowa['Usuario']; ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" value="<?php echo $rowa['Correo']; ?>" class="form-control" readonly required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                          <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <input type="text" value="<?php echo $row['apellidos']; ?>" class="form-control" name="apellidos" id="apellidos" required>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tipo Documento</label>
                          <select name="tipodocumento" id="tipodocumento" class="form-control">
                            <?php
                            $tipo = $row["idTipoDocumento"];
                            $quer1 = $conn -> query("SELECT * FROM tipodocumento WHERE idTipoDocumento = '$tipo' AND estado = 1");
                            $quer2 = $conn -> query("SELECT * FROM tipodocumento WHERE estado = 1");
                            $valores1 = mysqli_fetch_array($quer1); 
                            echo '<option style="visibility:hidden;" value="'.$valores1[idTipoDocumento].'">'.$valores1[nombre].'</option>';
                            while($valoress = mysqli_fetch_array($quer2)){
                            echo '<option value="'.$valoress[idTipoDocumento].'">'.$valoress[nombre].'</option>';
                          }

                             ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Número Documento</label>
                          <input type="number" style="margin-top:42px" name="documento" id="documento" value="<?php echo $row['n_Documento']; ?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input id="direccion" name="direccion" type="text" value="<?php echo $row['direccion']; ?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Municipio</label>
                          <select class="form-control" id="municipio" name="municipio">
                            <?php $municipia = $row['idMunicipio']?>
                            <option value="<?php echo $municipia;?>" style="visibility: hidden;">

                          <?php $jj = $row['idMunicipio'];
                          if($jj == 1){
                            echo "Barbosa";
                          } else if ($jj == 2){
                            echo "Girardota";
                          }else if ($jj == 3){
                            echo "Copacabana";
                          }else if ($jj == 4){
                            echo "Bello";
                          }else if ($jj == 5){
                            echo "Sabaneta";
                          }else if ($jj == 6){
                            echo "Itaguí";
                          }else if ($jj == 7){
                            echo "La Estrella";
                          }else{
                            echo "Caldas";
                          } ?>
                           </option>
                            <option value="1">Barbosa</option>
                            <option value="2">Girardota</option>
                            <option value="3">Copacabana</option>
                            <option value="4">Bello</option>
                            <option value="5">Sabaneta</option>
                            <option value="6">Itaguí</option>
                            <option value="7">La Estrella</option>
                            <option value="8">Caldas</option>
                          </select>

                          
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">País</label>
                          <select name="pais" id="pais" class="form-control">
                            <option value="1" readonly>Colombia</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Código Postal</label>
                          <input type="number" id="codigopostal" name="codigopostal" value="<?php echo $row['codigopostal']; ?>" class="form-control" required  style="margin-top: 21%">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Acerca de mi</label>
                          <div class="form-group">
                            <textarea id="aboutme" name="aboutme" type="text" class="form-control" rows="5"><?php echo $row['aboutme']; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="update" name="update" class="btn btn-primary pull-right"><i class="material-icons">edit</i> Actualizar Perfil</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../Chef/assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['nombres']; ?></h4>
                  <p class="card-description">
                    <?php echo $row['aboutme']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> Food Health
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../Chef/assets/js/core/jquery.min.js"></script>
  <script src="../Chef/assets/js/core/popper.min.js"></script>
  <script src="../Chef/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../Chef/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../Chef/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../Chef/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../Chef/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../Chef/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../Chef/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../Chef/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../Chef/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../Chef/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../Chef/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../Chef/assets/js/plugins/fullcalendar.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../Chef/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../Chef/assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="../Chef/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../Chef/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Chef/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
</body>

</html>