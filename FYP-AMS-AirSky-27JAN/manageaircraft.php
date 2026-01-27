<?php
include('auth.php');

// Admin (role_id = 2) and Superadmin (1) can access
requireSystemRole('admin');

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
