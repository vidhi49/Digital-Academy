<?php
require_once('../pdf/fpdf.php');
include('../connect.php');

$db = new PDO('mysql:host=localhost;dbname=dgskool', 'root', '');
class myPDF extends FPDF
{
    function header()
    {
        $this->Image('../img/logo2.png', 110, 6);
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
        $this->Cell(276, 5, 'APPROVED REQUEST', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, 'List of Approved Request', 0, 0, 'C');
        $this->Ln(20);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(10, 10, 'ID', 1, 0, 'C');
        $this->Cell(40, 10, 'Certificate', 1, 0, 'C');
        $this->Cell(60, 10, 'Institute', 1, 0, 'C');
        $this->Cell(40, 10, 'Email', 1, 0, 'C');
        $this->Cell(50, 10, 'Address', 1, 0, 'C');
        $this->Cell(30, 10, 'Contact', 1, 0, 'C');
        $this->Cell(40, 10, 'Date of Approval', 1, 1, 'C');
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        // $q="select * from inquiry_tbl where status='Rejected'";
        // $res=mysqli_query($con,$q);

        $stmt = $db->query("select * from inquiry_tbl where status='Approved'");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ))
        // while($r=mysqli_fetch_array($res))
        {
            $this->Cell(10, 20, $data->Id, 1, 0, 'C');
            $this->Cell(40, 20, $this->Image('../certi_img/' . $data->Certi_img, $this->GetX() + 10, $this->GetY(), 20, 20), 1, 0, 'C');

            // $this->Cell(40,10,$this->Image('../certi_img/'.$data->Certi_img,25,30,25,25),1,0,'L');
            // $this->Image('../certi_img/'.$data->Certi_img,40,10,25,25);
            $this->Cell(60, 20, $data->Name, 1, 0, 'L');
            $this->Cell(40, 20, $data->Email, 1, 0, 'L');
            $this->Cell(50, 20, $data->Address, 1, 0, 'L');
            $this->Cell(30, 20, $data->Cno, 1, 0, 'L');
            $this->Cell(40, 20, $data->Date, 1, 0, 'L');
            $this->Ln();
        }
    }
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->output();
