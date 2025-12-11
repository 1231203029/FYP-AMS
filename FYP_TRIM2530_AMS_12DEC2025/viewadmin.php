<?php
include('auth.php');

// === Load staff data for viewing === 
if (isset($_GET['adminid'])) {
  $id = $_GET['adminid'];
  echo "<script>console.log('Admin ID received: " . $id . "');</script>";
  $query = "SELECT * FROM admin WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $admin = mysqli_fetch_assoc($result);

  if (!$admin) {
    echo "<script>alert('Admin not found!'); window.location='manageadmin.php';</script>";
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<script>alert('Invalid access.'); window.location='manageadmin.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Superadmin View Admin | Airline Management System</title>
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
      <li><a href="manageadmin.php">Admin</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section"><?php echo strtoupper(htmlspecialchars($_SESSION['admin_role'])); ?></li>
      <li><a href="adminlogout.php" onclick="return confirm('Are you sure you want to log out?');" style="background-color:red; color:white;">Logout</a></li>
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
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?> ( <?php echo htmlspecialchars($_SESSION['admin_role']); ?> ) </span>
        <img src="<?php echo htmlspecialchars($_SESSION['admin_image']); ?>" 
            alt="<?php echo htmlspecialchars($_SESSION['admin_name']); ?>" 
            class="profile-pic">
      </div>
    </header>

    <main>
      <a href="manageadmin.php"><button>← Return</button></a><br><br>
      <h1>View Admin</h1>
      <p>View admin details.</p>

      <div class="cards">
        <div class="card">
            
            <div class="viewstaff-image">
                <?php if (!empty($customer['image'])): ?>
                    <img id="preview" src="<?= htmlspecialchars($admin['image']) ?>" alt="Admin Image" width="160" height="160" style="border-radius:10px;">
                <?php else: ?>
                    <img id="preview" src="image/no_image.png" alt="No Image" width="160" height="160" style="opacity:0.5;">
                <?php endif; ?>
            </div>
            <br>

            <div class="view-grid">
                <p><label>Admin ID:</label> <?= htmlspecialchars($admin['id']) ?></p>

                <p><label>NRIC:</label> <?= htmlspecialchars($admin['nric']) ?></p>

                <p><label>Name:</label> <?= htmlspecialchars($admin['name']) ?></p>

                <p><label>Gender:</label> <?= htmlspecialchars($admin['gender']) ?></p>

                <p><label>Race:</label> <?= htmlspecialchars($admin['race']) ?></p>

                <p><label>Address:</label> <?= htmlspecialchars($admin['address']) ?></p>

                <p><label>State:</label> <?= htmlspecialchars($admin['state']) ?></p>

                <p><label>Nationality:</label> <?= htmlspecialchars($admin['nationality']) ?></p>

                <p><label>Email:</label> <?= htmlspecialchars($admin['email']) ?></p>

                <p><label>Phone No.:</label> <?= htmlspecialchars($admin['phoneNo']) ?></p>

                <p><label>Status:</label> <?= htmlspecialchars($admin['status']) ?></p>
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