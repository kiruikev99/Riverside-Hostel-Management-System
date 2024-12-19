<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Single Room</title>
  <link rel="stylesheet" href="singleroom2.css">
</head>
<body>

  <main>
    <section class="hero">
      <div class="hero-content">
      <img src="images/logo.png" alt="Logo" class="logo">
        <h2>Find Your Perfect Single Room</h2>
        <p>Browse our available rooms and book your stay today.</p>
      </div>
    </section>

    <section class="blocks">
      <h2>Available Blocks</h2>
      <div class="block-options">
        <button class="block-btn" onclick="showBlock('block-a')">Block A</button>
        <button class="block-btn" onclick="showBlock('block-b')">Block B</button>
        <button class="block-btn" onclick="showBlock('block-c')">Block C</button>
        <button class="block-btn" onclick="showBlock('block-d')">Block D</button>
      </div>
    </section>

    <section id="block-a" class="block-content">
      <h2>Block A Available Rooms</h2>
      <table>
        <thead>
          <tr>
            <th>Room No.</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          $query =$query = "SELECT * FROM `blockabooking` 
          WHERE RoomNo IN ('A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10') 
          AND Status = 'Available';";

          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                <td>' . $row["RoomNo"] . '</td>
                <td>' . $row["Status"] . '</td>
                <td><a href="paymentblocka.php?tenantid=' . $row["RoomNo"] . '" class="book-btn">Book Room</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </section>

    <section id="block-b" class="block-content" style="display: none;">
      <h2>Block B Available Rooms</h2>
      <table>
        <thead>
          <tr>
            <th>Room No.</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          $query = $query = "SELECT * FROM `blockabooking` 
          WHERE RoomNo IN ('B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B9', 'B10') 
          AND Status = 'Available';";

          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                <td>' . $row["RoomNo"] . '</td>
                <td>' . $row["Status"] . '</td>
                <td><a href="paymentblocka.php?tenantid=' . $row["RoomNo"] . '" class="book-btn">Book Room</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </section>

    <section id="block-c" class="block-content" style="display: none;">
      <h2>Block C Available Rooms</h2>
      <table>
        <thead>
          <tr>
            <th>Room No.</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          $query = "SELECT * FROM `blockabooking` 
          WHERE RoomNo IN ('C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10') 
          AND Status = 'Available';";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                <td>' . $row["RoomNo"] . '</td>
                <td>' . $row["Status"] . '</td>
                <td><a href="paymentblocka.php?tenantid=' . $row["RoomNo"] . '" class="book-btn">Book Room</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </section>

    <section id="block-d" class="block-content" style="display: none;">
      <h2>Block D Available Rooms</h2>
      <table>
        <thead>
          <tr>
            <th>Room No.</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          $query =$query = "SELECT * FROM `blockabooking` 
          WHERE RoomNo IN ('D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10') 
          AND Status = 'Available';";
;
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                <td>' . $row["RoomNo"] . '</td>
                <td>' . $row["Status"] . '</td>
                <td><a href="paymentblocka.php?tenantid=' . $row["RoomNo"] . '" class="book-btn">Book Room</a></td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </section>
  </main>

  <script>
        function showBlock(blockId) {
            // Hide all block contents
            const blocks = document.querySelectorAll('.block-content');
            blocks.forEach(block => block.style.display = 'none');

            // Show the selected block
            document.getElementById(blockId).style.display = 'block';
        }
    </script>
</body>
</html>