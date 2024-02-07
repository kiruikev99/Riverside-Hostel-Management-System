<?php
    
ob_end_clean(); 
require('fpdf.php'); 
  
// Instantiate and use the FPDF class  
$pdf = new FPDF(); 
  
// Add a new page 
$pdf->AddPage(); 

// Set the font for the text 
$pdf->SetFont('Arial', 'B', 18); 

$imagePath = 'images/ecare-logo.png'; // Replace with the path to your image

// Get image dimensions
list($imgWidth, $imgHeight) = getimagesize($imagePath);

// Define the desired width for the resized image
$desiredWidth = 80;

// Calculate the proportional height based on the desired width
$desiredHeight = $imgHeight * ($desiredWidth / $imgWidth);

// Calculate position to center the resized image at the top
$imageX = ($pdf->GetPageWidth() - $desiredWidth) / 2;
$imageY = 10;

// Add the resized image
$pdf->Image($imagePath, $imageX, $imageY, $desiredWidth, $desiredHeight, 'PNG');

// Calculate position to center the text right under the image
$textX = 10;
$textY = $imageY + $desiredHeight + 10;

// Prints a cell with given text  
$pdf->Cell(0, 20, 'TRANSACTION PDF', 0, 1, 'C'); 

// return the generated output 
$pdf->Output(); 
?>
