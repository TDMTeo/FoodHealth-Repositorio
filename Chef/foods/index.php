<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>

<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query("SELECT alimentos.idAlimento, alimentos.nombreAlimento, GROUP_CONCAT(ingredientes.id, '..',  ingredientes.nombre, '..', ingredientes_usados.cantidad SEPARATOR '__') AS ingredientes 

	FROM alimentos INNER JOIN ingredientes_usados ON ingredientes_usados.idAlimento = alimentos.idAlimento INNER JOIN ingredientes ON ingredientes.id = ingredientes_usados.idIngrediente WHERE alimentos.estado = 1 GROUP BY alimentos.idAlimento ORDER BY alimentos.idAlimento ;");

$alimentos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Chef</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a class="simple-text logo-normal">
          Menú Principal
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../user.php">
              <i class="material-icons">person</i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../generatemenu.php">
              <i class="material-icons">content_paste</i>
              <p>Generar Platos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../customers.php">
              <i class="material-icons">how_to_reg</i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <i class="material-icons">ballot</i>
              <p>Alimentos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../ingredients.php">
              <i class="material-icons">ballot</i>
              <p>Ingredientes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../tipoAlimento.php">
              <i class="material-icons">emoji_food_beverage</i>
              <p>Tipo Alimento</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../tipoPlato.php">
              <i class="material-icons">fastfood</i>
              <p>Tipo Plato</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../closelogin.php">
              <i class="material-icons">power_settings_new</i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Alimentos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Buscar...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">5 Clientes Nuevos</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Perfil
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="../user.php">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../closelogin.php">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

	<!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Alimentos </h4>
                  <div class="pull-right">
                  	<a style="background: white; color: black" href="./addFood.php" class="btn btn-primary"><i class="material-icons">add</i>Nuevo</a>               
                   </div>
                  <p class="card-category"> Alimentos Utilizados</p>
                  
                </div>

		<?php
			if(isset($_GET["status"]))
			{
				if($_GET["status"] === "1")
				{
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Desactivado correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2")
				{
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Alimentos agregado correctamente
						</div>
					<?php
				}
			}
		?>
		<br>
		<table id="lookup" class="table">
			<div class="table-responsive">
			<thead  class=" text-primary">
					<th>#</th>
					<th>Nombre</th>
					<th class="text-center">Ingredientes</th>
					<th class="text-center">Acciones</th>
			</thead>
			<tbody>
				<?php foreach($alimentos as $alimentos){ ?>
					<th><?php echo $alimentos->idAlimento ?></th>
					<th><?php echo $alimentos->nombreAlimento ?></th>
					<td>
						<table id="lookup" class="table">
							<thead  class="text-primary">
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $alimentos->ingredientes) as $alimentosConcatenados){ 
								$food = explode("..", $alimentosConcatenados)
								?>
								<tr>
									<td><?php echo $food[0] ?></td>
									<td><?php echo $food[1] ?></td>
									<td><?php echo $food[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td class="text-center">
            <a class="btn btn-success" href="<?php echo "editFood.php?idAlimento=".$alimentos->idAlimento."rVupvu4,xWRRmNAfu,;P{w{yzyFr*ii]?i#!a_(D4C:*FN6NW(#D*Ri{&d8]aa8WS&iv%8Y2b)fxVn.9{J?2)]HM8?/m#jAahKpjR;a+;wq)YhTe]HqucLGbaG%wy;Y3TaiwaZP69i&qZ6Qc_zf@}gU:aPng?+(_7{,}yFP}8CQ8aQ!CX/3/C]ELJxdY#***+h8K#HP;-fy[U4RMv5)Q!?&}t:{==cdrzUg9j)Xr}RW=5A7@QaRWicz[+C*7g4q+x,AMM&t@[SW6A8hzntn4n.mx/pHm#E22pC)(PdXLx2TBre8Y96@/C:}x,WPvNj&t}%.9)A.Xf_hbGL=&HnV3]?Hc(bj6G:R)X/E_wq2897q{Sg77D7d;p/v=AF(HVPxjR7v2nmEB)[p$}QFfg=WV*xZrgKb]hM(Y4xnr8Py8vCPQ&F*a4xX7i-V)r{,J?}jMLr/AmThf2Sh2=R}BQC//42VwRGj/ckPyu_.-qx5+M#aR$+!Dk8-H8BQDQ+KPKPcp}LE@e#*+R*/m*9v!qZ!!kA#f/+N(*}xZ65+P=tL:c,/c;wzH3FtTCAub/_?tA%;]c{4e}[z,SHD-:Pcmyu7x4apRxA9+gf}QN!=f/[@3E{FUmF6v&LP#j:(T)F%rw+5;[G*H_uwcHPS@M-BtuCc,X;ZUwFCSwpR%,.)#-SVm7-R3(n}z!_M:f]B%{HF[gZmeE?i@/S9ZEy.kFDe3}W!j2MuKD7e@vepHZ{4k3)V_Q,zi/39=f#RT?{U?TkP/ym=EEb+iz(Ppmq?e_)-Pp!]{e:)p}G}2?T*q/=MW]u4RVJeTjg)kM2,Ruqka2d]dWb!z]ETgSD)vhmxZ8_pH2{faW#Um8,6Xg-;B/4,+-k%?Q%U;Pa-}{&ME+DWZ#d8:F.abQZJDEi}#g$}#Ym4id2a@m?}iR:w!db@WkZY)6-2[ZJX=cunH{(PViwm4XvB}2D@@"?>"><i class="fa fa-pencil"></i></a>

            <a class="btn btn-danger" href="<?php echo "deleteFood.php?idAlimento=" . $alimentos->idAlimento?>"><i class="fa fa-trash"></i></a>
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
      <footer class="footer">
        <div class="container-fluid">
        <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> Food Health
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
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
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
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
 <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
   
    <script src="assets/js/jquery.min.js"></script>
	</div>
	</body>
</html>