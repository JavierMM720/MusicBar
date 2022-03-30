<?php
    include '../fpdf/fpdf.php';

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B','10');
            $this->Image('../img/logo.jpg',10,8,20);
            $this->Cell(70,10,'Music Bar',0,0,'C');
            $this->SetFont('Arial','B','14');
            $this->Cell(70);
            $this->Cell(30,20,'REPORTE DE BANDAS',0,0,'C');
            $this->Ln(20);
            $this->SetFillColor(138,0,0);
            $this->SetTextColor(255,255,255);
            
            $this->Cell(20,10,'Clave',1,0,'C',1);
            $this->Cell(58,10,'Nombre',1,0,'C',1);
            $this->Cell(30,10,'Hora inicio',1,0,'C',1);
            $this->Cell(30,10,'Hora fin',1,0,'C',1);
            $this->Cell(50,10,'Dias que asiste',1,1,'C',1);
        }
        
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',12);
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
        
    }
    
    require '../admi/bandasClass.php';
    $conecta = new Bandas();
    
    $result = mysqli_query($conecta->conectarBD(),"SELECT * FROM bandas");
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);


    while($reg=mysqli_fetch_array($result)){
        $pdf->Cell(20, 10, $reg['clave_banda'], 1, 0, 'C', 0);
        $pdf->Cell(58, 10, $reg['nombre_banda'], 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $reg['horaban_inicio'], 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $reg['horaban_fin'], 1, 0, 'C', 0);
        $pdf->Cell(50, 10, $reg['dias'], 1, 1, 'C', 0);
    }

    $pdf->Output();
?>