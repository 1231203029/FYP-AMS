<?php
include('dataconnection.php');

// Add aircraft
if (isset($_POST["addacbtn"])) {
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

  // Prepare SQL insert
  $insert_query = "INSERT INTO aircraft 
      (model, company, country, image, cost_myr, type, quantity, horsepower_hp, fuel_tank_litre, total_seats)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($connect, $insert_query);

  mysqli_stmt_bind_param(
      $stmt,
      "ssssssssss",  // 10 string parameters
      $model, 
      $company,
      $country,
      $image,
      $cost_myr,
      $type,
      $quantity,
      $horsepower_hp,
      $fuel_tank_litre,
      $total_seats
  );

  // Execute and confirm
  if (mysqli_stmt_execute($stmt)) {
      echo "<script>alert('Aircraft added successfully.'); window.location='manageaircraft.php';</script>";
  } else {
      echo "<script>alert('Error adding aircraft: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Add Aircraft | Airline Management System</title>
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
      <h1>Add Aircraft Form</h1>
      <p>Add new aircraft</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <label>Model:</label>
                <input type="text" name="model" required>

                <label>Company:</label>
                <input type="text" name="company" required>

                <label>Country:</label>
                <input type="text" name="country">

                <label>Aircraft Image:</label>
                <input type="file" name="image" accept="image/*">

                <!--
                <label>Aircraft Image:</label>
                  <img id="preview" src="" alt="Aircraft Image Preview" width="150" height="120" style="display:none;"><br>
                  <input type="file" name="image" accept="image/*" onchange="previewImage(event)" required>

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
                -->

                <label>Cost(Myr):</label>
                <input type="number" name="cost" required>

                <label>Type:</label>
                <select name="type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option>Passenger Jet</option>
                    <option>Turboprop</option>
                    <option>Wide-body Jet</option>
                    <option>Light Aircraft</option>
                    <option>Business Jet</option>
                    <option>Regional Jet</option>
                    <option>Super Jumbo Jet</option>
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" required>

                <label>Horsepower(hp):</label>
                <input type="number" name="horsepower_hp" required>

                <label>Fuel Tank(litre):</label>
                <input type="number" name="fuel_tank_litre" required>

                <label>Total Seats</label>
                <input type="number" name="total_seats" required>

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