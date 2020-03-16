<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../../');
  }

?>
<?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
?>
<?php include "../conn/conn.php"; ?>
<?php 
$idAlimento = $_GET['idAlimento'];
if($idAlimento == 1){
  echo "<script>alert('Bien');</script>";
} else {
  echo "<script>alert('Mal');</script>";
}
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
            <a class="navbar-brand">Editar alimento</a>
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
                  <h4 class="card-title "> Editar alimento </h4>
                  <p class="card-category"> Editar alimento</p>
                  
                </div>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Ingrediente quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El ingrediente que buscas no existe
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba el alimento
						</div>
					<?php
				}
			}
		?>
		  <div class="card-body">
                  <div class="table-responsive">
                    <div class="container" >
		<form method="post" action="addingrediente.php" class="form-horizontal row-fluid" style="padding: 10px; background-color: white; border-radius: 10px">
			<div style="width: 100%" >
                                <div class="row">
                                	  <div class="col">
			<label for="codigo" class="control-label">Ingrediente:</label>
			   <div class="controls">
			   	<select name="codigo" id="codigo" class="form-control">
			<?php
          $queryy = $conn -> query ("SELECT * FROM ingredientes");
          while ($valoress = mysqli_fetch_array($queryy)) {
            echo '<option value="'.$valoress[id].'">'.$valoress[nombre].'</option>';
          }
        	?>
			   	</select>
		</div>
		<button type="submit" class="btn btn-success"><i class="material-icons">add</i> Agregar Ingrediente</button>
		</form>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitar.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<form action="./terminar.php" method="POST">
			<label for="tipoAlimiento">Tipo de alimento:</label>
			<select name="tipoAlimiento" id="tipoAlimiento" class="form-control">

		<?php
          $query = $conn -> query ("SELECT * FROM alimentos WHERE idAlimento = '$idAlimento'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idTipoAlimento].'">'.$valores[idTipoAlimento].'</option>';
          }
        ?>
			</select><br>

      <?php
          $sql = mysqli_query($conn, "SELECT * FROM alimentos");
          if(mysqli_fetch_array($sql) == 0){
            header("Location: ../");
          }else {
            $row = mysqli_fetch_assoc($sql);
          }
          mysqli_close($conn);
        ?>
			<label for="nombreAlimento">Nombre del alimento:</label>
			<input autocomplete="off" autofocus class="form-control" name="nombreAlimento" required type="text" id="nombreAlimento" placeholder="Escribe el nombre" type="text" minlength="3" 
      value="<?php echo $row['nombreAlimento'];?>"><br>
			
			<button type="submit" class="btn btn-success"><i class="material-icons">save</i> Terminar</button>
			<a href="./cancelar.php" class="btn btn-danger pull-right"><i class="material-icons">clear</i> Cancelar</a>
		</form>
	</div>
</div>
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