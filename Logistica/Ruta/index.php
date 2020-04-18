<?php
session_start();
if(!isset($_SESSION['Perfil'])) 
{
  header('Location: ../');  
}
?>
<?php 
include_once '../php/Conexion.php';
$sentencia = $base_de_datos->query("SELECT Ruta.idRuta, CONCAT(domiciliario.nombres,' ',domiciliario.apellidos) as 'Nombre', ruta.Tiempo_Aproximado, GROUP_CONCAT(Pedido.idPedido,'..', pedido.CodigoQR, '..', estado.Estado SEPARATOR '__') AS pedido 

FROM ruta INNER JOIN domiciliario ON domiciliario.idDomiciliario = ruta.idDomiciliario INNER JOIN pedido ON pedido.idRuta = ruta.idRuta INNER JOIN estado ON estado.idEstado = pedido.idEstado GROUP BY ruta.idRuta ORDER BY ruta.idRuta");

$Ruta = $sentencia->fetchAll(PDO::FETCH_OBJ);

     $validacion = "SELECT Ruta.idRuta, CONCAT(domiciliario.nombres,' ',domiciliario.apellidos) as 'Nombre', ruta.Tiempo_Aproximado, GROUP_CONCAT(Pedido.idPedido,'..', pedido.CodigoQR, '..', estado.Estado SEPARATOR '__') AS pedido 

                    FROM ruta INNER JOIN domiciliario ON domiciliario.idDomiciliario = ruta.idDomiciliario INNER JOIN pedido ON pedido.idRuta = ruta.idRuta INNER JOIN estado ON estado.idEstado = pedido.idEstado GROUP BY ruta.idRuta ORDER BY ruta.idRuta";

      $validacionB = mysqli_query($conectar, $validacion);
      while ($ValidarRuta = mysqli_fetch_array($validacionB)) {
          $idRuta = $ValidarRuta['idRuta'];
        }

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../img/ruta.png">
        <link rel="icon" type="image/x-icon" href="../img/ruta.png">
       

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Ruta</title>
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
    <?php 

     $idUsuario = $_SESSION['idUsuario'];

     $consulta = mysqli_query($conectar,'Select * From Usuarios,jefe_logistica where usuarios.idUsuario = jefe_logistica.idUsuario and  usuarios.idUsuario = '. $idUsuario);

     $informacion = mysqli_fetch_array($consulta);

     $nombre = $informacion["nombres"];

     $apellidos = $informacion["apellidos"];

     $nombreCompleto = $nombre. ' '. $apellidos;

     $foto = $informacion["foto"];

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
                                <a href="../Perfil/">Mi Perfil</a>
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
                <li>
                    <a href="../Domiciliarios/">
                        <i class="material-icons">directions_run</i>
                        <p>Domiciliarios</p>
                    </a>
                </li>
                 <li>
                    <a data-toggle="collapse" href="#dropPedidos">
                        <i class="material-icons">fastfood</i>
                        <p>Pedidos
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="dropPedidos">
                        <ul class="nav">
                            <li>
                                <a href="../Pedidos/">Informacion</a>
                            </li>
                            <li>
                                <a href="../Pedidos/Codigoqr.php">Generar QR</a>
                            </li>
                            <li>
                                <a href="../Pedidos/Estado.php">Cambiar estado</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="active">
                    <a href="Ruta/">
                        <i class="material-icons">directions_bike</i>
                        <p>Ruta</p>
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
                    <a class="navbar-brand" href="#">Ruta </a>
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
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon" data-background-color="green">
                     <i class="material-icons">directions_bike</i>
                 </div>
                 <br>
                  <div class="pull-right">
                          <a class="btn btn-success btn-round" href="AddRuta.php" rel="tooltip" title="Agregar">
                            <i class="material-icons">control_point_duplicate</i>
                          </a>
                  </div>
                 <h4 class="card-title">Rutas</h4>
                 <div class="card-content">
                    <?php 
                        if (empty($idRuta)) {
                            echo '
                            <blockquote class="blockquote">
                              <p class="mb-0">No se encuentran rutas establecidas de manera correcta</p>
                              <footer class="blockquote-footer"><cite title="Source Title">FoodHealth</cite></footer>
                            </blockquote>
                            ';
                        }
                        else{
                            echo '
                            <div class="table-responsive">
                            <table id="lookup" class="table">
                              <div class="table-responsive">
                                <thead>
                                  <th>Domiciliario</th>
                                  <th>Tiempo_Aproximado</th>
                                  <th>Pedidos</th>
                                </thead>
                            ';
                        }
                     ?>
                    <tbody>
                      <?php foreach($Ruta as $Ruta){ ?>
                        <th><?php echo $Ruta->Nombre ?></th>
                        <th><?php echo $Ruta->Tiempo_Aproximado ?></th>
                        <td>
                          <table id="lookup" class="table">
                            <thead>
                              <tr>
                                <th>Código</th>
                                <th>Código QR</th>
                                <th>Estado</th> 
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach(explode("__", $Ruta->pedido) as $RutaConcatenada){ 
                                $Route = explode("..", $RutaConcatenada);
                                ?>
                                <tr>
                                  <td><?php echo $Route[0] ?></td>
                                  <td  width="100px" height="100px"><IMG SRC="../CodigoQR/<?php echo $Route[1] ?>"></td>
                                  <td><?php echo $Route[2] ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
               </div>
              </table>
             </div>
            </div>
           </div>
          </div>
        </div>

<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">

        </nav>
                      <!--  <p class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
                        </p>
                    -->
                </div>
            </footer>
        </div>
    </div>
</body>
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
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
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
    <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","success",100,"directions_bike","Ruta creada exitosamente");
                    });
                  </script>';

            } 
          if($_POST["mensaje"] === "2") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","info",300,"live_help","No se encontraron pedidos que tengan un estado y/o CodigoQR valido para agregar a una ruta");
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

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>