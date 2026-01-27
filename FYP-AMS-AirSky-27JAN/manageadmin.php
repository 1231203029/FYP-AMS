<?php
include('auth.php');
// Only Superadmin (role_id = 1) can access
requireSystemRole('superadmin');
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
      <h1>Admin</h1>
      <p>Manage admin</p>

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
                  SELECT a.id, a.name, a.email, a.phoneNo, a.status 
                  FROM admin a
              ");
              while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                      <td><?= $row["id"] ?></td>
                      <td><?= $row["name"] ?></td>
                      <td><?= $row["email"] ?></td>
                      <td><?= formatPhone($row["phoneNo"]); ?></td>
                      <td><?= $row["status"] ?></td>
                      <td>
                          <a href="viewadmin.php?view&adminid=<?= $row['id'] ?>">
                              <button>View</button>
                          </a>
                      </td>
                      <td>
                          <a href="updateadmin.php?adminid=<?= $row['id'] ?>">
                              <button>Update</button>
                          </a>
                      </td>
                      <td>
                          <a href="manageadmin.php?report&adminid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to report this admin?');">
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