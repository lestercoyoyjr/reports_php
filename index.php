<?php
    require 'fpdf/fpdf.php';
    require 'conexion.php';

    $sql = "SELECT id,nombre,telefono,fecha_nacimiento,estado_civil FROM empleados WHERE activo=1";
    $resultado = $mysqli->query($sql);

    $pdf = new FPDF("P","mm","LETTER");
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);

    // $pdf->Cell(50,10,"Reportes en PHP y MySQL",1,1,"L");
    // $pdf->MultiCell(50,10,"Reportes en PHP y MySQL",1);

    $pdf->Cell(50,5,"Nombre",1,0,"C");
    $pdf->Cell(50,5,"Telefono",1,0,"C");
    $pdf->Cell(50,5,"Fecha de Nacimiento",1,0,"C");
    $pdf->Cell(50,5,"Estado civil",1,1,"C");
    
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(50,5,$row["nombre"],1,0,"C");
        $pdf->Cell(50,5,$row["telefono"],1,0,"C");
        $pdf->Cell(50,5,$row["fecha_nacimiento"],1,0,"C");
        $pdf->Cell(50,5,$row["estado_civil"],1,1,"C");
    }

    $pdf->Output();
?>