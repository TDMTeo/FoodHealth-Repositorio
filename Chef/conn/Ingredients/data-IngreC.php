<?php
 include "../conn.php";

/* Conexión Terminada */


// storing  request (id, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// Nombre de las columnas 
	0 => 'id',
    1 => 'nombre',
    2 => 'cantidad', 
	3 => 'colesterol',
	4 => 'calorias',
    5 => 'grasa',
    6 => 'azucar',
    7 => 'carbohidratos',
    8 => 'exis' 
);

// Traemos todos los datos 
$sql = "SELECT id, nombre, cantidad, colesterol, calorias, grasa, azucar, carbohidratos, exis";
$sql.=" FROM ingredientes ";
$query=mysqli_query($conn, $sql) or die("data-IngreC.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  


if( !empty($requestData['search']['value']) ) {
	$sql = "SELECT id, nombre, cantidad, colesterol, calorias, grasa, azucar, carbohidratos,exis ";
	$sql.=" FROM ingredientes";
	$sql.=" WHERE  nombre LIKE '".$requestData['search']['value']."%' ";  
	$query=mysqli_query($conn, $sql) or die("data-IngreC.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("data-IngreC.php: get PO"); 
	
} else {	

	$sql = "SELECT id, nombre, cantidad, colesterol, calorias, grasa, azucar, carbohidratos, exis ";
	$sql.=" FROM ingredientes ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("data-IngreC.php: get PO");
	
}

$data = array();
$num = "1";
while( $row=mysqli_fetch_array($query) ) {  
	$nestedData=array(); 

	$exis = $row["exis"];

	
	if ($exis == 1){
		$exis = '<td>
                     <a data-toggle="tooltip" title="Activo" class="btn btn-success"> <i class="material-icons">done</i> </a>';
	}else{
		$exis = '<td>
                     <a data-toggle="tooltip" title="Inactivo" class="btn btn btn-danger"> <i class="material-icons">clear</i> </a>';
	}
    $nestedData[] = $num;
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["cantidad"]."Gr";
	$nestedData[] = $row["colesterol"]." Mg";
	$nestedData[] = $row["calorias"]." Gr";
    $nestedData[] = $row["grasa"]." Gr";
    $nestedData[] = $row["azucar"]." Gr";
    $nestedData[] = $row["carbohidratos"]." Gr";
    $nestedData[] = $exis;
   
	
	$data[] = $nestedData;
    $num++;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   
			"recordsTotal"    => intval( $totalData ), 
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data   
			);

echo json_encode($json_data);  // Todos los datos se devuelven en un JSON

?>
