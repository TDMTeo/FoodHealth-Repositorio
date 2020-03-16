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
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/png" href="../../Chef/assets/img/favicon.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administrador</title>
  <link rel="stylesheet" type="text/css" media="all" href="../assets/css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../assets/css/switchery.min.css">
  <script type="text/javascript" src="../assets/js/switchery.min.js"></script>
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
        <li><a href="#"><i class="icon-gift"></i><span>Paquetes</span> </a></li>
        <li><a href="../documentos/"><i class="icon-picture"></i><span>Tipos Documentos</span> </a></li>
        <li><a href="../perfiles/"><i class="icon-unlock"></i><span>Perfiles</span> </a></li>
        <li><a href="../ocupaciones/"><i class="icon-time"></i><span>Ocupaciones</span> </a></li>
        <li class="active"><a href="../citas/"><i class="icon-pushpin"></i><span>Tipos Citas</span> </a></li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Empleados</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../nutritionist/">Nutricionistas</a></li>
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
           $id = $_GET['i'];

            $sql = mysqli_query($conn, "SELECT * FROM tipocita  WHERE idTipoCita='$id'");
            if(mysqli_num_rows($sql) == 0){
                header('location: ../citas/');
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            ?>


  <div id="wrapper">
  
  <h1>Editar tipo cita</h1><br>
  
  <form name="form1" id="form1" action="update.php" method="POST">
    <div class="col-2">
     <input  type="hidden" name="id" id="id" value="<?php echo $row['idTipoCita']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
    <label>
      Nombre
      <input type="text" required minlength="5" placeholder="Ingrese nombre del tipo cita" id="Nombre" name="Nombre"tabindex="1" value="<?php echo $row['Nombre']; ?>">
    </label>
  </div>
  <div class="col-2 switch">
    <label>
    Estado</label>
     <?php 
      $estado = $row['Estado'];

      if($estado == 1){
        echo "<center style='position:relative;margin-bottom:8px;'><input checked id='Estado' name='Estado'  type='checkbox' class='js-switch'></center>";
      } else {
        echo "<center style='position:relative;margin-bottom:8px;'><input id='Estado' name='Estado'  type='checkbox' class='js-switch'></center>";
      }
    ?>
  </div>
  
  <div class="col-submit">
    <button class="submitbtn" type="submit" name="update" id="update"><i class="icon-save"></i> Editar</button>
  </div>
  <div class="col-submit">
    <a href="../citas/" class="btn btn-danger"><i class="icon-remove"></i> Cancelar</a>
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

<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
<script src="../assets/js/jquery-1.7.2.min.js"></script>
<script src="../assets/js/excanvas.min.js"></script>
<script src="../assets/js/chart.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/base.js"></script>

</body>
</html>