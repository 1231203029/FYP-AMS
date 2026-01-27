<?php
include('auth.php');

// All staff roles 3–26 + optional higher management can access
requireSystemRole('staff', true);  // true = allow Superadmin/Admin too

// Delay flight
if (isset($_GET["delay"]) && isset($_GET["flightid"])) {
    $id = $_GET["flightid"];

    $stmt = mysqli_prepare($connect, "UPDATE flight SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    $status = "Delayed";
    mysqli_stmt_execute($stmt);

    echo "<script>alert('Flight delayed successfully.'); window.location='manageflight.php';</script>";
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
      <h1>Flight</h1>
      <p>Manage flight schedule</p>

      <div class="cards">
        <div class="card">
          <?php if ($_SESSION['user_role_id'] <= 2): ?>
          <p><a href="addflight.php?add"><button class="button">+ Create Flight</button></a></p>
          <?php endif; ?>
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
                    <?php if ($_SESSION['user_role_id'] <= 2): ?>
                    <td><a href="updateflight.php?flightid=<?= $row['id'] ?>"><button>Update</button></a></td>
                    <td><a href="manageflight.php?delay&flightid=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delay this flight?');"><button>Delay</button></a></td>
                    <?php endif; ?>
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
