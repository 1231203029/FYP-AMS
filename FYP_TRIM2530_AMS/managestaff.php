<?php
include('dataconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Staff | Airline Management System</title>
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
      <h1>Staff</h1>
      <p>Manage staff</p>

      <div class="cards">
        <div class="card">
          <p><a href="addstaff.php?add"><button class="button">+ Add Staff</button></a></p>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Section</th>
                <th>Role</th>
                <th colspan=3>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $result = mysqli_query($connect, "SELECT * FROM staff"); while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["phoneNo"] ?></td>
                <td><?= $row["section"] ?></td>
                <td><?= $row["role"] ?></td>
                <td><a href="viewstaff.php?view&stfid=<?= $row['id'] ?>">
                  <button>View</button></a></td>
                <td><a href="updatestaff.php?upd&stfid=<?= $row['id'] ?>">
                  <button>Update</button></a></td>
                <td><a href="managestaff.php?del&stfid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this staff?');">
                  <button>Delete</button></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
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
