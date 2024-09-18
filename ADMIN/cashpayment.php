<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Payment</title>
    <style>
        .container {
            display: flex;
        }
        .tabo {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            margin-left: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .tabo h1 {
            color: #333;
        }
        .input-values {
            margin-top: 20px;
        }
        .input-values input, .input-values button {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            max-width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .input-values button {
            background-color: #009879;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .input-values button:hover {
            background-color: #007f6a;
        }
        label{
            text-align: left;
        }
    </style>
</head>

<body>
<br><br><br><br><br><br>
    <div class="container">
        <div class="side">
            <?php include 'base.php'; ?>
        </div>
        

        <div class="tabo">
            <h1>Tenant Cash Payment</h1>
            <div class="input-values">
                <form id="payment-form">
                    <input type="text" id="roomNo" required placeholder="Enter Room No">
                    <button required type="button" onclick="fetchTenantInfo()">Submit</button>
                </form>
                <div id="tenant-info" style="display: none;">
                <label>Tenant Name</label>
                    <input  type="text" id="tenantName" readonly placeholder="Tenant Name">
                    <label>Tenant Balance</label>
                    <input type="text" id="balance" readonly placeholder="Balance">
                    <input required  type="text" id="cashAmount" required placeholder="Enter Cash Amount Received">
                    <button type="button" onclick="processPayment()">Process Payment</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchTenantInfo() {
            const roomNo = document.getElementById('roomNo').value;

            fetch('fetch_tenant_info.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'roomNo=' + roomNo
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('tenantName').value = data.name;
                    document.getElementById('balance').value = data.balance;
                    document.getElementById('tenant-info').style.display = 'block';
                } else {
                    alert('Tenant not found');
                }
            });
        }

        function processPayment() {
            const roomNo = document.getElementById('roomNo').value;
            const tenantName = document.getElementById('tenantName').value;
            const balance = document.getElementById('balance').value;
            const cashAmount = document.getElementById('cashAmount').value;

            fetch('process_payment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'roomNo=' + roomNo + '&tenantName=' + tenantName + '&balance=' + balance + '&cashAmount=' + cashAmount
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Payment processed successfully');
                    // Update the balance field to show the new balance
                    document.getElementById('balance').value = data.newBalance;
                } else {
                    alert('Error processing payment');
                }
            });
        }
    </script>
</body>

</html>
