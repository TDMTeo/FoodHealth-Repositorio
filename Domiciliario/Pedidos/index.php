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
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../img/admin.png">
        <link rel="icon" type="image/x-icon" href="../img/admin.png">
       

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Domiciliario</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
        <!--  Social tags      -->
        <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
        <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
        <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
        <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
        <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
        <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
        <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
        <meta property="og:site_name" content="Creative Tim" />
        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <!--  Material Dashboard CSS    -->
        <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/google-roboto-300-700.css" rel="stylesheet" />

</head>

    <?php include("../php/Conexion.php");

     $idUsuario = $_SESSION['idUsuario'];

     $consulta = mysqli_query($conectar,'Select * From Usuarios,domiciliario where usuarios.idUsuario = domiciliario.idUsuario and  usuarios.idUsuario = '. $idUsuario);

     $informacion = mysqli_fetch_array($consulta);

     $nombre = $informacion["nombres"];

     $apellidos = $informacion["apellidos"];

     $nombreCompleto = $nombre. ' '. $apellidos;

     $foto = $informacion["foto"];

     $idDomiciliiaro = $informacion["iddomiciliario"];

     $query = "select pedido.idPedido, concat(nombre,' ',apellido) as 'Nombre', FechaEntrega, CodigoQR, pedido.DireccionPredeterminada, cliente.Direccion, estado.Estado as 'Estado', ruta.Tiempo_Aproximado from cliente, pedido, estado, ruta, domiciliario where Cliente.idCliente = Pedido.idCliente and Pedido.idEstado = Estado.idEstado and pedido.idRuta = ruta.idRuta and Ruta.idDomiciliario = Domiciliario.iddomiciliario and domiciliario.iddomiciliario = '$idDomiciliiaro'";
    $validacionB = mysqli_query($conectar, $query);
      while ($ValidarRuta = mysqli_fetch_array($validacionB)) {
          $idRuta = $ValidarRuta['idPedido'];
          $tiempo_aproximado = $ValidarRuta['Tiempo_Aproximado'];
        }

    ?>  
    <body>
        <div class="wrapper">
            <div class="sidebar" data-active-color="green" data-background-color="white" data-image="assets/img/sid.jpg">
                <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
        -->
        <div class="logo">
            <a href="index.html" class="simple-text">
                FoodHealth
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="index.html" class="simple-text">
                FH
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="../Perfil/<?php echo $foto ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <?php echo $nombreCompleto ?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="./">Mi Perfil</a>
                            </li>
                            <li>
                                <a href="../php/cerrarsesion.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li>
                    <a href="../">
                        <i class="material-icons">dashboard</i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="active">
                    <a href="./">
                        <i class="material-icons">fastfood</i>
                        <p>Pedidos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">star_half</i>
                        <p>Calificaciones</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inicio</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                               <?php
                                 $no_leidos = "SELECT * from notificaciones where para = ".$idUsuario." and leido = 'no' ORDER BY id DESC LIMIT 4";
                                  $leido = mysqli_query($conectar, $no_leidos);
                                  while ($notificaciones = mysqli_fetch_array($leido)) {
                                    ?>
                                    <li>
                                     <a class="view" href="#" id="<?php echo $notificaciones['id']?>" descripcion="<?php echo $notificaciones['mensaje']?>">
                                       <?php echo $notificaciones['asunto'] ?>
                                      </a>
                                    </li>      
                               <?php } ?>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                  <a href="../Perfil/">
                                       Perfil
                                  </a>
                                </li> 
                                <li class="divider"></li>
                                <li>
                                    <a href="../php/cerrarsesion.php">
                                        Cerrar Sesion
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
          <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">fastfood</i>
                    </div>
                    <br>    
                    <h4 class="card-title">Informacion -
                    	 <small class="category">Pedidos de su Ruta</small>
                    </h4>
                    <div class="card-content">
                    <?php 
                        if (empty($idRuta)) {
                            echo '
                            <blockquote class="blockquote">
                              <p class="mb-0">No se encuentran pedidos asignados de manera correcta</p>
                              <footer class="blockquote-footer"><cite title="Source Title">FoodHealth</cite></footer>
                            </blockquote>
                            ';
                        }
                        else{
                            echo '
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nombre del Cliente</th>
                                      <th>Fecha</th>
                                      <th>Codigo QR</th>
                                      <th>Direccion de entrega</th>
                                      <th>Estado</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                            ';
                        }
                     ?>

                              <tbody>
                                <?php
                                $tabla = mysqli_query($conectar, $query);

                                while ($fila = mysqli_fetch_array($tabla)) {?>
                                  <tr>
                                  	<td><?php echo $fila['idPedido'] ?></td>
                                    <td><?php echo $fila['Nombre']?></td>
                                    <td><?php echo $fila['FechaEntrega']?></td>
                                    <td width="130px" height="130px"> <?php 
                                    if ($fila['CodigoQR']== "") {
                                      echo 'Codigo QR no asignado';
                                    }else{
                                      echo '<IMG SRC="../../Logistica/CodigoQR/'.$fila['CodigoQR'].'">';
                                    }
                                   ?>
                                      
                                    </td>
                                    <td><?php echo $fila['DireccionPredeterminada']?></td>
                                    <td><?php echo $fila['Estado']?></td>
                                      <td class="td-actions text-right">
                                         <a class="btn btn-success btn-simple editar" rel="tooltip" title="Editar">
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


                 <!-------------------------------------------------- Modal para editar estado ------------------------------------------------------>
        <div class="modal fade" id="Modificar" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                        <h5 class="modal-title" id="myModalLabel">Estados</h5>
                    </div>
                        <div class="modal-body text-center">
                            <form method="POST" action="validar.php">
                            <div class="card-content">
                                <div class="form-group label-floating">
                                    <label class="control-label">Estado</label>
                                     <select name="Estado" class="form-control" title="Estado" required>
                                        <option disabled="" selected="" value=""></option>
                                        <?php
                                          $sql = "select * from estado where idEstado = 4";
                                          $query = $conectar->query ($sql);
                                          while ($valores = mysqli_fetch_array($query)) {
                                              echo '<option value="'.$valores[idEstado].'">'.$valores[Estado].'</option>';
                                          }
                                          ?>
                                    </select>
                                </div>
                                    <input type="hidden" name="update_id" id="update_id">
                                    <input type="text" class="form-control" name="Estado_id" id="Estado_id" style="visibility:hidden">
                            </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success btn-simple" name="Modificar" value="Modificar">Modificar</button>
                    </div>
                 </form>
                </div>
              </div> 
            </div>
        </div>
      <!-----------------------------------------------------Modal para editar estado ------------------------------------------------------->


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>

             </div>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demo.initMaterialWizard();

    });
</script>
        <script>

          $(document).ready(function (){
            $('.editar').on('click', function(){

              $('#Modificar').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                  return $(this).text();
                }).get();

                console.log(data);

                    $('#update_id').val(data[0]);
                    $('#Estado_id').val(data[0]);

            });
          });

        </script>
            <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","success",100,"fastfood","Se ha modificado exitosamente");
                    });
                  </script>';

            } 
          if($_POST["mensaje"] === "2") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","success",100,"done","Domiciliario modificado exitosamente");
                    });
                  </script>';
            }
          if($_POST["mensaje"] === "3") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","success",100,"done","Domiciliario deshabilitado exitosamente");
                    });
                  </script>';
            } 
          }
         ?>
</body>
</html>