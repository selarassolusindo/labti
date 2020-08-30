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
class Pdf_1 extends FPDF
{
    
    function __construct($orientation = 'L', $unit = 'mm', $size = 'A5')
    {
        parent::__construct($orientation, $unit, $size);
    }
    
    function Header()
    {
     //    global $title;
     //    $lebar = $this->w;
     //    // Logo
    	// $w = $this->Image(base_url('assets/files/assets/images/Screenshot_2.jpg'),9,1,194);
     //    // $w = $this->GetStringWidth($title);
     //    $this->SetX(($lebar - $w) / 2);
     //    $this->Cell($w, 26, $title, 0, 0, 'C');
     //    // $this->Ln();
     //    // $this->line($this->GetX(), $this->GetY(), $this->GetX() + $lebar - 20, $this->GetY());
     //    // $this->Ln(10);
    }
    
    
    function Footer()
    {
        $this->SetY(-5);
        $lebar = $this->w;
        $this->SetFont('Arial', 'I', 8);
        $this->line($this->GetX(), $this->GetY(), $this->GetX() + $lebar - 20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);
        $this->Ln(7);
        $hal = 'Halaman : ' . $this->PageNo();
        $this->Cell($this->GetStringWidth($hal), 10, $hal);
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $tanggal    = 'Dicetak : ' . date('d-m-Y') . ' ';
        $this->Cell($lebar - $this->GetStringWidth($hal) - $this->GetStringWidth($tanggal) - 20);
        $this->Cell($this->GetStringWidth($tanggal), 10, $tanggal);
        
    }

}