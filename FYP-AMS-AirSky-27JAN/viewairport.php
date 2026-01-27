<?php
include('auth.php');

// === Load airport data for viewing === 
if (isset($_GET['apid'])) {
  $id = $_GET['apid'];
  echo "<script>console.log('Airport ID received: " . $id . "');</script>";
  $query = "SELECT * FROM airport WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $airport = mysqli_fetch_assoc($result);

  if (!$airport) {
    echo "<script>alert('Airport not found!'); window.location='manageairport.php';</script>";
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<script>alert('Invalid access.'); window.location='manageairport.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin View Airport | Airline Management System</title>
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
      <a href="manageairport.php"><button>← Return</button></a><br><br>
      <h1>View Airport</h1>
      <p>View airport details.</p>

      <div class="cards">
        <div class="card">
            
            <div>
                <?php if (!empty($airport['image'])): ?>
                    <img id="preview" src="<?= htmlspecialchars($airport['image']) ?>" alt="Airport Image" width="160" height="160" style="border-radius:10px;">
                <?php else: ?>
                    <img id="preview" src="image/no_image.png" alt="No Image" width="160" height="160" style="opacity:0.5;">
                <?php endif; ?>
            </div>
            <br>

            <div class="view-grid">
                <p><label>Airport ID:</label> <?= htmlspecialchars($airport['id']) ?></p>

                <p><label>Name:</label> <?= htmlspecialchars($airport['name']) ?></p>

                <p><label>Coordinate:</label> <?= htmlspecialchars($airport['coordinate']) ?></p>

                <p><label>Address:</label> <?= htmlspecialchars($airport['address']) ?></p>

                <p><label>State:</label> <?= htmlspecialchars($airport['state']) ?></p>

                <p><label>Country:</label> <?= htmlspecialchars($airport['country']) ?></p>

                <p><label>Status:</label> <?= htmlspecialchars($airport['status']) ?></p>
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