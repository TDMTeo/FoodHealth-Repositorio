<?php
  session_start();
if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 2){
    session_destroy();
    header('location: ../');
  }

?>
<!DOCTYPE html>
<html lang="es">
  
 <head>
    <meta charset="utf-8">
    <title>Cliente</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/png" href="../Chef/assets/img/favicon.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    
    <link href="assets/css/style.css" rel="stylesheet">
    
    <link href="assets/css/pages/reports.css" rel="stylesheet">


  </head>

<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Food Health </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> cliente@gmail.com <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Perfil</a></li>
              <li><a href="closelogin.php">Cerrar Sesión</a></li>
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
        <li class="active"><a href="#"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>
        <li><a href="#"><i class="icon-calendar"></i><span>Calendario</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Reportes</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Valoración</a></li>
            <li><a href="#">Seguimiento</a></li>
          </ul>
        </li>
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
	      	
	      	<div class="span12">
	      
	      	<div class="info-box">
               <div class="row-fluid stats-box">
                  <div class="span4">
                  	<div class="stats-box-title">Citas Completadas</div>
                    <div class="stats-box-all-info"><i class="icon-user" style="color:#3366cc;"></i> 55</div>
                    <div class="wrap-chart"><div id="visitor-stat" class="chart" style="padding: 0px; position: relative;"></div></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Próxima Cita</div>
                    <div class="stats-box-all-info"><i class="icon-thumbs-up"  style="color:#F30"></i> 55</div>
                    <div class="wrap-chart"><div id="order-stat" class="chart" style="padding: 0px; position: relative;"></div></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Platos Consumidos</div>
                    <div class="stats-box-all-info"><i class="icon-shopping-cart" style="color:#3C3"></i> 55</div>
                    <div class="wrap-chart">
                    
                    <div id="user-stat" class="chart" style="padding: 0px; position: relative;"></div>
                    
                    </div>
                  </div>
               </div>
               
               
             </div>
               
               
         </div>
         </div>      
	      	
	  	  <!-- /row -->
	
	      <div class="row">
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Seguimiento</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<canvas id="pie-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
							
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Progreso</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	      
	      
	      
			
	      
	      
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
    

<script src="assets/js/jquery-1.7.2.min.js"></script>
<script src="assets/js/excanvas.min.js"></script>
<script src="assets/js/chart.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/base.js"></script>
<script>

    var pieData = [
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}

			];

    var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
	
	</script>


  </body>

</html>
