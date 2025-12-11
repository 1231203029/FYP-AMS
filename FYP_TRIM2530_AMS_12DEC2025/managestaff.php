<?php
include('auth.php');

// Delete staff
if (isset($_GET["del"]) && isset($_GET["stfid"])) {
    $id = $_GET["stfid"];
    mysqli_query($connect, "DELETE FROM staff WHERE id=$id");
    echo "<script>alert('Staff deleted successfully.'); window.location='managestaff.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Staff | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    <?php function formatPhone($p) {
      return "+60" . substr($p, 1, 2) . "-" . substr($p, 3);
    }?>
  </script>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="manageadmin.php">Admin</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php" class="active">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
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
                <th>Status</th>
                <th colspan=3>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $result = mysqli_query($connect, "
                  SELECT s.id, s.name, s.email, s.phoneNo, s.status, 
                        sec.name AS section_name, r.name AS role_name
                  FROM staff s
                  LEFT JOIN section sec ON s.section_id = sec.id
                  LEFT JOIN role r ON s.role_id = r.id
              ");
              while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                      <td><?= $row["id"] ?></td>
                      <td><?= $row["name"] ?></td>
                      <td><?= $row["email"] ?></td>
                      <td><?= formatPhone($row["phoneNo"]); ?></td>
                      <td><?= $row["section_name"] ?></td>
                      <td><?= $row["role_name"] ?></td>
                      <td><?= $row["status"] ?></td>
                      <td>
                          <a href="viewstaff.php?view&stfid=<?= $row['id'] ?>">
                              <button>View</button>
                          </a>
                      </td>
                      <td>
                          <a href="updatestaff.php?stfid=<?= $row['id'] ?>">
                              <button>Update</button>
                          </a>
                      </td>
                      <td>
                          <a href="managestaff.php?del&stfid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this staff?');">
                              <button>Delete</button>
                          </a>
                      </td>
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
