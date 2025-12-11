<?php
include('dataconnection.php');

// === Load airport data for editing ===
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

// Update airport
if (isset($_POST["updapbtn"])) {
  $name = $_POST["name"];
  $image = $_POST["image"];
  $coordinate = $_POST["coordinate"];
  $address = $_POST["address"];
  $state = $_POST["state"];
  $country = $_POST["country"];
  $status = $_POST["status"];

  // Prepare SQL update
  $update_query = "UPDATE airport 
                SET name=?, image=?, coordinate=?, address=?, state=?, country=?, status=?
                WHERE id=?";

  $stmt = mysqli_prepare($connect, $update_query);

  mysqli_stmt_bind_param(
      $stmt,
      "sssssssi",  // 7 string parameters
      $name, 
      $image,
      $coordinate,
      $address,
      $state,
      $country,
      $status,
      $id
  );

  // Execute and confirm
  if (mysqli_stmt_execute($stmt)) {
      echo "<script>alert('Airport updated successfully.'); window.location='manageairport.php';</script>";
  } else {
      echo "<script>alert('Error updating airport: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Update Airport | Airline Management System</title>
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
      <h1>Update Airport Form</h1>
      <p>Update current airport</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <label>ID:</label>
                <input type="text" name="id" value="<?= htmlspecialchars($airport['id']) ?>" readonly class="locked">

                <label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($airport['name']) ?>" required>

                <label>Airport Image:</label>
                <input type="file" name="image" value ="<?= htmlspecialchars($airport['image']) ?>" accept="image/*">
                
                <!--
                <label>Airport Image:</label>
                    ?php if (!empty($airport['image'])): ?>
                       <img id="preview" src="?= htmlspecialchars($airport['image']) ?>" alt="Airport Image" width="120" height="120">
                    ?php else: ?>
                       <img id="preview" src="" alt="No Image" width="120" height="120" style="display:none;">
                    ?php endif; ?>
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
                -->

                <label>Coordinate:</label>
                <input type="text" name="coordinate" value="<?= htmlspecialchars($airport['coordinate']) ?>" required>

                <label>Address:</label>
                <input type="text" name="address" value="<?= htmlspecialchars($airport['address']) ?>" required>

                <label>State:</label>
                <input type="text" name="state" value="<?= htmlspecialchars($airport['state']) ?>" required>

                <label>Country:</label>
                <input type="text" name="country" value="<?= htmlspecialchars($airport['country']) ?>" required>

                <label>Status:</label>
                <select name="status" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="Operational" <?= $airport['status']=='Operational'?'selected':'' ?>>Operational</option>
                    <option value="Maintenance" <?= $airport['status']=='Maintenance'?'selected':'' ?>>Maintenance</option>
                    <option value="Closed" <?= $airport['status']=='Closed'?'selected':'' ?>>Closed</option>
                </select>

                <!-- Buttons row -->
              <div></div> <!-- empty cell for label column -->
              <div class="form-buttons">
                <button type="submit" class="button" name="updapbtn">Submit</button>
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