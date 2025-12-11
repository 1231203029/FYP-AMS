<?php
include('dataconnection.php');
?>

<?php
// === Load customer data for viewing === 
if (isset($_GET['custid'])) {
    $id = $_GET['custid'];
    echo "<script>console.log('Customer ID received: " . $id . "');</script>";

    // Prepare query
    $query = "SELECT * FROM customer WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $customer = mysqli_fetch_assoc($result);

    // Check if customer exists
    if (!$customer) {
        echo "<script>alert('Customer not found!'); window.location='managecustomer.php';</script>";
        exit;
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Invalid access.'); window.location='managecustomer.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Passenger List | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    <?php function formatPhone($p) {
      return "+60" . substr($p, 1, 2) . "-" . substr($p, 3);
    }?>
  </script>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" class="active">Dashboard</a></li>
      <li><a href="manageuser.php">User</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section">ADMIN</li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Help & Support</a></li>
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
      <h1>Passenger List</h1>
      <p>View and print passenger list.</p>

      <div class="cards">
        <div class="card">
            <table>
                <thead>
                    <tr><td>Flight ID: <?= $flight_id ?></td><td>Flight No.: <?= $flight_number ?></td></tr>
                    <tr><td>ID</td><td>Passenger Name</td><td>Passport No.</td><td>Phone No.</td><td>Seat No.</td></tr>
                </thead>
                <tbody>
                    <?php
                        $result = mysqli_query($connect, "
                            SELECT c.id, c.name, c.passport_number, c.phoneNo, b.seat_number, f.flight_number
                            FROM booking b
                            JOIN customer c ON b.customer_id = c.id
                            JOIN flight f ON b.flight_id = f.id
                            WHERE b.flight_id = $flight_id
                        ");
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["passport_number"] ?></td>
                                <td><?= formatPhone($row["phoneNo"]); ?></td>
                                <td><?= $row["seat_number"] ?></td>
                            </tr>
                    <?php } ?>
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