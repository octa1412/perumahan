<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    require_once APPPATH . 'third_party/fpdf/fpdf.php';
    class pdf extends FPDF {

        public function Header(){
            // Logo
          //  $this->Image('logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(400,80,'Title',2,0,'C');
            // Line break
            $this->Ln(20);
            $this->Line(10,25,200,25);
        }
        function Footer(){
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        public function getInstance(){
            return new pdf();
        }
      
    }
 ?> 