<?php
    require_once('../pdf/fpdf.php');
    include('../connect.php');
    session_start();
    $con = mysqli_connect("localhost", "root", "") or die("Couldn't connect to server");
    mysqli_select_db($con, "dgskool") or die("No database found");
   
    // $db=new PDO('mysql:host=localhost;dbname=dgskool','root','');
    // class myPDF extends FPDF{
    //     function header(){
    //         // $this->Image('../img/logo2.png',110,6);
    //         $this->SetFont('Arial','B',25);
    //         $this->Cell(200,5,'Fee Receipt',0,0,'C');
    //         // $this->Ln(20);
            
            
    //     }
    //     }
    //     function footer(){
    //         $this->SetY(-15);
    //         $this->SetFont('Arial','',8);
    //         $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    //     }
            $inst_id = $_SESSION['inst_id'];
            
            $q = mysqli_query($con,"select * from institute_tbl where Id = '$inst_id'");
            $rs = mysqli_fetch_array($q);
            
            $query = mysqli_query($con,"select * from payments where Gr_no = '".$_GET['Id']."'");
            $res = mysqli_fetch_array($query);
            $a=$res['Amount']-$res['Paid_amount'];

            $query1 = mysqli_query($con,"select * from student_tbl where Grno = '".$_GET['Id']."'");
            $res1 = mysqli_fetch_array($query1);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt


$pdf->SetFont('Arial','B',25);
// $pdf->Cell(200,30,'Fee Receipt',0,0,'C');
//Cell(width , height , text , border , end line , [align] )
// $pdf->Cell(180,5,'Fee Receipt',0,0,'C');
$pdf->Cell(180	,25,'Fee Receipt',0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(180	,5,$rs['Name'],0,1,'C');

$pdf->Cell(180	,5,$rs['Address'],0,1,'C');//end of line
// $pdf->Line(0,0,500,0);

$pdf->Line(0, 50, 250, 50);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(15	,5,'Gr No.:',0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,$res1['Grno'],0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0,'Issue Date: ',0,0,'R');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$res['Date'],0,1,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,$res1['Name'],0,1,'L');
// $pdf->Cell(59	,5,'',0,1);//end of line

// $pdf->Cell(130	,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(0,5,$res1['Address'],0,1);
$pdf->Cell(0,5,$res1['State'],0,1);//end of line
$pdf->Cell(0,5,$res1['Country'],0,1);
$pdf->Cell(0,5,$res1['Mobileno'],0,1);
$pdf->Line(0, 100, 250, 100);
$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Paid Fee',0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0	,5,$res['Paid_amount'],0,1,'R');
$pdf->Cell(130	,5,'Payable Fee',0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0	,5,$a,0,1,'R');
$pdf->Ln(12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,'Total Amount',0,0,'L');
$pdf->Cell(0	,5,$res['Amount'],0,1,'R');
$pdf->Line(0, 130, 250, 130);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(	0,0,'All above mentioned fees are non refundable.',0,0,'C');
$pdf->Line(0, 140, 250, 140);

    $pdf->output();
?>