<?php
    require 'fpdf/fpdf.php';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(50,10,"Reportes en PHP y MySQL",1,1,"L");

    $pdf->Output();
?>