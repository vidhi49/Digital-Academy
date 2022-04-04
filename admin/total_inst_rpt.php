<?php
    require_once('../pdf/fpdf.php');
    include('../connect.php');
    
    $db=new PDO('mysql:host=localhost;dbname=dgskool','root','');
    class myPDF extends FPDF{
        function header(){
            $this->Image('../img/logo2.png',110,6);
            $this->Ln(20);
            

        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        function headerTable(){
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'INSTITUTES',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276,10,'List of Total Institutes',0,0,'C');
            $this->Ln(20);
            $this->SetFont('Times','B',12);
            $this->Cell(10,10,'ID',1,0,'C');
            $this->Cell(40,10,'Logo',1,0,'C');
            $this->Cell(70,10,'Institute',1,0,'C');
            $this->Cell(40,10,'Email',1,0,'C');
            $this->Cell(40,10,'Address',1,0,'C');
            // $this->Cell(20,10,'City',1,0,'C');
            $this->Cell(20,10,'Stats',1,0,'C');
            $this->Cell(20,10,'Country',1,0,'C');
            $this->Cell(30,10,'Contact',1,1,'C');
            // $this->Cell(40,10,'Date of Request',1,1,'C');
           
            
        }
        function viewTable($db){
            $this->SetFont('Times','',12);
            // $q="select * from inquiry_tbl where status='Rejected'";
            // $res=mysqli_query($con,$q);

            $stmt=$db->query("select * from institute_tbl");
            while($data=$stmt->fetch(PDO::FETCH_OBJ))
            // while($r=mysqli_fetch_array($res))
            {
                $this->Cell(10,10,$data->Id,1,0,'C');
                $this->Cell(40,10,'Logo',1,0,'L');
                // $this->Cell(40,10,$this->Image('../certi_img/'.$data->Certi_img,25,30,25,25),1,0,'L');
                // $this->Image('../certi_img/'.$data->Certi_img,40,10,25,25);
                $this->Cell(70,10,$data->Name,1,0,'L');
                $this->Cell(40,10,$data->Email,1,0,'L');
                $this->Cell(40,10,$data->Address.',' .$data->City,1,0,'L');
                // $this->Cell(20,10,$data->City,1,0,'L');
                $this->Cell(20,10,$data->State,1,0,'L');
                $this->Cell(20,10,$data->Country,1,0,'L');
                $this->Cell(30,10,$data->Cno,1,0,'L');
                // $this->Cell(40,10,$data->Date,1,0,'L');
                $this->Ln();
           
            }
        }
    }
    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($db);
    $pdf->output();
