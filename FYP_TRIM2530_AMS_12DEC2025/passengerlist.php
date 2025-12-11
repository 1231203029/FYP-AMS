<?php
include('dataconnection.php');

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
</head>

<script>
function printPassengerList() {
    const printContent = document.getElementById('print-area').innerHTML;
    const printWindow = window.open('', '', 'height=800,width=1000');
    printWindow.document.write('<html><head><title>Passenger List</title>');
    printWindow.document.write('<link rel="stylesheet" href="ams_overall_admin.css">'); // optional, keeps styling
    printWindow.document.write('</head><body>');
    printWindow.document.write(printContent);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" >Dashboard</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php" class="active">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <div class="search-box">
        <input type="text" placeholder="Search... (Ctrl+K)">
      </div>
      <div class="profile">
        <span>Welcome, Admin</span>
        <img src="image/chris_hemsworth.png" alt="Admin" class="profile-pic">
      </div>
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
                        <td colspan="5" style="border:0;">
                            <strong>Flight No. = </strong> <?= htmlspecialchars($flight_number) ?> 
                            <div style="text-align: right; margin-bottom: 15px;">
                              <button onclick="printPassengerList()">🖨️ Print Passenger List</button>
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
