<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 2){
  	session_destroy();
    header('location: login/');
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  
	
   include 'conexion.php';
   $sql= "select * from usuarios";
   $resultado=mysqli_query($conn,$sql);

?>

<div>
	<table>
		<thead>
		<tr>
			<th>IdUsuario</th>
			<th>Nombres</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Clave</th>
			<th>Acciones</th>
		</tr>
	  </thead>
	  <tbody>
	  	<?php while ($filas=mysqli_fetch_assoc($resultado)) {
	  		
 ?>
	  	<tr>
	  		<td><?php echo $filas['idUsuario'] ?></td>
	  		<td><?php echo $filas['Nombres'] ?></td>
	  		<td><?php echo $filas['Usuario'] ?></td>
	  		<td><?php echo $filas['Correo'] ?></td>
	  		<td><?php echo $filas['Clave'] ?></td>
	  		<td> 
	  			<a href="">Editar</a>
	  			<a href="">Eliminar</a>

	  		</td>
	  	</tr>
	  <?php } ?>
	  </tbody>
	</table><br><br>
<a href="login/cerrarsesion.php">CERRAR SESION</a>
</div>




</body>
</html>