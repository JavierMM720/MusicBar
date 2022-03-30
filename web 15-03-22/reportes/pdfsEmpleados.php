<?php
    include '../fpdf/fpdf.php';

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B','10');
            $this->Image('../img/logo.jpg',10,8,20);
            $this->Cell(70,10,'Music Bar',0,0,'C');
            $this->SetFont('Arial','B','14');
            $this->Cell(70);
            $this->Cell(30,20,'REPORTE EMPLEADOS',0,0,'C');
            $this->Ln(20);
            $this->SetFillColor(138,0,0);
            $this->SetTextColor(255,255,255);
            
            $this->SetFont('Arial','B','12');
            $this->Cell(20,10,'Id',1,0,'C',1);
            $this->Cell(45,10,'Nombre',1,0,'C',1);
            $this->Cell(40,10,'Puesto',1,0,'C',1);
            $this->Cell(42,10,'Telefono',1,0,'C',1);
            $this->Cell(42,10,'Usuario',1,1,'C',1);
        }
        
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',12);
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
        
    }
    
    require '../admi/adminclass.php';
    $conecta = new Admin();
    
    $result = mysqli_query($conecta->conectarBD(),"SELECT * FROM empleado WHERE id_empleado != '131'");
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);


    while($reg=mysqli_fetch_array($result)){
        $pdf->Cell(20, 10, $reg['id_empleado'], 1, 0, 'C', 0);
        $pdf->Cell(45, 10, $reg['nombre']." ".$reg['ape_pat'], 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $reg['puesto'], 1, 0, 'C', 0);
        $pdf->Cell(42, 10, $reg['telefono'], 1, 0, 'C', 0);
        $pdf->Cell(42, 10, $reg['usuario'], 1, 1, 'C', 0);
    }

    $pdf->Output();
?>