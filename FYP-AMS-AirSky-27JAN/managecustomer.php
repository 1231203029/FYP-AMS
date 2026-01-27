<?php
include('auth.php');

// All staff roles 3–26 + optional higher management can access
requireSystemRole('staff', true);  // true = allow Superadmin/Admin too

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
  <?php include('sidebar.php'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <div class="search-box">
        <input type="text" placeholder="Search... (Ctrl+K)">
      </div>
      <?php include('profileheader.php'); ?>
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
                          <a href="viewcustbookings.php?view_b&custid=<?= $row['id'] ?>">
                              <button>View Bookings</button>
                          </a>
                      </td>
                      <!--td>
                          <a href="#" onclick="return confirm('Are you sure you want to report this customer?');">
                              <button>Report</button>
                          </a>
                      </td-->
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