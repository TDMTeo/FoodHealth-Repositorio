<?php 

include('../php/Conexion.php');

  session_start();
if (isset($_POST['Cerrar'])) {
	$id = $_POST['id'];

	$query1= "UPDATE notificaciones SET leido = 'si' WHERE id = '$id';";
	$guardar1 =mysqli_query($conectar, $query1);

	if ($guardar1) 
		 {
			//header("Location: ../Domiciliarios.php?status=2");
	       echo '<body onload="document.formulario.submit()">
           <form action="../index.php" method="post" name="formulario">
           <input type="hidden" name="mensaje" value="1">
           </body>
           </form> ';
		
	}
	else{
		echo "<br>";
		echo $consulta;
		echo "Error al guardarlo en usuarios";
		echo $query1;
	}
	
	}
	
 ?>