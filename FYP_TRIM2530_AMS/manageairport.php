<?php
include('dataconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Airport | Airline Management System</title>
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
      <h1>Airport</h1>
      <p>Manage airport</p>

      <div class="cards">
        <div class="card">
          <p><a href="addairport.php?add"><button class="button">+ Add Airport</button></a></p>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Coordinate</th>
                <th>Address</th>
                <th>State</th>
                <th>Country</th>
                <th>Status</th>
                <th colspan=3>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $result = mysqli_query($connect, "SELECT * FROM airport"); while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["coordinate"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["state"] ?></td>
                <td><?= $row["country"] ?></td>
                <td><?= $row["status"] ?></td>
                <td><a href="viewairport.php?view&apid=<?= $row['id'] ?>">
                  <button>View</button></a></td>
                <td><a href="updateairport.php?upd&apid=<?= $row['id'] ?>">
                  <button>Update</button></a></td>
                <td><a href="manageairport.php?del&apid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this airport?');">
                  <button>Delete</button></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="cards">
        <?php $result = mysqli_query($connect, "SELECT * FROM airport"); while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
          <p>ID: <?= $row["id"] ?></p>
          <img src="<?= $row["image"] ?>" alt="<?= $row["name"] ?>">
          <div class="card-info">
            <p><strong><?= $row["name"] ?></strong></P>
            <p>Coordinate: <?= $row["coordinate"] ?></P>
            <p>Address: <?= $row["address"] ?></P>
            <P>State: <?= $row["state"] ?></P>
            <p>Country: <?= $row["country"] ?></p>
            <P>Status: <?= $row["status"] ?></P>
          </div>
        </div>
        <?php } ?>
      </div>
    </main>

    <footer>
        &copy; 2025 Airline Management System | Admin Panel 
        <img src="image/malaysia.png" alt="Admin" class="icon">
    </footer>

  </div>

</body>
</html>
