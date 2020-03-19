<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
    <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">  
      
    <link rel="stylesheet" href="../plugins/animate.css/animate.css">  
<body>
	<?php

include('Conexion.php');
  session_start();
if (isset($_POST['AsignarRuta'])) {
	
	$JefeLogistica = $_SESSION['idUsuario'];
	$Domiciliario = $_POST['idDomiciliario'];
	$TEstimadoR = $_POST['Tiempo_Estimado'];
	$TEstimadoT = $_POST['TiempoE'];
	$TAproximadoR = $_POST['Tiempo_Aproximado'];
	$TAproximadoT = $_POST['TiempoA'];

	$TEstimado = $TEstimadoR.' '.$TEstimadoT;
	$TAproximado = $TAproximadoR.' 	'.$TAproximadoT;
	
	$query = "INSERT INTO ruta(idJefeLogistica,idDomiciliario,Tiempo_Estimado,Tiempo_Aproximado) VALUES ('$JefeLogistica','$Domiciliario','$TEstimado','$TAproximado')";
	$guardar = mysqli_query($conectar, $query);

	if ($guardar) {
				echo '<script>
					let timerInterval
						$("#btn8").click(function(){
						    Swal.fire({
						      type: "success",
						      title: "Ruta Creada",
						      timer: 2000 , //tiempo del timer,
						      onClose: () => {
						        clearInterval(timerInterval)
						      }
						    }).then((result) => {
						      if (
						        // Read more about handling dismissals
						        result.dismiss === Swal.DismissReason.timer
						      ) {
						        console.log("I was closed by the timer")
						      }
						    });    
						});
				</script>';
		}
	else
		{
			$_SESSION['mensaje'] = 'Error Al Crear La Ruta'; 
			header("Location: ../Crear_Ruta.php");  
		}
	
	}
	
	/*
	echo "Domiciliario:";
	echo $Domiciliario;
	echo "<br>";
	echo "JefeLogistica: ";
	echo $JefeLogistica;
	echo "<br>";
	echo "Tiempo Estimado: ";
	echo $TEstimado;
	echo "<br>";
	echo "Tiempo Aproximado: ";
	echo $TAproximado;
	*/

?>

	<script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
</body>
</html>
