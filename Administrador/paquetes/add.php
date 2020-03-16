<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 1){
    session_destroy();
    header('location: ../');
  }

?>
<?php include "../../Chef/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="es">
  
 <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" media="all" href="../assets/css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../assets/css/switchery.min.css">
  <script type="text/javascript" src="../assets/js/switchery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" href="../../Chef/assets/img/favicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="../../Chef/assets/datatables/dataTables.bootstrap.css"/>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    
    <link href="../assets/css/style.css" rel="stylesheet">
    
    <link href="../assets/css/pages/reports.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


  </head>

<body>
	<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Food Health </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> administrador@gmail.com <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../user.php">Perfil</a></li>
              <li><a href="../closelogin.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Buscar">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="../"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>
        <li><a href="../customers/"><i class="icon-list-alt"></i><span>Clientes</span> </a></li>
        <li class="active"><a href="#"><i class="icon-gift"></i><span>Paquetes</span> </a></li>
        <li><a href="../documentos/"><i class="icon-picture"></i><span>Tipos Documentos</span> </a></li>
        <li><a href="../perfiles/"><i class="icon-unlock"></i><span>Perfiles</span> </a></li>
        <li><a href="../ocupaciones/"><i class="icon-time"></i><span>Ocupaciones</span> </a></li>
        <li><a href="../citas/"><i class="icon-pushpin"></i><span>Tipos Citas</span> </a></li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Empleados</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nutricionistas</a></li>
            <li><a href="../chefs/">Chefs</a></li>
            <li><a href="../cocineros/">Cocineros</a></li>
            <li><a href="../logisticsmanager/">Jefe de logística</a></li>
            <li><a href="../domiciliary/">Domiciliarios</a></li>
          </ul>
        </li>
         <li><a href="#"><i class="icon-bar-chart"></i><span>Reportes</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div> <!-- /subnavbar -->

<?php
            if(isset($_POST['input'])){
                $Nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre'], ENT_QUOTES)));
                $Tiempo = mysqli_real_escape_string($conn,(strip_tags($_POST['Tiempo'], ENT_QUOTES)));
                $Precio = mysqli_real_escape_string($conn,(strip_tags($_POST['Precio'], ENT_QUOTES)));
                $Descripcion = mysqli_real_escape_string($conn,(strip_tags($_POST['Descripcion'], ENT_QUOTES)));
                $Estado = mysqli_real_escape_string($conn,(strip_tags($_POST['Estado'], ENT_QUOTES)));
               
                $insert = mysqli_query($conn, "INSERT INTO paquetes(IdPaquete, Nombre, Tiempo, Precio, Descripcion,Estado)
              VALUES(NULL, '$Nombre', '$Tiempo', '$Precio', '$Descripcion', 1)") or die(mysqli_error());
                        if($insert){

                              echo "<script>
                              Swal.fire({
                                icon: 'success',
                                title: '<strong><h2> Exito </h2></strong>',
                                html: '<h5> Agregado correctamente </h5>',
                                type: 'success',
                                padding: '3em',
                                timer: 2000,
                                showConfirmButton: false
                                
                              }).then(function() {
                                window.location = '../paquetes/';
                            });

                              </script>";

            			} else{

                            echo "<script>
                          Swal.fire({
                            icon: 'error',
                            title: '<strong><h2> Error </h2></strong>',
                            html: '<h5> Error al agregar </h5>',
                            width: 400,
                            type: 'success',
                            padding: '3em',
                            timer: 2000,
                            showConfirmButton: false
                            
                          }).then(function() {
                            window.location = '../paquetes/';
                        });

                          </script>";
                        }
                      }
            ?>

<div id="wrapper">
  
  <h1>Agregar Paquete</h1><br>
  
  <form name="form1" id="form1" action="add.php" method="POST">
  <div class="col-2">
    <label>
      Nombre
      <input type="text" required minlength="5" placeholder="Ingrese el nombre del paquete" id="Nombre" name="Nombre" tabindex="2">
    </label>
  </div>
  <div class="col-2">
    <label>
      Tiempo
      <input type="text" required minlength="5" placeholder="Ingrese el tiempo" id="Tiempo" name="Tiempo" tabindex="2">
    </label>
  </div>
    <div class="col-2">
    <label>
      Precio
      <input type="text" required minlength="5" placeholder="Ingrese el precio" id="Precio" name="Precio" tabindex="2">
    </label>
  </div>
    <div class="col-2">
    <label>
      Descripción
      <input type="text" required minlength="5" placeholder="Ingrese la descripción" id="Descripcion" name="Descripcion" tabindex="2">
    </label>
  </div>
  <div class="col-2">
   <label>
      Estado
    </label>
  </div>
  <div class="col-submit">
    <button class="submitbtn" type="submit" name="input" id="input"><i class="icon-save"></i> Agregar</button>
  </div>
  <div class="col-submit">
    <a href="../paquetes/" class="btn btn-danger"><i class="icon-remove"></i> Cancelar</a>
  </div>
  
  </form>
  </div><br>
<div class="footer">
  
  <div class="footer-inner">
    
    <div class="container">
      
      <div class="row">
        
          <div class="span12">
            &copy; <script>
              document.write(new Date().getFullYear())
            </script> <a href="#">Food Health</a>.
          </div> <!-- /span12 -->
          
        </div> <!-- /row -->
        
    </div> <!-- /container -->
    
  </div> <!-- /footer-inner -->
  
</div> <!-- /footer -->

<script src="../assets/js/jquery-1.7.2.min.js"></script>
<script src="../assets/js/excanvas.min.js"></script>
<script src="../assets/js/chart.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/base.js"></script>
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>
