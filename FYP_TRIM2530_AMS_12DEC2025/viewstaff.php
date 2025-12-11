<?php
include('dataconnection.php');

// === Load staff data for viewing === 
if (isset($_GET['stfid'])) {
  $id = $_GET['stfid'];
  echo "<script>console.log('Staff ID received: " . $id . "');</script>";
  $query = "SELECT * FROM staff WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $staff = mysqli_fetch_assoc($result);

  if (!$staff) {
    echo "<script>alert('Staff not found!'); window.location='managestaff.php';</script>";
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<script>alert('Invalid access.'); window.location='managestaff.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin View Staff | Airline Management System</title>
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
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php" class="active">Staff</a></li>
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
      <a href="managestaff.php"><button>← Return</button></a><br><br>
      <h1>View Staff</h1>
      <p>View staff details.</p>

      <div class="cards">
        <div class="card">
            
            <div class="viewstaff-image">
                <?php if (!empty($staff['image'])): ?>
                    <img id="preview" src="<?= htmlspecialchars($staff['image']) ?>" alt="Staff Image" width="160" height="160" style="border-radius:10px;">
                <?php else: ?>
                    <img id="preview" src="image/no_image.png" alt="No Image" width="160" height="160" style="opacity:0.5;">
                <?php endif; ?>
            </div>
            <br>

            <div class="view-grid">
                <p><label>Staff ID:</label> <?= htmlspecialchars($staff['id']) ?></p>

                <p><label>NRIC:</label> <?= htmlspecialchars($staff['nric']) ?></p>

                <p><label>Name:</label> <?= htmlspecialchars($staff['name']) ?></p>

                <p><label>Gender:</label> <?= htmlspecialchars($staff['gender']) ?></p>

                <p><label>Race:</label> <?= htmlspecialchars($staff['race']) ?></p>

                <p><label>Address:</label> <?= htmlspecialchars($staff['address']) ?></p>

                <p><label>State:</label> <?= htmlspecialchars($staff['state']) ?></p>

                <p><label>Nationality:</label> <?= htmlspecialchars($staff['nationality']) ?></p>

                <p><label>Email:</label> <?= htmlspecialchars($staff['email']) ?></p>

                <p><label>Phone No.:</label> <?= htmlspecialchars($staff['phoneNo']) ?></p>

                <p><label>Section:</label> <?= htmlspecialchars($staff['section']) ?></p>

                <p><label>Role:</label> <?= htmlspecialchars($staff['role']) ?></p>

                <p><label>Status:</label> <?= htmlspecialchars($staff['status']) ?></p>
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