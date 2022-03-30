<?php
    include '../fpdf/fpdf.php';

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B','10');
            $this->Image('../img/logo.jpg',10,8,20);
            $this->Cell(70,10,'Music Bar',0,0,'C');
            $this->SetFont('Arial','B','14');
            $this->Cell(70);
            $this->Cell(30,20,'REPORTE PROMOCIONES',0,0,'C');
            $this->Ln(20);
            $this->SetFillColor(138,0,0);
            $this->SetTextColor(255,255,255);
            
            $this->Cell(17,10,'Clave',1,0,'C',1);
            $this->Cell(52,10,'Nombre',1,0,'C',1);
            $this->Cell(30,10,'Precio',1,0,'C',1);
            $this->Cell(45,10,'Inicio',1,0,'C',1);
            $this->Cell(45,10,'Vigencia',1,1,'C',1);
        }
        
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',12);
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
        
    }
    
    require '../admi/promocionClass.php';
    $conecta = new Promocion();
    
    $result = mysqli_query($conecta->conectarBD(),"SELECT * FROM promocion");
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);


    while($reg=mysqli_fetch_array($result)){
        $pdf->Cell(17, 10, $reg['clave_promo'], 1, 0, 'C', 0);
        $pdf->Cell(52, 10, $reg['nombre_promo'], 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $reg['precio_promo'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, $reg['inicio_promo'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, $reg['vigencia_promo'], 1, 1, 'C', 0);
    }

    $pdf->Output();
?>