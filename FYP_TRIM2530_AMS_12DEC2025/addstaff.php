<?php
include('dataconnection.php');

// Add staff
if (isset($_POST["addstaffbtn"])) {
  $nric = $_POST["nric"];
  $name = $_POST["name"];
  $image = $_POST["image"];
  $gender = $_POST["gender"];
  $race = $_POST["race"];
  $address = $_POST["address"];
  $state = $_POST["state"];
  $nationality = $_POST["nationality"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $phoneNo = $_POST["phoneNo"];
  $section = $_POST["section"];
  $role = $_POST["role"];
  $status = $_POST["status"];

  // Password check
  if ($password !== $confirm_password) {
      echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
      exit;
  }

  // Hash password
  $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

  // Prepare SQL insert
  $insert_query = "INSERT INTO staff 
      (nric, name, image, gender, race, address, state, nationality, email, password, phoneNo, section, role, status)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($connect, $insert_query);

  mysqli_stmt_bind_param(
      $stmt,
      "ssssssssssssss",  // 14 string parameters
      $nric,
      $name,
      $image,
      $gender,
      $race,
      $address,
      $state,
      $nationality,
      $email,
      $hashedpassword,
      $phoneNo,
      $section,
      $role,
      $status
  );

  // Execute and confirm
  if (mysqli_stmt_execute($stmt)) {
      echo "<script>alert('Staff added successfully.'); window.location='managestaff.php';</script>";
  } else {
      echo "<script>alert('Error adding staff: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Add Staff | Airline Management System</title>
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
      <h1>Add Staff Form</h1>
      <p>Add new staff</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
              <label>NRIC:</label>
              <input type="number" name="nric" required>

              <label>Name:</label>
              <input type="text" name="name" required>

              <label>Image (3.5 x 4.5 cm) or (1.38 x 1.77 in):</label>
              <input type="file" name="image" accept="image/*">

              <!--
              <label>Image (3.5 x 4.5 cm) or (1.38 x 1.77 in):</label>
                <img id="preview" src="" alt="Staff Image Preview" width="120" height="120" style="display:none;"><br>
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

              <label>Gender:</label>
              <div class="radio-group">
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">Female</label>
              </div>

              <label>Race:</label>
              <select name="race" required>
                <option value="" disabled selected>Select Race</option>
                <option value="Malay">Malay</option>
                <option value="Chinese">Chinese</option>
                <option value="Indian">Indian</option>
                <option value="Borneo">Borneo</option>
                <option value="Others">Others</option>
              </select>

              <label>Home Address:</label>
              <textarea name="address" rows="3" required></textarea>

              <label>State:</label>
              <input type="text" name="state" required>

              <label>Nationality:</label>
              <input type="text" name="nationality" required>

              <label>Email:</label>
              <input type="email" name="email" required>

              <label>Password:</label>
              <input type="password" name="password" required>

              <label>Confirm Password:</label>
              <input type="password" name="confirm_password" required>

              <label>Phone No.:</label>
              <input type="tel" name="phoneNo" required>

              <label>Section:</label>
              <select name="section" id="section" required>
                <option value="" disabled selected>Select Section</option>
                <option value="Cockpit Crew">Cockpit Crew</option>
                <option value="Cabin Crew">Cabin Crew</option>
                <option value="Ramp / Apron Crew">Ramp / Apron Crew</option>
                <option value="Technical Crew">Technical Crew</option>
                <option value="Traffic / Operational Crew">Traffic / Operational Crew</option>
                <option value="Airport & Support Staff">Airport & Support Staff</option>
              </select>

              <label>Role:</label>
              <select name="role" id="role" required>
                <option value="" disabled selected>Select Role</option>
                <optgroup label="Cockpit Crew">
                  <option value="Captain">Captain</option>
                  <option value="First Officer">First Officer</option>
                  <option value="Second Officer">Second Officer</option>
                </optgroup>
                <optgroup label="Cabin Crew">
                  <option value="Purser">Purser</option>
                  <option value="Flight Attendant">Flight Attendant</option>
                </optgroup>
                <optgroup label="Ramp / Apron Crew">
                  <option value="Ground Handler">Ground Handler</option>
                  <option value="Marshaler">Marshaler</option>
                  <option value="Pushback Operator">Pushback Operator</option>
                  <option value="Fueling Crew">Fueling Crew</option>
                  <option value="Catering Crew">Catering Crew</option>
                  <option value="Cleaning Crew">Cleaning Crew</option>
                </optgroup>
                <optgroup label="Technical Crew">
                  <option value="Aircraft Maintenance Engineer">Aircraft Maintenance Engineer</option>
                  <option value="Aircraft Maintenance Technician">Aircraft Maintenance Technician</option>
                  <option value="Avionics Technician">Avionics Technician</option>
                </optgroup>
                <optgroup label="Traffic / Operational Crew">
                  <option value="Air Traffic Controller">Air Traffic Controller</option>
                  <option value="Flight Dispatcher">Flight Dispatcher</option>
                  <option value="Load Controller">Load Controller</option>
                  <option value="Traffic Inspector">Traffic Inspector</option>
                </optgroup>
                <optgroup label="Airport & Support Staff">
                  <option value="Check-in Agent">Check-in Agent</option>
                  <option value="Gate Agent">Gate Agent</option>
                  <option value="Security Personnel">Security Personnel</option>
                  <option value="Customs & Immigration Officer">Customs & Immigration Officer</option>
                </optgroup>
              </select>

              <label>Status:</label>
              <select name="status" required>
                <option value="" disabled selected>Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="On Leave">On Leave</option>
                <option value="Suspended">Suspended</option>
              </select>

              <!-- Buttons row -->
              <div></div> <!-- empty cell for label column -->
              <div class="form-buttons">
                <button type="submit" class="button" name="addstaffbtn">Submit</button>
                <a href="managestaff.php"><button type="button" class="button">Cancel</button></a>
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