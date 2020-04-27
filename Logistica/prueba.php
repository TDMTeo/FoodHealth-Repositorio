<?php 

$Cantidad = 3;

	function numeroRandom($Cantidad){
			for ($i=0; $i <= $Cantidad ; $i++) { 
			       $Random = rand(1,$Cantidad);
			   }
			 return $Random;
	}

	$r = numeroRandom($Cantidad);
	$d = numeroRandom($Cantidad);
	$e = numeroRandom($Cantidad);
	$f = numeroRandom($Cantidad);
	$g = numeroRandom($Cantidad);
	echo $r;
	echo "<br>";
	echo $d;
	echo "<br>";
	echo $e;
	echo "<br>";
	echo $f;
	echo "<br>";
	echo $g;
	echo "<br>";
 ?>