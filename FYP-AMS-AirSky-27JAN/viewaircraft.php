<?php
include('auth.php');

// === Load aircraft data for viewing === 
if (isset($_GET['acid'])) {
  $id = $_GET['acid'];
  echo "<script>console.log('Aircraft ID received: " . $id . "');</script>";
  $query = "SELECT * FROM aircraft WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $aircraft = mysqli_fetch_assoc($result);

  if (!$aircraft) {
    echo "<script>alert('Aircraft not found!'); window.location='manageaircraft.php';</script>";
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<script>alert('Invalid access.'); window.location='manageaircraft.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin View Aircraft | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <a href="manageaircraft.php"><button>← Return</button></a><br><br>
      <h1>View Aircraft</h1>
      <p>View aircraft details.</p>

      <div class="cards">
        <div class="card">
            
            <div class="viewaircraft-image">
                <?php if (!empty($aircraft['image'])): ?>
                    <img id="preview" src="<?= htmlspecialchars($aircraft['image']) ?>" alt="Aircraft Image" width="160" height="160" style="border-radius:10px;">
                <?php else: ?>
                    <img id="preview" src="image/no_image.png" alt="No Image" width="160" height="160" style="opacity:0.5;">
                <?php endif; ?>
            </div>
            <br>

            <div class="view-grid">
                <p><label>Aircraft ID:</label> <?= htmlspecialchars($aircraft['id']) ?></p>

                <p><label>Model:</label> <?= htmlspecialchars($aircraft['model']) ?></p>

                <p><label>Company:</label> <?= htmlspecialchars($aircraft['company']) ?></p>

                <p><label>Country:</label> <?= htmlspecialchars($aircraft['country']) ?></p>

                <p><label>Cost(RM):</label> <?= htmlspecialchars($aircraft['cost_myr']) ?></p>

                <p><label>Type:</label> <?= htmlspecialchars($aircraft['type']) ?></p>

                <p><label>Quantity:</label> <?= htmlspecialchars($aircraft['quantity']) ?></p>

                <p><label>Horsepower(hp):</label> <?= htmlspecialchars($aircraft['horsepower_hp']) ?></p>

                <p><label>Fuel Tank(litre):</label> <?= htmlspecialchars($aircraft['fuel_tank_litre']) ?></p>

                <p><label>Total Seats:</label> <?= htmlspecialchars($aircraft['total_seats']) ?></p>
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