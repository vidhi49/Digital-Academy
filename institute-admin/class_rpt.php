<?php
require_once('../pdf/fpdf.php');
include('../connect.php');


$db = new PDO('mysql:host=localhost;dbname=dgskool', 'root', '');
session_start();

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
        $this->Cell(40, 10, 'Class Name', 1, 0, 'C');
        $this->Cell(40, 10, 'Section', 1, 0, 'C');
        $this->Cell(40, 10, 'Class Teacher', 1, 0, 'C');
        $this->Cell(60, 10, 'Student Limit', 1, 0, 'C');
        $this->Cell(40, 10, 'Total Student', 1, 0, 'C');
        $this->Cell(50, 10, 'Total Subject', 1, 1, 'C');
        
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        // $q="select * from inquiry_tbl where status='Rejected'";
        // $res=mysqli_query($con,$q);
        $inst_id=$_SESSION['inst_id'];
        $stmt = $db->query("select * from class_tbl where Insti_id='$inst_id'");

        while ($data = $stmt->fetch(PDO::FETCH_OBJ))
        // while($r=mysqli_fetch_array($res))
        {
            $this->Cell(40, 10, $data->Name, 1, 0, 'C');
            $stmt1 = $db->query("select count(*) as tot from student_tbl where Inst_id='$inst_id' and Class_id='$data->Id'");
            $data1 = $stmt1->fetch(PDO::FETCH_OBJ);
            $stmt2 = $db->query("select count(*) as tot2 from subject_tbl where Inst_id='$inst_id' and Class_id='$data->Id'");
            $data2 = $stmt2->fetch(PDO::FETCH_OBJ);
            // $this->Cell(40, 20, $this->Image('../certi_img/' . $data->Certi_img, $this->GetX() + 10, $this->GetY(), 20, 20), 1, 0, 'C');

            // $this->Cell(40,10,$this->Image('../certi_img/'.$data->Certi_img,25,30,25,25),1,0,'L');
            // $this->Image('../certi_img/'.$data->Certi_img,40,10,25,25);
            $this->Cell(40, 10, $data->Section, 1, 0, 'L');
            $this->Cell(40, 10, $data->Class_teacher, 1, 0, 'L');
            $this->Cell(60, 10, $data->Stud_limit, 1, 0, 'L');
            $this->Cell(40, 10, $data1->tot, 1, 0, 'L');
            $this->Cell(50, 10, $data2->tot2, 1, 0, 'L');
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
