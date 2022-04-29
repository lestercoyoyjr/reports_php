<?php
    require 'template.php';
    require 'conexion.php';

    $sql = "SELECT id,nombre,telefono,fecha_nacimiento,estado_civil FROM empleados WHERE activo=1";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P","mm","LETTER");
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",12);

    $pdf->SetFillColor(25,0,0);
    $pdf->SetTextColor(150,170,70);


    // $pdf->Cell(50,10,"Reportes en PHP y MySQL",1,1,"L");
    // $pdf->MultiCell(50,10,"Reportes en PHP y MySQL",1);

    $pdf->Cell(50,5,"Nombre",1,0,"C",1);
    $pdf->Cell(50,5,"Telefono",1,0,"C",1);
    $pdf->Cell(50,5,"Fecha de Nacimiento",1,0,"C",1);
    $pdf->Cell(50,5,"Estado civil",1,1,"C",1);

    $pdf->SetFont("Arial","",12);
    $pdf->SetFillColor(150,170,70);
    $pdf->SetTextColor(25,0,0);
    $pdf->SetDrawColor(170,179,35);
    
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(50,5,$row["nombre"],1,0,"L");
        $pdf->Cell(50,5,$row["telefono"],1,0,"L");
        $pdf->Cell(50,5,$row["fecha_nacimiento"],1,0,"L");
        $pdf->Cell(50,5,$row["estado_civil"],1,1,"L");
    }

    $pdf->Output();
?>