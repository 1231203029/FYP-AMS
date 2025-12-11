<?php
include('auth.php');

// Delete aircraft
if (isset($_GET["del"]) && isset($_GET["acid"])) {
    $id = $_GET["acid"];
    mysqli_query($connect, "DELETE FROM aircraft WHERE id=$id");
    echo "<script>alert('Aircraft deleted successfully.'); window.location='manageaircraft.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Aircraft | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="manageadmin.php">Admin</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php" class="active">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section"><?php echo strtoupper(htmlspecialchars($_SESSION['admin_role'])); ?></li>
      <li><a href="adminlogout.php" onclick="return confirm('Are you sure you want to log out?');" style="background-color:red; color:white;">Logout</a></li>
      <li><a href="#">Settings</a></li>
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
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?> ( <?php echo htmlspecialchars($_SESSION['admin_role']); ?> ) </span>
        <img src="<?php echo htmlspecialchars($_SESSION['admin_image']); ?>" 
            alt="<?php echo htmlspecialchars($_SESSION['admin_name']); ?>" 
            class="profile-pic">
      </div>
    </header>

    <main>
      <h1>Aircraft</h1>
      <p>Manage aircraft</p>

      <div class="cards">
        <div class="card">
          <p><a href="addaircraft.php?add"><button class="button">+ Add Aircraft</button></a></p>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Company</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Total Seats</th>
                <th colspan=3>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $result = mysqli_query($connect, "SELECT * FROM aircraft"); while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["model"] ?></td>
                <td><?= $row["company"] ?></td>
                <td><?= $row["type"] ?></td>
                <td><?= $row["quantity"] ?></td>
                <td><?= $row["total_seats"] ?></td>
                <td><a href="viewaircraft.php?acid=<?= $row['id'] ?>">
                  <button>View</button></a></td>
                <td><a href="updateaircraft.php?acid=<?= $row['id'] ?>">
                  <button>Update</button></a></td>
                <td><a href="manageaircraft.php?del&acid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this aircraft?');">
                  <button>Delete</button></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="cards">
        <?php $result = mysqli_query($connect, "SELECT * FROM aircraft"); while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
          <p>ID: <?= $row["id"] ?></p>
          <img src="<?= $row["image"] ?>" alt="<?= $row["model"] ?>">
          <div class="card-info">
            <p><strong><?= $row["model"] ?></strong></P>
            <p>Company: <?= $row["company"] ?></P>
            <p>Type: <?= $row["type"] ?></P>
            <P>Quantity: <?= $row["quantity"] ?></P>
            <p>Total Seats: <?= $row["total_seats"] ?></p>
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
