<?php
include('dataconnection.php');

// === Load staff data for editing ===
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

// === Update staff ===
if (isset($_POST["updstaffbtn"])) { 
  $id = $_POST["id"];
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

  // If password fields are not empty, validate them
  if (!empty($password) || !empty($confirm_password)) {
    if ($password !== $confirm_password) {
      echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
      exit;
    }
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $update_query = "UPDATE staff 
      SET nric=?, name=?, image=?, gender=?, race=?, address=?, state=?, nationality=?, password=?, phoneNo=?, section=?, role=?, status=? 
      WHERE id=?";
    $stmt = mysqli_prepare($connect, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssi",
      $gender, $race, $address, $state, $nationality, $hashedpassword,
      $phoneNo, $section, $role, $status, $id);
  } else {
    // Update without changing password
    $update_query = "UPDATE staff 
      SET nric=?, name=?, image=?, gender=?, race=?, address=?, state=?, nationality=?, phoneNo=?, section=?, role=?, status=? 
      WHERE id=?";
    $stmt = mysqli_prepare($connect, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssi",
      $gender, $race, $address, $state, $nationality,
      $phoneNo, $section, $role, $status, $id);
  }

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Staff updated successfully.'); window.location='managestaff.php';</script>";
  } else {
    echo "<script>alert('Error updating staff: " . mysqli_error($connect) . "');</script>";
  }

  mysqli_stmt_close($stmt);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Update Staff | Airline Management System</title>
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
      <h1>Update Staff Form</h1>
      <p>Edit or reassign staff roles.</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post">
            <div class="form-grid">
              <label>ID:</label>
              <input type="number" name="id" value="<?= htmlspecialchars($staff['id']) ?>" readonly class="locked">

              <label>NRIC:</label>
              <input type="text" name="nric" value="<?= htmlspecialchars($staff['nric']) ?>" readonly class="locked">

              <label>Name:</label>
              <input type="text" name="name" value="<?= htmlspecialchars($staff['name']) ?>" readonly class="locked">

              <label>Staff Image:</label>
              <input type="file" name="image" value="<?= htmlspecialchars($staff['image']) ?>" accept="image/*" disabled class="locked">

              <!--
              <label>Staff Image:</label>
                ?php if (!empty($staff['image'])): ?>
                    <img id="preview" src="?= htmlspecialchars($staff['image']) ?>" alt="Staff Image" width="120" height="120">
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

              <label>Gender:</label>
              <div class="locked">
                <input type="radio" id="male" name="gender" value="Male" <?= $staff['gender']=='Male'?'checked':'' ?> disabled>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" <?= $staff['gender']=='Female'?'checked':'' ?> disabled>
                <label for="female">Female</label>
              </div>

              <label>Race:</label>
              <select name="race" class="locked" disabled>
                <option value="" disabled selected>Select Race</option>
                <option value="Malay" <?= $staff['race']=='Malay'?'selected':'' ?>>Malay</option>
                <option value="Chinese" <?= $staff['race']=='Chinese'?'selected':'' ?>>Chinese</option>
                <option value="Indian" <?= $staff['race']=='Indian'?'selected':'' ?>>Indian</option>
                <option value="Borneo" <?= $staff['race']=='Borneo'?'selected':'' ?>>Borneo</option>
                <option value="Others" <?= $staff['race']=='Others'?'selected':'' ?>>Others</option>
              </select>

              <label>Home Address:</label>
              <textarea name="address" rows="3" class="locked" readonly><?= htmlspecialchars($staff['address']) ?></textarea>

              <label>State:</label>
              <input type="text" name="state" value="<?= htmlspecialchars($staff['state']) ?>" readonly class="locked">

              <label>Nationality:</label>
              <input type="text" name="nationality" value="<?= htmlspecialchars($staff['nationality']) ?>" readonly class="locked">

              <label>Email:</label>
              <input type="email" name="email" value="<?= htmlspecialchars($staff['email']) ?>" readonly class="locked">

              <label>Phone No.:</label>
              <input type="tel" name="phoneNo" value="<?= htmlspecialchars($staff['phoneNo']) ?>" readonly class="locked">

              <label>Password:</label>
              <input type="password" name="password" readonly class="locked">

              <label>Confirm Password:</label>
              <input type="password" name="confirm_password" readonly class="locked">

              <label>Section:</label>
                <select name="section" id="section" required>
                  <option value="" disabled>Select Section</option>
                  <option value="Cockpit Crew" <?= $staff['section']=='Cockpit Crew'?'selected':'' ?>>Cockpit Crew</option>
                  <option value="Cabin Crew" <?= $staff['section']=='Cabin Crew'?'selected':'' ?>>Cabin Crew</option>
                  <option value="Ramp / Apron Crew" <?= $staff['section']=='Ramp / Apron Crew'?'selected':'' ?>>Ramp / Apron Crew</option>
                  <option value="Technical Crew" <?= $staff['section']=='Technical Crew'?'selected':'' ?>>Technical Crew</option>
                  <option value="Traffic / Operational Crew" <?= $staff['section']=='Traffic / Operational Crew'?'selected':'' ?>>Traffic / Operational Crew</option>
                  <option value="Airport & Support Staff" <?= $staff['section']=='Airport & Support Staff'?'selected':'' ?>>Airport & Support Staff</option>
                </select>

              <label>Role:</label>
              <select name="role" id="role" required>
                <option value="" disabled>Select Role</option>

                <optgroup label="Cockpit Crew">
                  <option value="Captain" <?= $staff['role']=='Captain'?'selected':'' ?>>Captain</option>
                  <option value="First Officer" <?= $staff['role']=='First Officer'?'selected':'' ?>>First Officer</option>
                  <option value="Second Officer" <?= $staff['role']=='Second Officer'?'selected':'' ?>>Second Officer</option>
                </optgroup>

                <optgroup label="Cabin Crew">
                  <option value="Purser" <?= $staff['role']=='Purser'?'selected':'' ?>>Purser</option>
                  <option value="Flight Attendant" <?= $staff['role']=='Flight Attendant'?'selected':'' ?>>Flight Attendant</option>
                </optgroup>

                <optgroup label="Ramp / Apron Crew">
                  <option value="Ground Handler" <?= $staff['role']=='Ground Handler'?'selected':'' ?>>Ground Handler</option>
                  <option value="Marshaler" <?= $staff['role']=='Marshaler'?'selected':'' ?>>Marshaler</option>
                  <option value="Pushback Operator" <?= $staff['role']=='Pushback Operator'?'selected':'' ?>>Pushback Operator</option>
                  <option value="Fueling Crew" <?= $staff['role']=='Fueling Crew'?'selected':'' ?>>Fueling Crew</option>
                  <option value="Catering Crew" <?= $staff['role']=='Catering Crew'?'selected':'' ?>>Catering Crew</option>
                  <option value="Cleaning Crew" <?= $staff['role']=='Cleaning Crew'?'selected':'' ?>>Cleaning Crew</option>
                </optgroup>

                <optgroup label="Technical Crew">
                  <option value="Aircraft Maintenance Engineer" <?= $staff['role']=='Aircraft Maintenance Engineer'?'selected':'' ?>>Aircraft Maintenance Engineer</option>
                  <option value="Aircraft Maintenance Technician" <?= $staff['role']=='Aircraft Maintenance Technician'?'selected':'' ?>>Aircraft Maintenance Technician</option>
                  <option value="Avionics Technician" <?= $staff['role']=='Avionics Technician'?'selected':'' ?>>Avionics Technician</option>
                </optgroup>

                <optgroup label="Traffic / Operational Crew">
                  <option value="Air Traffic Controller" <?= $staff['role']=='Air Traffic Controller'?'selected':'' ?>>Air Traffic Controller</option>
                  <option value="Flight Dispatcher" <?= $staff['role']=='Flight Dispatcher'?'selected':'' ?>>Flight Dispatcher</option>
                  <option value="Load Controller" <?= $staff['role']=='Load Controller'?'selected':'' ?>>Load Controller</option>
                  <option value="Traffic Inspector" <?= $staff['role']=='Traffic Inspector'?'selected':'' ?>>Traffic Inspector</option>
                </optgroup>

                <optgroup label="Airport & Support Staff">
                  <option value="Check-in Agent" <?= $staff['role']=='Check-in Agent'?'selected':'' ?>>Check-in Agent</option>
                  <option value="Gate Agent" <?= $staff['role']=='Gate Agent'?'selected':'' ?>>Gate Agent</option>
                  <option value="Security Personnel" <?= $staff['role']=='Security Personnel'?'selected':'' ?>>Security Personnel</option>
                  <option value="Customs & Immigration Officer" <?= $staff['role']=='Customs & Immigration Officer'?'selected':'' ?>>Customs & Immigration Officer</option>
                </optgroup>
              </select>

              <label>Status:</label>
              <select name="status" required>
                <option value="Active" <?= $staff['status']=='Active'?'selected':'' ?>>Active</option>
                <option value="Inactive" <?= $staff['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                <option value="On Leave" <?= $staff['status']=='On Leave'?'selected':'' ?>>On Leave</option>
                <option value="Suspended" <?= $staff['status']=='Suspended'?'selected':'' ?>>Suspended</option>
              </select>

              <!-- Buttons row -->
              <div></div>
              <div class="form-buttons">
                <button type="submit" class="button" name="updstaffbtn">Update Staff</button>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sectionSelect = document.getElementById("section");
      const roleSelect = document.getElementById("role");

      function filterRoles() {
        const selectedSection = sectionSelect.value;
        const optgroups = roleSelect.querySelectorAll("optgroup");
        optgroups.forEach(group => {
          group.style.display = (group.label === selectedSection) ? "block" : "none";
        });
      }

      // Run once on load (to show correct group)
      filterRoles();

      // Run every time section changes
      sectionSelect.addEventListener("change", filterRoles);
    });
  </script>

</body>
</html>
