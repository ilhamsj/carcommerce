<?php
require('core\init.php');
require('assets\fpdf181\fpdf.php');

//Menampilkan data dari tabel di database
$result = tampil_data('cars', 'id_car');

//Inisiasi untuk membuat header kolom
$column_1 = "";
$column_2 = "";
$column_3 = "";
$column_4 = "";
$column_5 = "";
$column_6 = "";
$column_7 = "";
$column_8 = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_assoc($result))
{
  $id       = $row["id_car"];
  $nopol 	  = $row["car_nopolice"];
  $merk 	  = $row["car_merk"];
  $model 	  = $row["car_model"];
  $warna 	  = $row["car_color"];
  $tahun 	  = $row["car_years"];
  $hrgbeli  = $row["car_purchase"];
  $hrgjual 	= $row["car_price"];

  $column_1   = $column_1.$id."\n";
  $column_2   = $column_2.$nopol."\n";
  $column_3   = $column_3.$merk."\n";
  $column_4   = $column_4.$model."\n";
  $column_5   = $column_5.$warna."\n";
  $column_6   = $column_6.$tahun."\n";
  $column_7   = $column_7.$hrgbeli."\n";
  $column_8 	= $column_8.$hrgjual."\n";
}

//Create a new PDF file
$pdf = new FPDF('P','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','',14);

$pdf->Cell(80);
$pdf->Cell(30,10,'Maju Jaya Mobilindo',0,0,'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->Cell(30,10,'Jual Beli Mobil Bekas',0,0,'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->Cell(30,10,'Data Mobil',0,0,'C');
$pdf->Ln();

//Fields judul tabel position
$Y_Fields_Name_position = 52;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(5);
$pdf->Cell(25, 8, 'ID', 1, 0, 'C', 1);

$pdf->SetX(30);
$pdf->Cell(25,8,'No Polisi',1, 0,'C',1);

$pdf->SetX(55);
$pdf->Cell(25,8,'Merk',1,0,'C',1);

$pdf->SetX(80);
$pdf->Cell(25,8,'Model',1,0,'C',1);

$pdf->SetX(105);
$pdf->Cell(25,8,'Warna',1,0,'C',1);

$pdf->SetX(130);
$pdf->Cell(25,8,'Tahun',1,0,'C',1);

$pdf->SetX(155);
$pdf->Cell(25,8,'Harga Beli',1,0,'C',1);

$pdf->SetX(180);
$pdf->Cell(25,8,'Harga Jual',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 60;
$pdf->SetFont('Arial','',10);
//Now show the columns

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_1,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(25,6,$column_2,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(25,6,$column_3,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(25,6,$column_4,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(25,6,$column_5,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(25,6,$column_6,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(25,6,$column_7,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(25,6,$column_8,1,'C');

$pdf->Output();
?>
