
  <?php

  session_start();
  include_once "../php/Conexion.php";
  if(!isset($_SESSION['Perfil'])) 
  {
    header('Location: ../../');  
  }
   $comprobar = $conectar -> query ("select * from pedido where Pedido.idEstado in (1,4) and  Pedido.CodigoQR is not null");
    while ($valoress = mysqli_fetch_array($comprobar)) {
       $id =$valoress['idPedido'];
       $Estado = $valoress['idEstado'];
    }

 if (empty($id)) {
           echo '<body onload="document.formulario.submit()">
           <form action="./" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="2">
           </body>
           </form> ';
         }
  ?> 
  <?php 
  if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
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
        <meta itemprop="image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
        <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
        <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
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
                    <a href="./">
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
                     <i class="material-icons">control_point_duplicate</i>
                 </div>
                 <br>
                 <h4 class="card-title">Crear Rutas</h4>
                <div class="card-body">
                    <div class="card-content table-responsive table-full-width">
                        <div class="container-fluid">
                          <form method="post" action="addPedido.php">
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="form-group label-floating">
                                        <label for="Pedido" class="control-label">Pedidos</label>
                                         <select name="Pedido" id="Pedido" class="form-control" required>
                                         <option disabled="" selected="" value=""></option>
                                           <?php
                                           $queryy = $conectar -> query ("select * from pedido where Pedido.idEstado in (1,4) and Pedido.CodigoQR is not null");
                                           while ($valoress = mysqli_fetch_array($queryy)) {
                                            echo '<option value="'.$valoress[idPedido].'">'.$valoress[DireccionPredeterminada].'</option>';
                                          }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                  <button type="submit" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="material-icons">add</i></button>
                            </form>
                          <br>
                          <div class="col-md-9 col-md-offset-1">
                           <table class="table table-borderless">
                             <thead>
                              <tr>
                               <th>Código</th>
                               <th>Código QR</th>
                               <th></th>
                             </tr>
                           </thead>
                              <tbody>
                                <?php foreach($_SESSION["carrito"] as $indice => $Pedidos){ 
                                 ?>
                                 <tr>
                                   <td><?php echo $Pedidos->idPedido ?></td>
                                   <td  width="150px" height="150px">
                                      <IMG SRC="../CodigoQR/<?php echo $Pedidos->CodigoQR ?>">
                                   </td>
                                   <td>
                                        <a class="btn btn-danger btn-fab btn-fab-mini btn-round" href="<?php echo "quitar.php?indice=" . $indice?>"><i class="material-icons">delete_outline</i>
                                        </a>
                                    </td>
                                 </tr>
                               <?php } ?>
                             </tbody>
                           </table>
                          </div>
                          <div class="col-md-9 col-md-offset-1">
                            <form action="./terminar.php" method="POST">
                                <div class="form-group label-floating">
                                    <label for="Pedido" class="control-label">Domiciliario</label>
                                     <select name="domiciliario" id="domiciliario" class="form-control" required>
                                     <option disabled="" selected="" value=""></option>
                                      <?php
                                      $query = $conectar -> query ("SELECT * FROM domiciliario where estado = 1");
                                      while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores[iddomiciliario].'">'.$valores[nombres].'</option>';
                                      }
                                      ?>
                                    </select>
                                </div>
                                <br>
                                <input type="hidden" name="JefeLogistica" id="JefeLogistica" value="<?php $idUsuario =   $_SESSION['idUsuario'] ;echo $idUsuario;?>">
                                <div class="form-group">
                                    <label class="label-control">Tiempo Aproximado</label>
                                    <input type="text" class="form-control timepicker" name="Tiempo_Aproximado" id="Tiempo_Aproximado" value="01:00:00"  />
                                </div> 

                                <button type="submit" class="btn btn-success btn-round"><i class="material-icons">save</i> Terminar</button>
                                <a href="./cancelar.php" class="btn btn-danger  btn-round pull-right"><i class="material-icons">clear</i>Cancelar</a>
                                <br><br><br><br>
                          </form>
                            <div id="sliderRegular" style="display: none"></div>
                            <div id="sliderDouble" style="display: none"></div>
                          </div> 
                        </div>
                     </div>
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
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>


         <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       md.showNotification("bottom","right","success",100,"done","Mensaje leido");
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


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>