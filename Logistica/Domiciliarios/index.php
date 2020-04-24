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
        <title>Jefe de Logistica</title>
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

     $consulta = mysqli_query($conectar,'Select * From Usuarios,jefe_logistica where usuarios.idUsuario = jefe_logistica.idUsuario and  usuarios.idUsuario = '. $idUsuario);

     $informacion = mysqli_fetch_array($consulta);

     $nombre = $informacion["nombres"];

     $apellidos = $informacion["apellidos"];

     $nombreCompleto = $nombre. ' '. $apellidos;

     $foto = $informacion["foto"];

    ?>  
    <body>
        <div class="wrapper">
            <div class="sidebar" data-active-color="green" data-background-color="white" data-image="../assets/img/sid.jpg">
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
                <li class="active">
                    <a href="./">
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
                <li>
                    <a href="../Ruta/">
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
                    <a class="navbar-brand" href="#">Domiciliarios</a>
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
                        <i class="material-icons">directions_run</i>
                    </div>
                    <br>
                     <div class="pull-right">
                          <a class="btn btn-success btn-simple" data-toggle="modal" data-target="#Agregar"  rel="tooltip" title="Agregar">
                            <i class="material-icons">person_add</i>
                          </a>
                      </div>	
                    <h4 class="card-title">Domiciliarios</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table">
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
                                  <td class="td-actions text-right">
                                    <a class="btn btn-info btn-simple editbtn" rel="tooltip" title="Editar"  >
                                       <i class="material-icons">edit</i>
                                    </a>
                                  </td>
                                  <td class="td-actions text-right">
                                  	 <a class="btn btn-danger btn-simple elmnbtn" rel="tooltip" title="Deshabilitar">
                                       <i class="material-icons">block</i>
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

            <!-------------------------------------------------- Modal para Agregar ------------------------------------------------------>
            <div class="modal fade" id="Agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-notice" role="document">
               <div class="wizard-container">
                <div class="card wizard-card" data-color="green" id="wizardProfile">
                 <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    </div>
                  <div class="modal-body">
                        <!--      Wizard container        -->
                                <form action="Agregar.php" method="POST" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Agregar Domiciliario
                                        </h3>
                                        <h5>Ingresa la informacion del Domiciliario.</h5>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#cuenta" data-toggle="tab">Cuenta</a>
                                            </li>
                                            <li>
                                                <a href="#personal" data-toggle="tab">Personal</a>
                                            </li>
                                            <li>
                                                <a href="#residencia" data-toggle="tab">Residencia</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="cuenta">
                                            <div class="row">
                                                <h4 class="info-text">Informacion de inicio de Sesion</h4>
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <div class="picture-container">
                                                            <div class="picture">
                                                                <img src="../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview"/>
                                                                <input name="userfile" type="file" id="wizard-picture" >
                                                            </div>
                                                            <h6>Elige una imagen</h6>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Usuario
                                                                <small>(requerido)</small>
                                                            </label >
                                                            <input name="Usuario" type="text" class="form-control" required onkeypress="return soloLetras(event);">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">vpn_key</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Contraseña
                                                                <small>(requerido)</small>
                                                            </label>
                                                            <input name="Contraseña" type="password" class="form-control"required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Correo
                                                                <small>(requerido)</small>
                                                            </label>
                                                            <input name="Correo" type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="personal">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informacion Personal </h4>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre(s).</label>
                                                        <input name="nombre" type="text" class="form-control" required onkeypress="return soloLetras(event);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellidos.</label>
                                                        <input name="apellidos" type="text" class="form-control" required onkeypress="return soloLetras(event);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Documento</label>
                                                        <input name="documento" type="text" class="form-control" required onkeypress="return SoloNumeros(event);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Tipo de Documento</label>
                                                        <select name="tipoDocumento" class="form-control" title="tipoDocumento" required>
                                                            <option disabled="" selected="" value=""></option>
                                                            <?php
                                                              $sql = "SELECT * FROM TipoDocumento";
                                                              $query = $conectar->query ($sql);
                                                              while ($valores = mysqli_fetch_array($query)) {
                                                                  echo '<option value="'.$valores[idTipoDocumento].'">'.$valores[nombre].'</option>';
                                                              }
                                                              ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Acerca de</label>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Pequeña descripcion del domiciliario</label>
                                                            <textarea name="descripcion" class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="residencia">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informacion de Residencia </h4>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Direccion</label>
                                                        <input name="direccion" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Telefono.</label>
                                                        <input name="telefono" type="text" class="form-control" required onkeypress="return SoloNumeros(event);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Codigo Postal.</label>
                                                        <input name="codigoPostal" type="text" class="form-control" required onkeypress="return SoloNumeros(event);">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Municipio</label>
                                                         <select name="municipio" class="form-control" title="municipio" required>
                                                            <option disabled="" selected="" value=""></option>
                                                            <?php
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
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='Siguiente' value='Siguiente' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='Agregar' value='Agregar' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='Volver' value='Volver' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->

                  </div>
                </div>
              </div>
            </div>
    <!-------------------------------------------------- Modal para Agregar ------------------------------------------------------>


          <!-------------------------------------------------- Modal para editar ------------------------------------------------------>
            <div class="modal fade" id="Modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice">
                 <div class="card">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            <h5 class="modal-title" id="myModalLabel">Modificar un Domiciliario</h5>
                        </div>
                        <div class="modal-body">
                                <form method="POST" action="Modificar.php" class="form-horizontal">
                                  <input type="hidden" name="update_id" id="update_id">
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Nombre(s)</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="nombre" id="nombres"  class="form-control" value required onkeypress="return soloLetras(event);"> 
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left">Apellido(s)</label>
                                            <div class="col-sm-5">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="apellidos" id="apellidos" class="form-control" value required onkeypress="return soloLetras(event);">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Documento</label>
                                            <div class="col-sm-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="documento" id="Documento"  class="form-control" value required onkeypress="return SoloNumeros(event);">
                                                    <span class="help-block">Solo caracteres numericos</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tipo de Documento</label>
                                                    <select name="tipoDocumento" class="form-control" title="tipoDocumento" required>
                                                        <option disabled="" selected="" value></option>
                                                        <?php
                                                          $sql = "SELECT * FROM TipoDocumento";
                                                          $query = $conectar->query ($sql);
                                                          while ($valores = mysqli_fetch_array($query)) {
                                                              echo '<option value="'.$valores[idTipoDocumento].'">'.$valores[nombre].'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Direccion</label>
                                            <div class="col-sm-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="direccion" id="Direccion"  class="form-control" value required>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left">Telefono</label>
                                            <div class="col-sm-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="telefono" id="Telefono"  class="form-control" value required onkeypress="return SoloNumeros(event);">
                                                    <span class="help-block">Solo caracteres numericos</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">CodigoPostal</label>
                                            <div class="col-sm-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="codigoPostal" id="CodigoPostal"  class="form-control" value required onkeypress="return SoloNumeros(event);">
                                                    <span class="help-block">Solo caracteres numericos</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Municipio</label>
                                                    <select name="tipoMunicipio" class="form-control" title="tipoMunicipio" required>
                                                        <option disabled="" selected="" value></option>
                                                        <?php
                                                          $sql = "SELECT * FROM Municipio";
                                                          $query = $conectar->query ($sql);
                                                          while ($valores = mysqli_fetch_array($query)) {
                                                              echo '<option value="'.$valores[idMunicipio].'">'.$valores[nombre].'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                            <label>Descripcion</label>
                                            <div class="form-group">
                                              <label>Aqui puede ir una pequeña descripcion del domiciliario</label>
                                              <textarea class="form-control" rows="3" id="Descripcion" name="descripcion"></textarea>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                        <div class="modal-footer text-center">
                            <button type="submit"  name="Modificar" value="Modificar" class="btn btn-success btn-round">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
          <!-------------------------------------------------- Modal para editar ------------------------------------------------------>

          <!-------------------------------------------------- Modal para Eliminar  ------------------------------------------------------>
        <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    </div>
                    <form action="Eliminar.php" method="POST">
                    <div class="modal-body text-center">
                        <h5>Estas seguro que quieres deshabilitar al domiciliario? </h5>
                        <input type="hidden" name="delete_id" id="delete_id">
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success btn-simple"  name="Eliminar" value="Eliminar">Si</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

      <!-------------------------------------------------- Modal para editar ------------------------------------------------------>

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


    <?php 
          if (isset($_POST["mensaje"])) {
            if($_POST["mensaje"] === "1") {
              echo '<script>
                      $(document).ready(function() {
                       demo.showNotification("bottom","right","success",100,"done","Domiciliario guardado exitosamente");
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



<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>