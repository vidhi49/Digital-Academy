<?php
require_once('../pdf/fpdf.php');
include('../connect.php');

$db = new PDO('mysql:host=localhost;dbname=dgskool', 'root', '');
class myPDF extends FPDF
{
    function header()
    {
        $this->Image('../img/logo2.png', 70, 6);
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(200, 5, 'All ADMIN REPORT', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(200, 10, 'List of All Admin', 0, 0, 'C');
        $this->Ln(20);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(30, 10, 'ID', 1, 0, 'C');
        $this->Cell(40, 10, 'Photo', 1, 0, 'C');

        $this->Cell(50, 10, 'Email', 1, 0, 'C');

        $this->Cell(70, 10, 'Permission of Adding New Admin', 1, 1, 'C');
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        $stmt = $db->query("select * from master_admin_tbl ");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(30, 10, $data->Id, 1, 0, 'C');
            $this->Cell(40, 10, 'Photo', 1, 0, 'L');
            // $this->Cell(40,10,$this->Image('../certi_img/'.$data->Certi_img,25,30,25,25),1,0,'L');
            // $this->Image('../certi_img/'.$data->Certi_img,40,10,25,25);
            $this->Cell(50, 10, $data->Email, 1, 0, 'L');
            if ($data->permission == '1') {
                $this->Cell(70, 10, 'Yes', 1, 0, 'L');
            } else {
                $this->Cell(70, 10, 'No', 1, 0, 'L');
            }


            $this->Ln();
        }
    }
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->output();
