<?php
include('dataconnection.php');

// === Load aircraft data for editing ===
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

// Update aircraft
if (isset($_POST["updacbtn"])) {
  $id = $_POST["id"];
  $model = $_POST["model"];
  $company = $_POST["company"];
  $country = $_POST["country"];
  $image = $_POST["image"];
  $cost_myr = $_POST["cost_myr"];
  $type = $_POST["type"];
  $quantity = $_POST["quantity"];
  $horsepower_hp = $_POST["horsepower_hp"];
  $fuel_tank_litre = $_POST["fuel_tank_litre"];
  $total_seats = $_POST["total_seats"];

  // Prepare SQL update
  $update_query = " UPDATE aircraft 
      (model, company, country, image, cost_myr, type, quantity, horsepower_hp, fuel_tank_litre, total_seats)
      SET (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) WHERE id=?";

  $stmt = mysqli_prepare($connect, $update_query);

  mysqli_stmt_bind_param(
      $stmt,
      "ssssssssssi",  // 11 string parameters
      $model,
      $company,
      $country,
      $image,
      $cost_myr,
      $type,
      $quantity,
      $horsepower_hp,
      $fuel_tank_litre,
      $total_seats,
      $id
  );

  // Execute and confirm
  if (mysqli_stmt_execute($stmt)) {
      echo "<script>alert('Aircraft updated successfully.'); window.location='manageaircraft.php';</script>";
  } else {
      echo "<script>alert('Error updating aircraft: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Update Aircraft | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" >Dashboard</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php" class="active">Aircraft</a></li>
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
      <a href="manageaircraft.php"><button>← Return</button></a><br><br>
      <h1>Update Aircraft Form</h1>
      <p>Update new aircraft</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <label>ID:</label>
                <input type="text" name="id" value="<?= htmlspecialchars($aircraft['id']) ?>" readonly class="locked">
              
                <label>Model:</label>
                <input type="text" name="model" value="<?= htmlspecialchars($aircraft['model']) ?>" required>

                <label>Company:</label>
                <input type="text" name="company" value="<?= htmlspecialchars($aircraft['company']) ?>" required>

                <label>Country:</label>
                <input type="text" name="country" value="<?= htmlspecialchars($aircraft['country']) ?>" required>

                <label>Aircraft Image:</label>
                    <?php if (!empty($aircraft['image'])): ?>
                       <img id="preview" src="<?= htmlspecialchars($aircraft['image']) ?>" alt="Aircraft Image" width="120" height="120">
                    <?php else: ?>
                       <img id="preview" src="" alt="No Image" width="120" height="120" style="display:none;">
                    <?php endif; ?>
                       <br>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)">

                <script>
                    function previewImage(event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('preview');
                    if (file) {
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    }
                    }
                </script>
                
                <label>Cost(Myr):</label>
                <input type="number" name="cost" value="<?= htmlspecialchars($aircraft['cost_myr']) ?>" required>

                <label>Type:</label>
                <select name="type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="Passenger Jet" <?= $aircraft['type']=='Passenger Jet'?'selected':'' ?>>Passenger Jet</option>
                    <option value="Turboprop" <?= $aircraft['type']=='Turboprop'?'selected':'' ?>>Turboprop</option>
                    <option value="Wide-body Jet" <?= $aircraft['type']=='Wide-body Jet'?'selected':'' ?>>Wide-body Jet</option>
                    <option value="Light Aircraft" <?= $aircraft['type']=='Light Aircraft'?'selected':'' ?>>Light Aircraft</option>
                    <option value="Business Jet" <?= $aircraft['type']=='Business Jet'?'selected':'' ?>>Business Jet</option>
                    <option value="Regional Jet" <?= $aircraft['type']=='Regional Jet'?'selected':'' ?>>Regional Jet</option>
                    <option value="Super Jumbo Jet" <?= $aircraft['type']=='Super Jumbo Jet'?'selected':'' ?>>Super Jumbo Jet</option>
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" value="<?= htmlspecialchars($aircraft['quantity']) ?>" required>

                <label>Horsepower(hp):</label>
                <input type="number" name="horsepower_hp" value="<?= htmlspecialchars($aircraft['horsepower_hp']) ?>" required>

                <label>Fuel Tank(litre):</label>
                <input type="number" name="fuel_tank_litre" value="<?= htmlspecialchars($aircraft['fuel_tank_litre']) ?>" required>

                <label>Total Seats</label>
                <input type="number" name="total_seats" value="<?= htmlspecialchars($aircraft['total_seats']) ?>" required>

                <!-- Buttons row -->
              <div></div> <!-- empty cell for label column -->
              <div class="form-buttons">
                <button type="submit" class="button" name="addacbtn">Submit</button>
                <a href="manageaircraft.php"><button type="button" class="button">Cancel</button></a>
              </div>
            </div>
          </form>
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