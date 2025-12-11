<?php
include('dataconnection.php');

// === Load flight data for viewing === 
if (isset($_GET['flightid'])) {
  $id = $_GET['flightid'];
  echo "<script>console.log('Flight ID received: " . $id . "');</script>";

  // ✅ FIX: Join airport & aircraft to get their info
  $query = "SELECT f.*, a.name AS airport_name, a.id AS airport_id, 
                   ac.model AS aircraft_model, ac.id AS aircraft_id
            FROM flight f
            JOIN airport a ON f.airport_id = a.id
            JOIN aircraft ac ON f.aircraft_id = ac.id
            WHERE f.id = ?";

  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $flight = mysqli_fetch_assoc($result);

  if (!$flight) {
    echo "<script>alert('Flight not found!'); window.location='manageflight.php';</script>";
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<script>alert('Invalid access.'); window.location='manageflight.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin View Flight | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php" class="active">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section">ADMIN</li>
      <li><a href="#">Setting</a></li>
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
      <a href="manageflight.php"><button>← Return</button></a><br><br>
      <h1>View Flight</h1>
      <p>View flight details.</p>

      <div class="cards">
        <div class="card">
          <div class="view-grid">
            <p><label>Flight ID:</label> <?= htmlspecialchars($flight['id']) ?></p>
            <p><label>Airport:</label> <?= htmlspecialchars($flight['airport_name']) ?> (ID: <?= htmlspecialchars($flight['airport_id']) ?>)</p>
            <p><label>Aircraft:</label> <?= htmlspecialchars($flight['aircraft_model']) ?> (ID: <?= htmlspecialchars($flight['aircraft_id']) ?>)</p>
            <p><label>Start Date & Time:</label> <?= htmlspecialchars($flight['start_date_time']) ?></p>
            <p><label>End Date & Time:</label> <?= htmlspecialchars($flight['end_date_time']) ?></p>
            <p><label>Status:</label> <?= htmlspecialchars($flight['status']) ?></p>
          </div>
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
