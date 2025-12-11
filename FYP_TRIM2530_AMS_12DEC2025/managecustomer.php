<?php
include('auth.php');

// Ban customer
/*if (isset($_GET["del"]) && isset($_GET["custid"])) {
    $id = $_GET["custid"];
    mysqli_query($connect, "DELETE FROM staff WHERE id=$id");
    echo "<script>alert('Staff deleted successfully.'); window.location='managestaff.php';</script>";
    exit;
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Customer | Airline Management System</title>
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
      <li><a href="managecustomer.php" class="active">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
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
      <h1>Customer</h1>
      <p>Manage customer</p>

      <div class="cards">
        <div class="card">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Status</th>
                <th colspan=3>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $result = mysqli_query($connect, "
                  SELECT c.id, c.name, c.email, c.phoneNo, c.status 
                  FROM customer c
              ");
              while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                      <td><?= $row["id"] ?></td>
                      <td><?= $row["name"] ?></td>
                      <td><?= $row["email"] ?></td>
                      <td><?= formatPhone($row["phoneNo"]); ?></td>
                      <td><?= $row["status"] ?></td>
                      <td>
                          <a href="viewcust.php?view&custid=<?= $row['id'] ?>">
                              <button>View</button>
                          </a>
                      </td>
                      <td>
                          <a href="updatecust.php?custid=<?= $row['id'] ?>">
                              <button>Update</button>
                          </a>
                      </td>
                      <td>
                          <a href="managecustomer.php?report&custid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to report this customer?');">
                              <button>Report</button>
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