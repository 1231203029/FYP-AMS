<?php
include('auth.php');

// Check if flightid is passed
if (!isset($_GET['flightid'])) {
    echo "<script>alert('Invalid access.'); window.location='manageflight.php';</script>";
    exit;
}

$flight_id = $_GET['flightid'];

// Fetch flight info
$stmt = mysqli_prepare($connect, "SELECT flight_number FROM flight WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $flight_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$flight = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$flight) {
    echo "<script>alert('Flight not found!'); window.location='manageflight.php';</script>";
    exit;
}

$flight_number = $flight['flight_number'];

// Function to format phone numbers
function formatPhone($p) {
    return "+60" . substr($p, 1, 2) . "-" . substr($p, 3);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Passenger List | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @media print {

      /* Hide everything */
      body * {
        visibility: hidden;
      }

      /* Show only print area */
      #print-area,
      #print-area * {
        visibility: visible;
      }

      /* Reset layout */
      body {
        margin: 0;
        padding: 0;
        background: none;
      }

      /* Position print content */
      #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }

      /* Document-style table */
      table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
      }

      th, td {
        border: 1px solid #000;
        padding: 6px;
        text-align: left;
        word-break: break-word;
      }

      /* Hide buttons */
      button {
        display: none !important;
      }

      @page {
        size: A4 portrait;
        margin: 15mm;
      }
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <?php include('sidebar.php'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <div class="search-box">
        <input type="text" placeholder="Search... (Ctrl+K)">
      </div>
      <?php include('profileheader.php'); ?>
    </header>

    <main>
      <a href="manageflight.php"><button>← Return</button></a><br><br>
      <h1>Passenger List</h1>
      <p>View and print passenger list.</p>

      <div class="cards">
        <div class="card" id="print-area">  
            <table>
                <thead>
                    <tr>
                      <td colspan="5" style="border:0; vertical-align: middle;">
                          <span><strong>Flight No. = </strong> <?= htmlspecialchars($flight_number) ?></span>
                          <div style="float:right; display:flex; align-items:center; padding-bottom:5px;">
                              <button class="print-btn" onclick="window.print()">🖨️ Print Passenger List</button>
                          </div>
                      </td>
                    </tr>
                    <tr><th>ID</th><th>Passenger Name</th><th>Passport No.</th><th>Phone No.</th><th>Seat No.</th></tr>
                </thead>
                <tbody>
                    <?php
                        $stmt = mysqli_prepare($connect, "
                            SELECT c.id, c.name, c.passport_number, c.phoneNo, b.seat_number
                            FROM booking b
                            JOIN customer c ON b.customer_id = c.id
                            WHERE b.flight_id = ?
                        ");
                        mysqli_stmt_bind_param($stmt, "i", $flight_id);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= htmlspecialchars($row["name"]) ?></td>
                                <td><?= htmlspecialchars($row["passport_number"]) ?></td>
                                <td><?= formatPhone($row["phoneNo"]); ?></td>
                                <td><?= htmlspecialchars($row["seat_number"]) ?></td>
                            </tr>
                    <?php } 
                    mysqli_stmt_close($stmt); ?>
                </tbody>
            </table>
        </div>
     </div>

     </main>

     <footer>
         &copy; 2025 Airline Management System | Admin Panel 
         <img src="image/malaysia.png" alt="Admin" class="icon">
     </footer>

  </div>

</body>
</html>
