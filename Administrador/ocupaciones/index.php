<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 1){
    session_destroy();
    header('location: ../');
  }

?>
<!DOCTYPE html>
<html lang="es">
  
 <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" href="../../Chef/assets/img/favicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="../../Chef/assets/datatables/dataTables.bootstrap.css"/>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    
    <link href="../assets/css/style.css" rel="stylesheet">
  


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
        <li class="active"><a href="#"><i class="icon-time"></i><span>Ocupaciones</span> </a></li>
        <li><a href="../citas/"><i class="icon-pushpin"></i><span>Tipos Citas</span> </a></li>
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

<div class="main">
  
  <div class="main-inner">

      <div class="container">
         <div class="row">
            <div class="col-md-12">
              <div class="card">
                
                <div class="card-header card-header-primary">
                  <br><br>
                  <h4 class="card-title "></h4>
                  <div class="pull-right">
                   <a style="background: white; color: black" href="add.php" class="btn btn-primary"><i class="icon-plus-sign"></i> Nuevo</a>               
                   </div>
                  <div class="pull-right">
                   <a style=" margin-right: 5px; margin-left: 20px;" target="_blank" href="../reportes/reportOcupaciones.php" class="btn btn-primary"><i class="icon-save"></i></a>               
                   </div>                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="lookup" class="table">
                      <thead class="text-primary">
                        <th>#</th>
                        <th>Ocupación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                      </thead>
                     
                    </table>
                  </div>
                </div>
            </div>
          </div>
         </div>
        
      </div> <!-- /container -->
      
  </div> <!-- /main-inner -->
    
</div> <!-- /main -->
    

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
<script src="../../Chef/assets/datatables/jquery.dataTables.js"></script>
        <script src="../../Chef/assets/datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
  
         "language":  {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "<h10 style='margin-left: 33px;'>Mostrar : </h10>",
          "sZeroRecords":    "No se encontraron datos",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar: ",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "First":    "Primero",
            "sLast":     "Último",
            "sNext" :     "Siguiente ",
            "sPrevious": "Anterior "
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },

          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"data.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
              
            }
          }
        } );
      } );
        </script>
  </body>

</html>
