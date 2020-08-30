<!DOCTYPE html>
<html>
<head>
        <link rel="icon" href="<?php echo base_url();?>logo.jpg" type="image/x-icon">
</head>
<body>

</body>
</html>


<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require('fpdf.php');
class Pdf_2 extends FPDF
{
    
    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
    }
    
    function Header()
    { 
        global $title;
        $lebar = $this->w;
        $this->SetFont('Times', 'B', 15);
        // Logo
        $w = $this->Image(('assets/files/assets/images/Screenshot_3.jpg'),8,5,200);
        // $w = $this->GetStringWidth($title);
        $this->SetX(($lebar - $w) / 2);
        $this->Cell($w, 26, $title, 0, 0, 'C');
        // $this->Ln();
        // $this->line($this->GetX(), $this->GetY(), $this->GetX() + $lebar - 20, $this->GetY());
        // $this->Ln(10);
        $this->Ln(35);
    }
    
    
    function Footer()
    {
        $this->SetY(-15);
        $lebar = $this->w;
        $this->SetFont('Arial', 'I', 8);
        $this->line($this->GetX(), $this->GetY(), $this->GetX() + $lebar - 20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);
        $this->Ln(1);
        $hal = 'Halaman : ' . $this->PageNo();
        $this->Cell($this->GetStringWidth($hal), 10, $hal);
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $tanggal    = 'Dicetak : ' . date('d-m-Y') . ' ';
        $this->Cell($lebar - $this->GetStringWidth($hal) - $this->GetStringWidth($tanggal) - 20);
        $this->Cell($this->GetStringWidth($tanggal), 10, $tanggal);
        
    }

}