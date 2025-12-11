<?php
include('auth.php');

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
      <li><a href="adminhomepage.php">Dashboard</a></li>
      <li><a href="manageadmin.php">Admin</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php" class="active">Flight</a></li>
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
      <h1>Flight</h1>
      <p>Manage flight schedule</p>

      <div class="cards">
        <div class="card">
          <p><a href="addflight.php?add"><button class="button">+ Create Flight</button></a></p>
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Flight No.</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Aircraft</th>
                    <th>Status</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "
                    SELECT 
                        f.id, 
                        f.flight_number, 
                        origin.name AS origin_airport, 
                        dest.name AS destination_airport, 
                        f.departure_time, 
                        f.arrival_time, 
                        ac.model AS aircraft_model, 
                        f.status
                    FROM flight f
                    LEFT JOIN aircraft ac ON f.aircraft_id = ac.id
                    LEFT JOIN airport origin ON f.origin_airport_id = origin.id
                    LEFT JOIN airport dest ON f.destination_airport_id = dest.id
                ";
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= htmlspecialchars($row["flight_number"]) ?></td>
                    <td><?= htmlspecialchars($row["origin_airport"]) ?></td>
                    <td><?= htmlspecialchars($row["destination_airport"]) ?></td>
                    <td><?= $row["departure_time"] ?></td>
                    <td><?= $row["arrival_time"] ?></td>
                    <td><?= htmlspecialchars($row["aircraft_model"]) ?></td>
                    <td><?= htmlspecialchars($row["status"]) ?></td>
                    <td><a href="passengerlist.php?flightid=<?= $row['id'] ?>"><button>Passenger List</button></a></td>
                    <td><a href="updateflight.php?flightid=<?= $row['id'] ?>"><button>Update</button></a></td>
                    <td><a href="manageflight.php?del&flightid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to cancel this flight?');"><button>Cancel</button></a></td>
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
