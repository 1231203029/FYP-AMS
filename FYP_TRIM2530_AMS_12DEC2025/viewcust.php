<?php
include('dataconnection.php');

// === Load staff data for viewing === 
if (isset($_GET['custid'])) {
  $id = $_GET['custid'];
  echo "<script>console.log('Cust ID received: " . $id . "');</script>";
  $query = "SELECT * FROM customer WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $customer = mysqli_fetch_assoc($result);

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
  <title>Admin View Customer | Airline Management System</title>
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
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="managecustomer.php" class="active">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
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
      <a href="managecustomer.php"><button>← Return</button></a><br><br>
      <h1>View Customer</h1>
      <p>View customer details.</p>

      <div class="cards">
        <div class="card">
            
            <div class="viewstaff-image">
                <?php if (!empty($customer['image'])): ?>
                    <img id="preview" src="<?= htmlspecialchars($customer['image']) ?>" alt="Customer Image" width="160" height="160" style="border-radius:10px;">
                <?php else: ?>
                    <img id="preview" src="image/no_image.png" alt="No Image" width="160" height="160" style="opacity:0.5;">
                <?php endif; ?>
            </div>
            <br>

            <div class="view-grid">
                <p><label>Customer ID:</label> <?= htmlspecialchars($customer['id']) ?></p>

                <p><label>NRIC:</label> <?= htmlspecialchars($customer['nric']) ?></p>

                <p><label>Name:</label> <?= htmlspecialchars($customer['name']) ?></p>

                <p><label>Gender:</label> <?= htmlspecialchars($customer['gender']) ?></p>

                <p><label>Race:</label> <?= htmlspecialchars($customer['race']) ?></p>

                <p><label>Address:</label> <?= htmlspecialchars($customer['address']) ?></p>

                <p><label>State:</label> <?= htmlspecialchars($customer['state']) ?></p>

                <p><label>Nationality:</label> <?= htmlspecialchars($customer['nationality']) ?></p>

                <p><label>Email:</label> <?= htmlspecialchars($customer['email']) ?></p>

                <p><label>Phone No.:</label> <?= htmlspecialchars($customer['phoneNo']) ?></p>

                <p><label>Status:</label> <?= htmlspecialchars($customer['status']) ?></p>
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