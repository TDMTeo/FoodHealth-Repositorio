<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 1){
    session_destroy();
    header('location: ../');
  }

?>

<?php
require('../../Chef/reportes/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../Chef/assets/img/favicon.png',20,8,35,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(150,10,'Reporte de Cocineros',0,0,'C');
    // Salto de línea
    $this->Ln(30);

    $this->Cell(10,10,"# ",1,0,'C','0');
    $this->Cell(30,10,"Documento",1,0,'C','0');
    $this->Cell(35,10,"Nombres",1,0,'C','0');
	$this->Cell(35,10,'Apellidos',1,0,'C','0');
	$this->Cell(30,10,utf8_decode('Télefono'),1,0,'C','0');
	$this->Cell(40,10,'Municipio',1,0,'C','0');
	$this->Cell(40,10,utf8_decode('Dirección'),1,0,'C','0');
	$this->Cell(35,10,'Usuario',1,0,'C','0');
	$this->Cell(30,10,'Estado',1,1,'C','0');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require('../../Chef/conn/conn.php');
$consulta = "SELECT * FROM  cocineros";
$resultado = $conn->query($consulta);

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$num = "1";
while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(10,10,$num,1,0,'C','0');
    $pdf->Cell(30,10,$row['n_Documento'],1,0,'C','0');
    $pdf->Cell(35,10,utf8_decode($row['nombres']),1,0,'C','0');
	$pdf->Cell(35,10,utf8_decode($row['apellidos']),1,0,'C','0');
	$pdf->Cell(30,10,$row['telefono'],1,0,'C','0');

	$municipio = $row['idMunicipio'];
   	$qua = mysqli_query($conn, "SELECT * FROM municipio WHERE idMunicipio='$municipio'");

   	if(mysqli_num_rows($qua) == 0){
   		echo "Error";
   	} else {
   		$m = mysqli_fetch_array($qua);
   	}

	$pdf->Cell(40,10,utf8_decode($m['nombre']),1,0,'C','0');

	$pdf->Cell(40,10,utf8_decode($row['direccion']),1,0,'C','0');

	$idUsuario = $row['idUsuario'];
   	$qua = mysqli_query($conn, "SELECT * FROM usuarios WHERE idUsuario='$idUsuario'");

   	if(mysqli_num_rows($qua) == 0){
   		echo "Error";
   	} else {
   		$a = mysqli_fetch_array($qua);
   	}

	$pdf->Cell(35,10,utf8_decode($a['Usuario']),1,0,'C','0');

    //Aqui cambie el 1 y 0 por activo y inactivo
    $exis = $row['estado'];
    if ($exis == 1) {
    	$estado = 'Activo';
    }
    else{
    	$estado = 'Inactivo';
    }

	$pdf->Cell(30,10,$estado,1,1,'C','0');

	$num++;

}
$pdf->Output();
?>