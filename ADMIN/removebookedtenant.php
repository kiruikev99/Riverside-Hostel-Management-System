<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
<?php if (isset($_GET['roomno'])) {
    $roomno = $_GET['roomno']; ?>
    <script>
        // Pass room number to JavaScript
        let roomNo = "<?php echo htmlspecialchars($roomno); ?>";

        Swal.fire({
            title: "Are you sure?",
            text: "The Tenant who Booked Room " + roomNo + " will be removed permanently from the database.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Make Room Available"
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX call to delete the tenant
                $.ajax({
                    url: "removedbookedtenant2.php", // PHP script to handle deletion
                    method: "POST",
                    data: { roomno: roomNo },
                    success: function(response) {
                        // Show success alert and redirect
                        Swal.fire({
                            title: "Tenant Removed!",
                            text: "Room " + roomNo + " is now available online.",
                            icon: "success",
                        }).then(function() {
                            window.location.href = "booking.php";
                        });
                    },
                    error: function() {
                        // Show error alert
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to remove tenant. Please try again.",
                            icon: "error",
                        });
                    }
                });
            } else {
                // If canceled, redirect back
                window.location.href = "addtenant.php";
            }
        });
    </script>
<?php } ?>
</body>
</html>
