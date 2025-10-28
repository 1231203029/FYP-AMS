<?php
include('dataconnection.php');

// Add staff
if (isset($_POST["addstaffbtn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $role = $_POST["role"];
    $status = $_POST["status"];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO staff (name, email, password, phoneNo, homeAddress, role, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $hashedpassword, $phone, $address, $role, $status);
    mysqli_stmt_execute($stmt);
    echo "<script>alert('Staff added successfully.'); window.location='AdminManageStaff.php';</script>";
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
      <li><a href="manageuser.php">User</a></li>
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
      <a href="managestaff.php"><button><- Return</button></a>
      <h1>Add Staff Form</h1>
      <p>Add new staff</p>

      <div class="cards">
        <div class="card">
            <label>NRIC:</label><input type="number" name="ic">
            <label>Name:</label><input type="text" name="name">
            <label>Image(3.5 x 4.5 cm) or (1.38 x 1.77 in):</label><input type="image" name="image">
            
            <label>Gender:</label><input type="radio" name="gender">
            <label>Race:</label><input type="dropdown" name="race">
              <li>Malay</li>
              <li>Chinese</li>
              <li>Indian</li>
              <li>Borneo</li>
              <li>Others</li>
            <label>Home Address:</label><input type="text" name="address">
            <label>State:</label><input type="text" name="state">
            <label>Nationality:</label><input type="text" name="nationality">
            
            <label>Email:</label><input type="text" name="email">
            <label>Password:</label><input type="text" name="password">
            <label>Confirm Password:</label><input type="text" name="password">
            <label>Phone No.:</label><input type="number" name="phoneNo">
            <label>Section</label><input type="dropdown" name="section">
            <label>Role</label><input type="dropdown" name="role">
            <label>Status</label><input type="dropdown" name="status">
            
            <!--Check Display before Submission -->

            <button type="submit" class="button" name="addstaffbtn">Submit</button>
            <a href="managestaff.php"><button type="submit" class="button" name="cancelbtn">Cancel</button></a>

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