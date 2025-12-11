<?php
include('dataconnection.php');

// Delete flight
if (isset($_GET["del"]) && isset($_GET["flightid"])) {
    $id = $_GET["flightid"];
    mysqli_query($connect, "DELETE FROM flight WHERE id=$id");
    echo "<script>alert('Flight deleted successfully.'); window.location='manageflight.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Flight | Airline Management System</title>
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
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php" class="active">Flight</a></li>
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
      <h1>Flight</h1>
      <p>Manage flight schedule</p>

      <div class="cards">
        <div class="card">
          <p><a href="addflight.php?add"><button class="button">+ Create Flight</button></a></p>
         <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Destination</th>
                <th>Country</th>
                <th>Departure Time</th>
                <th>Landing Time</th>
                <th>Aircraft</th>
                <th>Status</th>
                <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT 
                            f.id, 
                            a.name AS destination, 
                            a.country AS country, 
                            f.start_date_time, 
                            f.end_date_time, 
                            ac.model AS aircraft, 
                            f.status
                        FROM flight f
                        JOIN airport a ON f.airport_id = a.id
                        JOIN aircraft ac ON f.aircraft_id = ac.id";

                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= htmlspecialchars($row["destination"]) ?></td>
                    <td><?= htmlspecialchars($row["country"]) ?></td>
                    <td><?= $row["start_date_time"] ?></td>
                    <td><?= $row["end_date_time"] ?></td>
                    <td><?= htmlspecialchars($row["aircraft"]) ?></td>
                    <td><?= htmlspecialchars($row["status"]) ?></td>
                    <td><a href="viewflight.php?view&flightid=<?= $row['id'] ?>"><button>View</button></a></td>
                    <td><a href="updateflight.php?flightid=<?= $row['id'] ?>"><button>Update</button></a></td>
                    <td><a href="manageflight.php?del&flightid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this flight?');"><button>Delete</button></a></td>
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
