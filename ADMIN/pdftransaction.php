<?php
include('connection.php');

// Define the room number
$roomNo = $_GET['roomno']; // You can pass the room number through GET, POST, or any other method

if (empty($roomNo)) {
    die('Room number is required.');
}

// Fetch transactions and tenant details for the specified room number
$sql = "SELECT AmountPaid, date, FirstName, LastName, Balance, Method 
        FROM tenanttransactions 
        WHERE RoomNo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $roomNo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('No records found for the specified room number.');
}

require('fpdf.php');

// Instantiate and use the FPDF class
$pdf = new FPDF();
$pdf->AddPage();

// Set the font for the text (use Arial, a built-in font)
$pdf->SetFont('Arial', 'B', 18);

// Left header text
$imagePath = 'images/ecare-logo.png'; // Replace with the path to your image
$imageX = 80; // Fixed position for right-aligning the image
$imageY = 10;
$pdf->Ln(30);
$pdf->Cell(0, 10, 'RIVERSIDE HOSTELS', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Kapkatet, Kericho', 0, 1, 'C');
$pdf->Cell(0, 10, '0743928989', 0, 1, 'C');

// Get the current date
$currentDate = date('Y-m-d');

// Position for the image and right header text


if (file_exists($imagePath)) {
    $pdf->Image($imagePath, $imageX, $imageY, 50); // Default width and auto height
} else {
    $pdf->Cell(0, 10, 'Image not found', 0, 1, 'R');
}

// Room No and Current Date under the image
$pdf->SetXY($imageX, $imageY + 30); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Room No: ' . $roomNo, 0, 1, 'R');

// Line break
$pdf->Ln(20);

// Fetch tenant details
$tenantDetails = $result->fetch_assoc();
$tenantFirstName = $tenantDetails['FirstName'];
$tenantLastName = $tenantDetails['LastName'];

// Subheading
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Rent Statement of ' . $tenantFirstName . ' ' . $tenantLastName, 0, 1, 'C');

// Line break
$pdf->Ln(10);

// Table headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Amount Paid', 1);
$pdf->Cell(50, 10, 'Month Balance', 1);
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

// Output the generated PDF
$pdf->Output();
?>
