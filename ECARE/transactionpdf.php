<?php
include ('connection.php');
session_start(); // Start the session to use session variables



$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roomNo = $_SESSION['payroom']; // Get the room number from the session

// Fetch transactions and tenant details for the specified room number
$sql = "SELECT AmountPaid, date, FirstName, LastName , Balance,  Method
        FROM tenanttransactions 
        WHERE RoomNo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $roomNo);
$stmt->execute();
$result = $stmt->get_result();

require('fpdf.php');

// Instantiate and use the FPDF class
$pdf = new FPDF();

// Add a new page
$pdf->AddPage();

// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);

// Left header text
$pdf->Cell(0, 10, 'RIVERSIDE HOSTELS', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Kapkatet, Kericho', 0, 1, 'L');
$pdf->Cell(0, 10, '0743928989', 0, 1, 'L');

// Get the current date
$currentDate = date('Y-m-d');

// Position for the image and right header text
$imagePath = 'images/ecare-logo.png'; // Replace with the path to your image
list($imgWidth, $imgHeight) = getimagesize($imagePath);
$desiredWidth = 50;
$desiredHeight = $imgHeight * ($desiredWidth / $imgWidth);
$imageX = $pdf->GetPageWidth() - $desiredWidth - 10; // Right-align the image
$imageY = 10;

// Add the image
$pdf->Image($imagePath, $imageX, $imageY, $desiredWidth, $desiredHeight, 'PNG');

// Room No and Current Date under the image
$pdf->SetXY($imageX, $imageY + $desiredHeight + 5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Room No: ' . $roomNo, 0, 1, 'R');
$pdf->Cell(0, 10, 'Date: ' . $currentDate, 0, 1, 'R');

// Line break
$pdf->Ln(20);

// Fetch tenant details
$tenantDetails = $result->fetch_assoc();
$tenantFirstName = $tenantDetails['FirstName'];
$tenantLastName = $tenantDetails['LastName'];
$tenantLastName = $tenantDetails['LastName'];

// Subheading
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Rent Statement of ' . $tenantFirstName . ' ' . $tenantLastName, 0, 1, 'C');

// Line break
$pdf->Ln(10);

// Table headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Amount Paid', 1);
$pdf->Cell(50, 10, ' Month Balance', 1);
$pdf->Cell(50, 10, 'Payment Method', 1);
$pdf->Cell(50, 10, 'Date', 1);

$pdf->Ln();

// Table content
$pdf->SetFont('Arial', '', 12);
do {
    $pdf->Cell(30, 10, $tenantDetails['AmountPaid'], 1);
    $pdf->Cell(50, 10, $tenantDetails['Balance'], 1);
    $pdf->Cell(50, 10, $tenantDetails['Method'], 1);
    $pdf->Cell(50, 10, $tenantDetails['date'], 1);
    
    $pdf->Ln();
} while ($tenantDetails = $result->fetch_assoc());

// Close the database connection
$stmt->close();
$conn->close();

// Return the generated output
$pdf->Output();
?>
