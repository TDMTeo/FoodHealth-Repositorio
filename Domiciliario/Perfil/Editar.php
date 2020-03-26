  <?php
    session_start();
    if(!isset($_SESSION['Perfil'])) 
      {
          header('Location: ../../');   
      }
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>Rutas</title>
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
    <link rel="stylesheet" type="text/css" href="css/Estilo.css">

  </head>
    <?php include("../php/conexion.php");
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Pedidos_Domiciliario.php">
              <i class="material-icons">directions_run</i>
              <p>Pedidos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Calificaciones_Domiciliario.php">
              <i class="material-icons">fastfood</i>
              <p>Calificaciones</p>
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
                    <a class="dropdown-item" href="../Pedidos.php">Se ha cambiado de estado del pedido</a>
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
                    <a class="dropdown-item" href="Editar.php">Configurar</a>
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
                      <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Perfil</h4>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body">
                    <?php 

                      include('../php/Conexion.php');
                      $idUsuario =  $_SESSION['idUsuario'] ;
                      $consulta = mysqli_query($conectar,"SELECT * from domiciliario where idUsuario = '$idUsuario'");

                      $domiciliario = mysqli_fetch_array($consulta);

                      $n_Documento = $domiciliario["n_Documento"];
                      $idTipoDocumento = $domiciliario["idTipoDocumento"];
                      $nombres = $domiciliario["nombres"];
                      $apellidos = $domiciliario["apellidos"];
                      $telefono = $domiciliario["telefono"];
                      $direccion = $domiciliario["direccion"];
                      $idMunicipio =  $domiciliario["idMunicipio"];
                      $codigopostal = $domiciliario["codigopostal"];
                      $descripcion = $domiciliario["aboutme"];

                      //Sacar El nombre del rol que esta logeado
                      $consulta4 =  mysqli_query($conectar,"SELECT Perfil from Usuarios where idUsuario = '$idUsuario'");

                      $a = mysqli_fetch_array($consulta4);

                      $idRol = $a["Perfil"];

                      $consulta5 =  mysqli_query($conectar,"SELECT nombre from Rol where idRol = '$idRol'");

                      $b = mysqli_fetch_array($consulta5);

                      $Nombre_Rol = $b["nombre"];

                     ?>
                    <form action="Validar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombres</label>
                            <input type="text" class="form-control" name="nombres" value="<?php echo $nombres; ?>"  minlength="5" maxlength="40" autocomplete="off" required onkeypress="return soloLetras(event);">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="bmd-label-floating">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>" minlength="5" maxlength="40" autocomplete="off" required onkeypress="return soloLetras(event);">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Telefono</label>
                                   <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" minlength="10" maxlength="10" autocomplete="off" required
                                onKeyPress="return SoloNumeros(event);">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Documento</label>
                                    <input type="text" class="form-control" name="n_Documento" value="<?php echo $n_Documento; ?>" minlength="8" maxlength="13" autocomplete="off" required onKeyPress="return SoloNumeros(event);">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                           <div class="input-field">
                                    <select class="custom-select" name="TDocumento" required>
                                        <option value="">Tipo de Documento</option>
                                        <?php
                                        include("php/conexion.php");
                                        $sql = "SELECT * FROM tipodocumento";
                                        $query = $conectar->query ($sql);
                                        while ($valores = mysqli_fetch_array($query)) {
                                            echo '<option value="'.$valores[idTipoDocumento].'">'.$valores[nombre].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Direccion</label>
                                   <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>" minlength="5" maxlength="40" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Codigo Postal</label>
                               <input type="text" class="form-control" name="codigopostal" value="<?php echo $codigopostal; ?>" minlength="6" maxlength="6"  autocomplete="off" required onKeyPress="return SoloNumeros(event);" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                                  <div class="input-field col 12">
                                    <select class="custom-select" name="Municipio" required>
                                        <option value="">Municipio</option>
                                        <?php
                                        include("php/conexion.php");
                                        $sql = "SELECT * FROM municipio";
                                        $query = $conectar->query ($sql);
                                        while ($valores = mysqli_fetch_array($query)) {
                                            echo '<option value="'.$valores[idMunicipio].'">'.$valores[nombre].'</option>';
                                        }
                                        ?>
                                    </select>
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
                                    <textarea class="form-control" name="descripcion" rows="5"><?php echo $descripcion; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <style>#file { display: none; }</style>
                            <label class="mdl-button mdl-js-button mdl-button--icon mdl-button--file">
                              <i class="material-icons">attach_file</i><input type="file" id="Foto" name="Foto" accept="image/*">
                            </label>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right" name="Modificar" value="Modificar">Actualizar</button>
                      <div class="clearfix"></div>
                  </form>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <?php 

                      include('../php/Conexion.php');
                      $idUsuario =  $_SESSION['idUsuario'] ;
                      $consulta = mysqli_query($conectar,"SELECT * from domiciliario where idUsuario = '$idUsuario'");

                      $domiciliario = mysqli_fetch_array($consulta);

                      $fotoperfil = $domiciliario["foto"];
                     ?>
                    <img class="img" src="<?php echo $fotoperfil?>" />
                  </a>
                </div>
                <div class="card-body">



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
            <script>
          //Se utiliza para que el campo de texto solo acepte numeros
        function SoloNumeros(evt){
        if(window.event){//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
        }
        else{
         keynum = evt.which; //FF
        } 
        //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
         return true;
          }
          else{
            Swal.fire({
                                  icon: 'error',
                                  title: '<strong><h2> Error </h2></strong>',
                                  html: '<h5> Solo caracteres numéricos sin letras</h5>',
                                  type: 'error',
                                  padding: '3em',
                                  timer: 1000,
                                  showConfirmButton: false
                                  
                                })
         return false;
          }
    }
          </script>
                  <script>
          //Se utiliza para que el campo de texto solo acepte letras
        function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial){
        Swal.fire({
                                  icon: 'error',
                                  title: '<strong><h2> Error </h2></strong>',
                                  html: '<h5> Solo letras sin caracteres numéricos</h5>',
                                  type: 'error',
                                  padding: '3em',
                                  timer: 1000,
                                  showConfirmButton: false
                                  
                                })
            return false;
          }
    }
          </script>

          <script>
            document.getElementById("FileAttachment").onchange = function () {
            document.getElementById("fileuploadurl").value = this.value.replace(/C:\\fakepath\\/i, '');
            };
          </script>
    
  </body>

  </html>