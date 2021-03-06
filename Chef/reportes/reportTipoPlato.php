<?php
  session_start();
  if(!isset($_SESSION['Perfil']) || $_SESSION['Perfil'] != 4){
    session_destroy();
    header('location: ../');
  }

?>
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../assets/img/favicon.png',20,8,35,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,10,'Reporte Tipo Platos',0,0,'C');
    // Salto de línea
    $this->Ln(30);
   
    $this->Cell(10,10,"# ",1,0,'C','0');
    $this->Cell(100,10,"Nombre ",1,0,'C','0');
    $this->Cell(80,10,'Estado',1,1,'C','0');
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
require('../conn/conn.php');
$consulta = "SELECT * FROM tipo_plato";
$contar = "SELECT COUNT(idTipoPlato) from tipo_plato";

$resultado = $conn->query($consulta);
$resultadoC = $conn->query($contar);
 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
 
$num = "1";
while ($row = $resultado->fetch_assoc()) {

    $pdf->Cell(10,10,$num,1,0,'C','0');
	$pdf->Cell(100,10,$row['nombrePlato'],1,0,'C','0');
    //Aqui cambie el 1 y 0 por activo y inactivo
    $esta = $row['estado'];
    if ($esta == 1) {
    	$estado = 'Activo';
    }
    else{
    	$estado = 'Inactivo';
    }

	$pdf->Cell(80,10,$estado,1,1,'C','0');

	$num++;

}
$pdf->Output();
?>