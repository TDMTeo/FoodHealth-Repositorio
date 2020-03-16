<?php
 include "../../Chef/conn/conn.php";

/* Conexión Terminada */


// storing  request (id, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// Nombre de las columnas 
	0 => 'idNutricionista',
    1 => 'idTipoDocumento',
    2 => 'n_Documento', 
	3 => 'nombres',
	4 => 'apellidos',
    5 => 'telefono',
    6 => 'idMunicipio',
    7 => 'direccion',
    8 => 'idUsuario',
    9 => 'codigopostal',
    10 => 'aboutme',
    11 => 'estado' 
);

// Traemos todos los datos 
$sql = "SELECT idNutricionista, idTipoDocumento, n_Documento, nombres, apellidos, telefono, idMunicipio, direccion, idUsuario, codigopostal, aboutme, estado";
$sql.=" FROM nutricionista";
$query=mysqli_query($conn, $sql) or die("data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  


if( !empty($requestData['search']['value']) ) {
	$sql = "SELECT  idNutricionista, idTipoDocumento, n_Documento, nombres, apellidos, telefono, idMunicipio, direccion, idUsuario, codigopostal, aboutme, estado";
	$sql.=" FROM nutricionista";
	$sql.=" WHERE  nombres LIKE '".$requestData['search']['value']."%' "; 
	$sql.=" OR  apellidos LIKE '".$requestData['search']['value']."%' "; 
	$sql.=" OR  n_Documento LIKE '".$requestData['search']['value']."%' "; 
	$sql.=" OR  telefono LIKE '".$requestData['search']['value']."%' "; 
	$sql.=" OR  codigopostal LIKE '".$requestData['search']['value']."%' ";  
	$query=mysqli_query($conn, $sql) or die("data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("data.php: get PO"); 
	
} else {	

	$sql = "SELECT idNutricionista, idTipoDocumento, n_Documento, nombres, apellidos, telefono, idMunicipio, direccion, idUsuario, codigopostal, aboutme, estado";
	$sql.=" FROM nutricionista";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("data.php: get PO");
	
}

$data = array();
$num = "1";
while( $row=mysqli_fetch_array($query) ) {  
	$nestedData=array(); 

	$exis = $row["estado"];

	
	if ($exis == 1){
		$exis = '<td>
                     <a data-toggle="tooltip" title="Activo" class="btn btn-success"> <i class="icon-ok-sign"></i> </a>';
	}else{
		$exis = '<td>
                     <a data-toggle="tooltip" title="Inactivo" class="btn btn btn-danger"> <i class="icon-remove-sign"></i> </a>';
	}

	$idUsuario = $row['idUsuario'];
   	$qua = mysqli_query($conn, "SELECT * FROM usuarios WHERE idUsuario='$idUsuario'");

   	if(mysqli_num_rows($qua) == 0){
   		echo "Error";
   	} else {
   		$a = mysqli_fetch_array($qua);
   	}

   	$municipio = $row['idMunicipio'];
   	$qua = mysqli_query($conn, "SELECT * FROM municipio WHERE idMunicipio='$municipio'");

   	if(mysqli_num_rows($qua) == 0){
   		echo "Error";
   	} else {
   		$m = mysqli_fetch_array($qua);
   	}

   	$idTipoDocumento = $row['idTipoDocumento'];
   	$qua = mysqli_query($conn, "SELECT * FROM tipodocumento WHERE idTipoDocumento='$idTipoDocumento'");

   	if(mysqli_num_rows($qua) == 0){
   		echo "Error";
   	} else {
   		$o = mysqli_fetch_array($qua);
   	}

    $nestedData[] = $num;
    $nestedData[] = $o["nombre"];
    $nestedData[] = $row["n_Documento"];
    $nestedData[] = $row["nombres"];
    $nestedData[] = $row["apellidos"];
	$nestedData[] = $row["telefono"];
	$nestedData[] = $m["nombre"];
	$nestedData[] = $row["direccion"];
    $nestedData[] = $a["Usuario"];
    $nestedData[] = $row["codigopostal"];
    $nestedData[] = $exis;
    $nestedData[] = '<td>
                     <a href="edit.php?i='.$row['idNutricionista']."A1	rVupvu4,xWRRmNAfu,;P{w{yzyFr*ii]?i#!a_(D4C:*FN6NW(#D*Ri{&d8]aa8WS&iv%8Y2b)fxVn.9{J?2)]HM8?/m#jAahKpjR;a+;wq)YhTe]HqucLGbaG%wy;Y3TaiwaZP69i&qZ6Qc_zf@}gU:aPng?+(_7{,}yFP}8CQ8aQ!CX/3/C]ELJxdY#***+h8K#HP;-fy[U4RMv5)Q!?&}t:{==cdrzUg9j)Xr}RW=5A7@QaRWicz[+C*7g4q+x,AMM&t@[SW6A8hzntn4n.mx/pHm#E22pC)(PdXLx2TBre8Y96@/C:}x,WPvNj&t}%.9)A.Xf_hbGL=&HnV3]?Hc(bj6G:R)X/E_wq2897q{Sg77D7d;p/v=AF(HVPxjR7v2nmEB)[p$}QFfg=WV*xZrgKb]hM(Y4xnr8Py8vCPQ&F*a4xX7i-V)r{,J?}jMLr/AmThf2Sh2=R}BQC//42VwRGj/ckPyu_.-qx5+M#aR$+!Dk8-H8BQDQ+KPKPcp}LE@e#*+R*/m*9v!qZ!!kA#f/+N(*}xZ65+P=tL:c,/c;wzH3FtTCAub/_?tA%;]c{4e}[z,SHD-:Pcmyu7x4apRxA9+gf}QN!=f/[@3E{FUmF6v&LP#j:(T)F%rw+5;[G*H_uwcHPS@M-BtuCc,X;ZUwFCSwpR%,.)#-SVm7-R3(n}z!_M:f]B%{HF[gZmeE?i@/S9ZEy.kFDe3}W!j2MuKD7e@vepHZ{4k3)V_Q,zi/39=f#RT?{U?TkP/ym=EEb+iz(Ppmq?e_)-Pp!]{e:)p}G}2?T*q/=MW]u4RVJeTjg)kM2,Ruqka2d]dWb!z]ETgSD)vhmxZ8_pH2{faW#Um8,6Xg-;B/4,+-k%?Q%U;Pa-}{&ME+DWZ#d8:F.abQZJDEi}#g$}#Ym4id2a@m?}iR:w!db@WkZY)6-2[ZJX=cunH{(PViwm4XvB}2D@@".'"  data-toggle="tooltip" title="Editar datos" class="btn btn-primary"> <i class="icon-pencil"></i> Editar</a> ';		
	
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
