<?php
include('dataconnection.php');

// Add airport
if (isset($_POST["addapbtn"])) {
  $name = $_POST["name"];
  $image = $_POST["image"];
  $coordinate = $_POST["coordinate"];
  $address = $_POST["address"];
  $state = $_POST["state"];
  $country = $_POST["country"];
  $status = $_POST["status"];

  // Prepare SQL insert
  $insert_query = "INSERT INTO aircraft 
      (name, image, coordinate, address, state, country, status)
      VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($connect, $insert_query);

  mysqli_stmt_bind_param(
      $stmt,
      "sssssss",  // 7 string parameters
      $name, 
      $image,
      $coordinate,
      $address,
      $state,
      $country,
      $status
  );

  // Execute and confirm
  if (mysqli_stmt_execute($stmt)) {
      echo "<script>alert('Airport added successfully.'); window.location='manageaircraft.php';</script>";
  } else {
      echo "<script>alert('Error adding airport: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Add Airport | Airline Management System</title>
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
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php" class="active">Airport</a></li>
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
      <a href="manageairport.php"><button>← Return</button></a><br><br>
      <h1>Add Airport Form</h1>
      <p>Add new airport</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <label>Name:</label>
                <input type="text" name="name">

                <label>Airport Image:</label>
                <input type="file" name="image" accept="image/*"> 

                <!--
                <label>Airport Image:</label>
                  <img id="preview" src="" alt="Airport Image Preview" width="150" height="120" style="display:none;"><br>
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

                <label>Coordinate:</label>
                <input type="text" name="coordinate">

                <label>Address:</label>
                <input type="text" name="address">

                <label>State:</label>
                <input type="text" name="state">

                <label>Country:</label>
                <input type="text" name="country">

                <label>Status:</label>
                <select name="status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Operational">Operational</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Closed">Closed</option>
                </select>

                <!-- Buttons row -->
              <div></div> <!-- empty cell for label column -->
              <div class="form-buttons">
                <button type="submit" class="button" name="addapbtn">Submit</button>
                <a href="manageairport.php"><button type="button" class="button">Cancel</button></a>
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