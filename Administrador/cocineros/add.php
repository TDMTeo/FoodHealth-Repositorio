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
        <li><a href="../paquetes/"><i class="icon-gift"></i><span>Paquetes</span> </a></li>
                 <li><a href="../documentos/"><i class="icon-picture"></i><span>Tipos Documentos</span> </a></li>
        <li><a href="../perfiles/"><i class="icon-unlock"></i><span>Perfiles</span> </a></li>
        <li><a href="../ocupaciones/"><i class="icon-time"></i><span>Ocupaciones</span> </a></li>
        <li><a href="../citas/"><i class="icon-pushpin"></i><span>Tipos Citas</span> </a></li>
        <li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Empleados</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../nutritionist/">Nutricionistas</a></li>
            <li><a href="../chefs/">Chefs</a></li>
            <li class="active"><a href="#">Cocineros</a></li>
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
                $tipodocumento = $_POST['tipodocumento'];
                $documento = mysqli_real_escape_string($conn,(strip_tags($_POST['documento'], ENT_QUOTES)));
                $nombres = mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
                $apellidos = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidos'], ENT_QUOTES)));
                $telefono  = mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
                $municipio = $_POST['municipio'];
                $direccion = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
                $codigopostal = mysqli_real_escape_string($conn,(strip_tags($_POST['codigopostal'], ENT_QUOTES)));
                $usuario = mysqli_real_escape_string($conn,(strip_tags($_POST['usuario'], ENT_QUOTES)));
                $correo = mysqli_real_escape_string($conn,(strip_tags($_POST['correo'], ENT_QUOTES)));
               
                $clave = "1234567890";
                $insert = mysqli_query($conn, "INSERT INTO usuarios(idUsuario, Usuario, Correo, Clave, Perfil)
                    VALUES(NULL,'$usuario', '$correo', MD5('$clave'), 2)") or die(mysqli_error());

                        if($insert){

                          $consulta = mysqli_query($conn, "SELECT idUsuario FROM usuarios WHERE Usuario = '$usuario'");

                            $a = mysqli_fetch_array($consulta);
                            $id= $a["idUsuario"];

                            $insertcliente = mysqli_query($conn, "INSERT INTO  cocineros(idCocinero, idTipoDocumento, n_Documento, nombres, apellidos, telefono, idMunicipio, direccion, idUsuario, codigopostal, aboutme, estado)
                            VALUES(NULL,'$tipodocumento', '$documento', '$nombres', '$apellidos', '$telefono', '$municipio', '$direccion', '$id', '$codigopostal', NULL, 1)") or die(mysqli_error());

                            if($insertcliente)
                            {
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
                                window.location = '../cocineros/';
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
                            window.location = '../cocineros/';
                        });

                          </script>";
                        }
                
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
                            window.location = '../cocineros/';
                        });

                          </script>";
                        }
                      }
            ?>

<div id="wrapper">
  
  <h1>Agregar Cocinero</h1><br>
  
  <form name="form1" id="form1" action="add.php" method="POST">
  <div class="col-3">
    <label>
      Tipo Documento
      <select name="tipodocumento" id="tipodocumento" tabindex="1">
        <?php
          $quera = $conn -> query("SELECT * FROM tipodocumento WHERE estado = 1");
          while($valoress = mysqli_fetch_array($quera)){
          echo '<option value="'.$valoress[idTipoDocumento].'">'.$valoress[nombre].'</option>';
          }
        ?>
      </select>
    </label>
  </div>
  <div class="col-3">
    <label>
      Número Documento
      <input type="number" required minlength="5" placeholder="Ingrese su número de documento" id="documento" name="documento" tabindex="2">
    </label>
  </div>
  <div class="col-3">
    <label>
      Usuario
      <input type="text" required minlength="5" placeholder="Ingrese su usuario" id="usuario" name="usuario" tabindex="2">
    </label>
  </div>
  
  <div class="col-3">
    <label>
      Nombres
      <input type="text" required minlength="3" placeholder="Ingrese sus nombres" id="nombres" name="nombres" tabindex="3">
    </label>
  </div>
  <div class="col-3">
    <label>
      Apellidos
      <input type="text" required minlength="3" placeholder="Ingrese sus apellidos" id="apellidos" name="apellidos" tabindex="4">
    </label>
  </div>
  <div class="col-3">
    <label>
      Municipo
      <select tabindex="5" name="municipio" id="municipio">
         <?php
           $query = $conn -> query("SELECT * FROM municipio WHERE estado = 1");
           while($valores = mysqli_fetch_array($query)){
           echo '<option value="'.$valores[idMunicipio].'">'.$valores[nombre].'</option>';
           }
         ?>
      </select>
    </label>
  </div>
  <div class="col-4">
    <label>
      Télefono
      <input type="number" required minlength="3" placeholder="Ingrese su télefono" id="telefono" name="telefono" tabindex="6">
    </label>
  </div>
  <div class="col-4">
    <label>
      Dirección
      <input type="text" required minlength="3" placeholder="Ingrese su dirección" id="direccion" name="direccion" tabindex="7">
    </label>
  </div>
  <div class="col-4">
    <label>
      Código Postal
      <input type="number" required minlength="3" placeholder="Ingrese su código postal" id="codigopostal" name="codigopostal" tabindex="7">
    </label>
  </div>
  <div class="col-4">
    <label>
      Correo Eléctronico
      <input type="email" required placeholder="Ingrese su correo eléctronico" id="correo" name="correo" tabindex="7">
    </label>
  </div>
  
  <div class="col-submit">
    <button class="submitbtn" type="submit" name="input" id="input"><i class="icon-save"></i> Agregar</button>
  </div>
  <div class="col-submit">
    <a href="../cocineros/" class="btn btn-danger"><i class="icon-remove"></i> Cancelar</a>
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

</body>
</html>