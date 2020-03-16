<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Chef/assets/img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="../Chef/assets/css/sweetalert2.all.min.js"></script>
	<script src="../Chef/assets/css/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Chef/assets/css/sweetalert2.min.css">
<!--===============================================================================================-->
</head>
<body>
<?php
  include "login/model/conn.php";
   //Cita
   //
   $valor = 0;
   $si = 0;
   				if(isset($_POST['cita']))
   				{
   				$nombreCita = mysqli_real_escape_string($conn,(strip_tags($_POST['nombreC'], ENT_QUOTES)));
  	            $apellidoCita = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidoC'], ENT_QUOTES)));
  	            $sede = $_POST['sede'];
  	            $nutri = $_POST['nutri'];
  	            $date = $_POST['date'];
  	            $time = $_POST['time'];
  	            $valor = $_POST['valor'];
  	            if ($valor == 1) {
  	            	echo "<script>
                  Swal.fire(
                     'Registro',
                     'Finalice su registro.',
                     'info'
                   ); 
  	            	</script>";
  	            $valor = 1; 	
  	            $si = 1;
  	            }

   				} 	            

  
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="POST" action="reg.php" onsubmit="return registrofinal();">
					<span class="login100-form-title" style="margin-top:">
						Registro
					</span>
				<div id="div1">
					<input type="hidden" name="sede" id="sede" value="<?php echo $sede?>">
					<input type="hidden" name="nutri" id="nutri" value="<?php echo $nutri?>">
					<input type="hidden" name="date" id="date" value="<?php echo $date?>">
					<input type="hidden" name="time" id="time" value="<?php echo $time?>">
					<input type="hidden" name="si" id="si" value="<?php echo $si?>">
					<div class="wrap-input100 " >
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<input class="input100"  type="password" id="clave" name="clave" placeholder="Clave">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<input class="input100"  type="password" id="Cclave" 
						name="Cclave" placeholder="Confirmación">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn"  onclick="registro();" value="Siguente"
						 style="text-align: center; cursor: pointer;" readonly>
					</div>
					<div class="container-login100-form-btn">
						<a class="login100-form-btn" href="../lang/">Volver</a>
						
					</div>


				</div>
				<div id="div2" style="display: none">	
					<div class="wrap-input100 ">
						<input class="input100" type="text" id="nombre" name="nombre" placeholder="Nombre"
						value="<?php if($valor != 1)
						{
							echo "";
						}else 
						{
							echo $nombreCita;
						}?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="text" id="apellido" name="apellido" placeholder="Apellido"
						value="<?php if($valor != 1)
						{
							echo "";
						}else 
						{
							echo $apellidoCita;
						}?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="number" id="telefono" name="telefono" placeholder="Télefono">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="email" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn"  onclick="registro2();" value="Siguente"
						 style="text-align: center; cursor: pointer;" readonly>
					</div>
				</div>
				<div id="div3" style="display: none">
					<div class="wrap-input100 ">
						<select class="input100" name="ocupacion" id="ocupacion">
							<?php 
                             $query = $conn -> query("SELECT * from ocupacion");
                             while($row = mysqli_fetch_array($query))
                             	echo '<option value="'.$row[idOcupacion] .'">'.$row[nombre].'</option>';
							 ?>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<select class="input100" name="tipo" id="tipo">
							<?php 
                             $query = $conn -> query("SELECT * from tipodocumento");
                             while($row = mysqli_fetch_array($query))
                             	echo '<option value="'.$row[idTipoDocumento] .'">'.$row[nombre].'</option>';
							 ?>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<input class="input100" type="number" id="documento" name="documento" placeholder="Documento">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<input class="input100" type="text" id="direccion" name="direccion" placeholder="Direccion">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" id="input" name="input" onclick="registrofinal();" value="Registrar"
						 style="text-align: center; cursor: pointer;" readonly>
							
					</div>
				</div>
				   <div class="text-center p-t-12">
						<span class="txt1">
							Olvidó
						</span>
						<a class="txt2" href="#">
							Username / Clave?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.html">
							Iniciar Sesión
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="login/js/Mo.js"></script>
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>