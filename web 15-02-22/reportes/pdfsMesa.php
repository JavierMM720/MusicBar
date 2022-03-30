<?php
    include '../fpdf/fpdf.php';

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B','10');
            $this->Image('../img/logo.jpg',10,8,20);
            $this->Cell(70,10,'Music Bar',0,0,'C');
            $this->SetFont('Arial','B','14');
            $this->Cell(70);
            $this->Cell(30,20,'REPORTE DE MESAS',0,0,'C');
            $this->Ln(20);
            $this->SetFillColor(138,0,0);
            $this->SetTextColor(255,255,255);
            
            $this->Cell(35,10,'Clave',1,0,'C',1);
            $this->Cell(30,10,'No mesa',1,0,'C',1);
            $this->Cell(40,10,'Zona',1,0,'C',1);
            $this->Cell(70,10,'Fecha asignada',1,1,'C',1);
        }
        
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',12);
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
        
    }
    
    require '../admi/mesaClass.php';
    $conecta = new Mesa();
    
    $result = mysqli_query($conecta->conectarBD(),"SELECT * FROM mesa");
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);


    while($reg=mysqli_fetch_array($result)){
        $pdf->Cell(35, 10, $reg['clave_mesa'], 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $reg['no_mesa'], 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $reg['clave_zona'], 1, 0, 'C', 0);
        $pdf->Cell(70, 10, $reg['fecha_mesa'], 1, 1, 'C', 0);
    }

    $pdf->Output();
?>