<?php
include('connection.php');

// Define the room number
$roomNo = $_GET['roomno'];

if (empty($roomNo)) {
    die('Room number is required.');
}

// Fetch transactions and tenant details for the specified room number
$sql = "SELECT AmountPaid, date, FirstName, LastName, Balance, Method 
        FROM tenanttransactions 
        WHERE RoomNo = ? 
        ORDER BY DATE(date)"; // Order by date to group by month
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

if (file_exists($imagePath)) {
    $pdf->Image($imagePath, $imageX, $imageY, 50); // Default width and auto height
} else {
    $pdf->Cell(0, 10, 'Image not found', 0, 1, 'R');
}

// Room No under the image
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

// Initialize variables to track the current month and last balance
$currentMonth = '';
$lastBalance = null; // Initialize to null to detect first run
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFont('Arial', '', 12);

// Process transactions grouped by month
do {
    $transactionMonth = date('F Y', strtotime($tenantDetails['date'])); // Get month and year

    // If the month changes, print a new month title
    if ($currentMonth !== $transactionMonth) {
        if ($currentMonth !== '') {
            // Check balance of the last transaction for the previous month
            // Use loose comparison here
            $lastBalanceStatus = ($lastBalance == 0) ? 'Complete' : 'Rent Incomplete';
            $pdf->Cell(0, 10, $lastBalanceStatus, 0, 1, 'C');
            $pdf->Ln(10); // Line break
        }
        
        $currentMonth = $transactionMonth;
        $pdf->Cell(0, 10, $currentMonth, 0, 1, 'C'); // Month title
        $pdf->Ln(5);

        // Table headers for each month
        $pdf->Cell(30, 10, 'Amount Paid', 1);
        $pdf->Cell(50, 10, 'Month Balance', 1);
        $pdf->Cell(50, 10, 'Payment Method', 1);
        $pdf->Cell(50, 10, 'Date', 1);
        $pdf->Ln();
    }

    // Table content for the current month
    $pdf->Cell(30, 10, $tenantDetails['AmountPaid'], 1);
    $pdf->Cell(50, 10, $tenantDetails['Balance'], 1);
    $pdf->Cell(50, 10, $tenantDetails['Method'], 1);
    $pdf->Cell(50, 10, date('d F', strtotime($tenantDetails['date'])), 1); // Format the date
    $pdf->Ln();
    
    // Store the last balance for the current month
    $lastBalance = $tenantDetails['Balance'];

} while ($tenantDetails = $result->fetch_assoc());

// After the loop, check the last month's balance status
if ($currentMonth !== '') {
    // Use loose comparison for the last month's balance
    $lastBalanceStatus = ($lastBalance == 0) ? 'Complete' : 'Rent Incomplete';
    $pdf->Cell(0, 10, $lastBalanceStatus, 0, 1, 'C');
}

// Close the database connection
$stmt->close();
$conn->close();

// Output the generated PDF
$pdf->Output();
?>
