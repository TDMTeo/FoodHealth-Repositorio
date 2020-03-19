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
  <title>Pedidos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/45deb43347.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/x-icon" href="img/pedido.png">
  <script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="../plugins/sweetAlert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">  
</head>
 <?php include("../php/conexion.php");
  ?>  
<body>
  <div class="wrapper">
    <div class="sidebar"  data-color="green" data-background-color="white">
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
           <li class="nav-item active">
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
            <a class="navbar-brand" href="javascript:;">Pedidos</a>
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
                    position: 'center',
                    icon: 'success',
                    title: 'Codigo creado correctamente',
                    showConfirmButton: true,
                    confirmButtonColor: 'green',
                    
                  })
                  </script>" ?>
                  <?php
                }else if($_GET["status"] === "2")
                {
                  ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                      <i class="material-icons">close</i>
                    </button>
                    <strong>Domiciliario Guardado Correctamente!</strong> 
                  </div>
                  <?php
                }elseif($_GET["status"] === "3")
                {
                  ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                      <i class="material-icons">close</i>
                    </button>
                    <strong>Domiciliario Eliminado Correctamente!</strong> 
                  </div>
                  <?php
                }
              }
              ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Pedidos</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>QR</th>
                          <th>Direccion 1</th>
                          <th>Direccion 2</th>
                          <th>Tiempo Aproximado</th>
                          <th>Estado</th>
                          <th>Editar </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "select pedido.idPedido, nombre, FechaEntrega, CodigoQR, pedido.DireccionPredeterminada, cliente.Direccion, Tiempo_Aproximado, n_Documento from cliente, pedido, estado, ruta where Cliente.idCliente = Pedido.idCliente and Pedido.idEstado = Estado.idEstado and Pedido.idRuta = Ruta.idRuta";
                        $tabla = mysqli_query($conectar, $query);

                        while ($fila = mysqli_fetch_array($tabla)) {?>
                          <tr>
                            <td><?php echo $fila['idPedido']?></td>
                            <td><?php echo $fila['nombre']?></td>
                            <td><?php echo $fila['FechaEntrega']?></td>
                            <td><IMG SRC="<?php echo $fila['CodigoQR']?>" width="100px" height="100px"></td>
                            <td><?php echo $fila['DireccionPredeterminada']?></td>
                            <td><?php echo $fila['Direccion']?></td>
                            <td><?php echo $fila['Tiempo_Aproximado']?></td>
                            <td><?php echo $fila['n_Documento']?></td>
                                <td>
                                  <a rel="tooltip"  title class="btn btn-success btn-link btn-sm editbtn" data-original-title="Editar" aria-describedby="tooltip578613">
                                     <i class="material-icons">edit</i>
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


        <!-------------------------------------------------- Modal para editar estado ------------------------------------------------------>
        <div class="modal fade" id="Modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Modificar al domiciliario </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="generar.php" method="POST">
                  <div class="card-body">
                      <div class="modal-body">
                      <input type="hidden" name="update_id" id="update_id">
                      <input type="text" class="form-control" name="Pedido_id" id="Pedido_id" style="visibility:hidden">
                      <input type="hidden" name="n_Documento" id="n_Documento">
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
      <!-----------------------------------------------------Modal para editar estado ------------------------------------------------------->




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
  <!--  Plugin  Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
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


    <script >

        $(document).ready(function (){
          $('.editbtn').on('click', function(){

            $('#Modificar').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                return $(this).text();
              }).get();

              console.log(data);

              $('#update_id').val(data[0]);
              $('#Pedido_id').val(data[0]);
              $('#n_Documento').val(data[7]);
          });
        });
      </script>
</body>

</html>