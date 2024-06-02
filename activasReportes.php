<?php
require('fpdf/fpdf.php');
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener las citas
$rol_usuario = $_SESSION['rol']; // Asumimos que el rol del usuario está almacenado en la sesión
$nombre_usuario = $_SESSION['nombre'];
class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Antojitos Mary'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(1);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Francisco Gonzalez Bocanegra 514 Col. 21 De Marzo, San Luis Potosi S.L.P. 78437"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(1);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 7203128909"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(1);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : antojitosmary@gmail.com"), 0, 0, '', 0);
      $this->Ln(5);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE RESERVACIONES ACTIVAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('hora'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('status'), 1, 0, 'C', 1);
      $this->Cell(75, 10, utf8_decode('Usuario'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}


$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$compra = $conn->query("select * From Cita");

while($row = $compra->fetch_object()){
    if($row->status=="Activa"){
        $usuario = $conn->query("Select nombre From Usuario Where idUsuario = ".$row->usuario);
        $usuario2 = $usuario->fetch_assoc();
        $pdf->Cell(18, 10, utf8_decode($row->idCita), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, utf8_decode($row->fecha), 1, 0, 'C', 0);
        $pdf->Cell(30, 10, utf8_decode($row->hora), 1, 0, 'C', 0);
        $pdf->Cell(25, 10, utf8_decode($row->status), 1, 0, 'C', 0);
        $pdf->Cell(75, 10, utf8_decode($usuario2["nombre"]), 1, 1, 'C', 0);
    }
    
}

  $pdf->Cell(1);  // mover a la derecha
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(85, 10, utf8_decode("El presente listado presenta los reportes de todas las reservaciones activas al día generado"), 0, 0, '', 0);
  $pdf->Ln(5);

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)


$conn->close();
?>