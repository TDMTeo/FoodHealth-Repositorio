      <?php
      session_start();
      if (!isset($_SESSION['Perfil'])) {
        header('Location: ../');
      }
      ?>
      <!doctype html>
      <html lang="en">

      <head>
        <title>Domiciliarios</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- Material Kit CSS -->
        <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/Estilo.css">
        <link rel="shortcut icon" type="image/x-icon" href="img/domiciliario.png">
        <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
        <script src="plugins/sweetAlert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">

      </head>
      <?php include("php/conexion.php");
      ?>

      <body>
        <div class="wrapper">
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
                <li class="nav-item active">
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
                  <a class="navbar-brand" href="javascript:;">Domiciliarios</a>
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
                <!-- your content here -->
                 <?php
                if(isset($_GET["status"]))
                {
                  if($_GET["status"] === "1")
                  {
                    ?>
                    <?php
                    echo "<script>
                    Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Domiciliario editado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 1500,
                                showConfirmButton: false
                                
                              })
                    </script>" ?>
                    <?php
                  }else if($_GET["status"] === "2")
                  {
                    ?>
                    <?php
                    echo "<script>
                    Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Domiciliario agregado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 1500,
                                showConfirmButton: false
                                
                              })
                    </script>" ?>
                    <?php
                  }elseif($_GET["status"] === "3")
                  {
                    ?>
                    <?php
                    echo "<script>
                    Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Domiciliario deshabilitado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 1500,
                                showConfirmButton: false
                              })
                    </script>"
                    ?>
                    <?php
                  }
                }
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title ">Domiciliarios</h4>
                        <div class="pull-right">
                          <a class="btn btn-primary btn-round" data-toggle="modal" data-target="#Agregar">
                            <i class="material-icons">person_add</i>
                          </a>
                        </div>
                        <p class="card-category">Aqui estan todos los domiciliarios </p>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                               <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>CodigoPostal</th>
                                <th>Documento</th>
                                <th>Direccion</th>
                                <th>Descripcion</th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "select * from domiciliario where estado = 1";
                              $tabla = mysqli_query($conectar, $query);

                              while ($fila = mysqli_fetch_array($tabla)) { ?>
                                <tr>
                                  <td><?php echo $fila['iddomiciliario'] ?></td>
                                  <td><?php echo $fila['nombres'] ?></td>
                                  <td><?php echo $fila['apellidos'] ?></td>
                                  <td><?php echo $fila['telefono'] ?></td>
                                  <td><?php echo $fila['codigopostal'] ?></td>
                                  <td><?php echo $fila['n_Documento'] ?></td>
                                  <td><?php echo $fila['direccion'] ?></td>
                                  <td><?php echo $fila['aboutme'] ?></td>
                                  <td>
                                    <a rel="tooltip"  title class="btn btn-success btn-link btn-sm editbtn" data-original-title="Editar" aria-describedby="tooltip578613">
                                       <i class="material-icons">edit</i>
                                    </a>
                                  </td>
                                  <td>
                                   <a rel="tooltip" title class="btn btn-danger btn-link btn-sm elmnbtn"  data-original-title="Deshabilitar" aria-describedby="tooltip578613">
                                       <i class="material-icons">person_add_disabled</i>
                                    </a>
                                  </td>
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

            <!-------------------------------------------------- Modal para Agregar ------------------------------------------------------>
            <div class="modal fade" id="Agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Domiciliario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body">
                      <form action="Domiciliario/Agregar.php" method="POST">   
                        <div class="row" >
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Usuario</label>
                              <input type="text" class="form-control" name="Usuario" minlength="5" maxlength="40" autocomplete="off" required
                              pattern="[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){3}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group" >
                              <label class="bmd-label-floating">Contraseña</label>
                              <input type="password" class="form-control" name="Contraseña" minlength="5" maxlength="40" autocomplete="off" required>
                            </div>
                          </div>
                        </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Nombre(s)</label>
                              <input type="text" class="form-control" name="Nombre" id="Nombre"
                              minlength="5" maxlength="40" autocomplete="off" required onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Apellidos</label>
                              <input type="text" class="form-control" name="Apellido" id="Apellido"
                              minlength="5" maxlength="40" autocomplete="off" required onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Telefono</label>
                              <input type="text" class="form-control" name="Telefono" minlength="10" maxlength="10" autocomplete="off" required
                              onKeyPress="return SoloNumeros(event);">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Correo</label>
                              <input type="email" class="form-control" name="Correo" minlength="5" maxlength="40"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,3}" autocomplete="off" required>
                            </div>
                          </div>
                        </div>
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Documento</label>
                              <input type="text" class="form-control" name="Documento" minlength="8" maxlength="13" autocomplete="off" required onKeyPress="return SoloNumeros(event);">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-field">
                                  <select class="custom-select" name="TDocumento" required>
                                      <option value="">Tipo de documento</option>
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
                              <input type="text" class="form-control" name="Direccion" minlength="5" maxlength="40" autocomplete="off" required
                              >
                            </div>
                          </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-field">
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
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Codigo Postal</label>
                              <input type="" class="form-control" name="CodigoPostal" minlength="6" maxlength="6"  autocomplete="off" required onKeyPress="return SoloNumeros(event);" >
                            </div>
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-md-12">
                         
                            <label>Descripcion</label>
                            <div class="form-group">
                              <label>Aqui puede ir una pequeña descripcion del domiciliario</label>
                              <textarea class="form-control" rows="3" name="Descripcion"></textarea>
                            </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
                    <button type="submit" class="btn btn-primary" name="Agregar" value="Agregar">Agregar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    <!-------------------------------------------------- Modal para Agregar ------------------------------------------------------>
            


          <!-------------------------------------------------- Modal para eliminar ------------------------------------------------------>
          <div class="modal fade" id="Eliminar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Deshabilitar Domiciliario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form action="Domiciliario/Eliminar.php" method="POST">
                <div class="modal-body">
                   <input type="hidden" name="delete_id" id="delete_id">
                              ¿Estas seguro que quieres deshabilitar este domiciliario?
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="Eliminar" value="Eliminar">Deshabilitar</button>
                </div>
                </div>
             </form>
              </div>
            </div>
          </div>
        <!-----------------------------------------------------Modal para eliminar ------------------------------------------------------->



















    <!-------------------------------------------------- Modal para editar ------------------------------------------------------>
          <div class="modal fade" id="Modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modificar al domiciliario </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="Domiciliario/Modificar.php" method="POST">
                    <div class="card-body">
                        <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Nombre(s)</label>
                              <input type="text" class="form-control" name="Nombre" id="nombres"
                              minlength="5" maxlength="40" required onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Apellidos</label>
                              <input type="text" class="form-control" name="Apellido" id="apellidos"
                              minlength="5" maxlength="40" required onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <div class="form-group">
                              <label>Telefono</label>
                              <input type="text" class="form-control" name="Telefono" id="Telefono"
                              minlength="10" maxlength="10" required onKeyPress="return SoloNumeros(event);">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Documento</label>
                              <input type="text" class="form-control" name="Documento" id="Documento"
                              minlength="8" maxlength="13" required
                              onKeyPress="return SoloNumeros(event);">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-field">
                                  <select class="custom-select" name="TDocumento" required>
                                      <option value="">Tipo de documento</option>
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
                            <div class="form-group col 12">
                              <label>Direccion</label>
                              <input type="text" class="form-control" name="Direccion" id="Direccion"
                              minlength="5" maxlength="40" required style="margin-left: -15px">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-field">
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
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>CodigoPostal</label>
                              <input type="text" class="form-control" name="CodigoPostal" id="CodigoPostal"
                              minlength="6" maxlength="6" required onKeyPress="return SoloNumeros(event);">
                      
                          </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Descripcion</label>
                            <div class="form-group">
                              <label>Aqui puede ir una pequeña descripcion del domiciliario</label>
                              <textarea class="form-control" rows="5" name="Descripcion" id="Descripcion"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
                    <button type="submit" class="btn btn-primary" name="Modificar" value="Modificar">Modificar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-------------------------------------------------- Modal para editar ------------------------------------------------------>
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
         

    <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       md.showNotification("success","done","Se ha guardado correctamente",100,"bottom","right");
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


        <script>

          $(document).ready(function (){
            $('.editbtn').on('click', function(){

              $('#Modificar').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                  return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#nombres').val(data[1]);
                $('#apellidos').val(data[2]);
                $('#Telefono').val(data[3]);
                $('#CodigoPostal').val(data[4]);
                $('#Documento').val(data[5]);
                $('#Direccion').val(data[6]);
                $('#Descripcion').val(data[7]);
            });
          });

        </script>

        <script >

          $(document).ready(function (){
            $('.elmnbtn').on('click', function(){

              $('#Eliminar').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                  return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
          });
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

      </body>

      </html>