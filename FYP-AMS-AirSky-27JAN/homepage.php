<?php
include('auth.php');

/* ====LOGIN SUCCESS MESSAGE==== */
if (isset($_SESSION['show_login_message']) && $_SESSION['show_login_message'] === true) {
    echo '<script>
        window.onload = function() {
            alert("✅ Login successful!\nWelcome to Airline Management System.");
        };
    </script>';
    $_SESSION['show_login_message'] = false;
}

/* ====DASHBOARD STATISTICS==== */

// TOTAL CUSTOMERS
$result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM customer");
$total_customers = mysqli_fetch_assoc($result)['total'] ?? 0;

// SUPERADMIN
$r1 = mysqli_query($connect, "SELECT COUNT(*) AS total FROM superadmin");
$sup = mysqli_fetch_assoc($r1)['total'] ?? 0;

// ADMIN
$r2 = mysqli_query($connect, "SELECT COUNT(*) AS total FROM admin");
$adm = mysqli_fetch_assoc($r2)['total'] ?? 0;

// STAFF
$r3 = mysqli_query($connect, "SELECT COUNT(*) AS total FROM staff");
$stf = mysqli_fetch_assoc($r3)['total'] ?? 0;

// TOTAL ADMIN-SIDE USERS
$total_users = $sup + $adm + $stf;

// TOTAL ORDERS
$result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM booking");
$total_orders = mysqli_fetch_assoc($result)['total'] ?? 0;

// TOTAL REVENUE (PAID only)
$result = mysqli_query(
    $connect,
    "SELECT SUM(total_price) AS revenue FROM booking WHERE status='Confirmed'"
);
$total_revenue = mysqli_fetch_assoc($result)['revenue'] ?? 0;

// TOTAL SALE BY MONTH (current month)
$current_month_name = date('F Y');
$result = mysqli_query(
    $connect,
    "SELECT SUM(total_price) AS total
     FROM booking
     WHERE status = 'Confirmed'
     AND MONTH(booking_date) = MONTH(CURRENT_DATE())
     AND YEAR(booking_date) = YEAR(CURRENT_DATE())"
);

$total_monthly_sale = mysqli_fetch_assoc($result)['total'] ?? 0;
$total_monthly_sale = number_format($total_monthly_sale, 2);

$monthly_sales = mysqli_query(
    $connect,
    "SELECT 
        DATE_FORMAT(booking_date, '%b %Y') AS month,
        SUM(total_price) AS total
     FROM booking
     WHERE status = 'Confirmed'
     GROUP BY YEAR(booking_date), MONTH(booking_date)
     ORDER BY booking_date DESC
     LIMIT 6"
);

$months = [];
$sales  = [];

while ($row = mysqli_fetch_assoc($monthly_sales)) {
    $months[] = $row['month'];
    $sales[]  = $row['total'];
}

$months = array_reverse($months);
$sales  = array_reverse($sales);

if (empty($months)) {
    $months = ['No Data'];
    $sales  = [0];
}

// TOTAL SALE BY FLIGHT (top-selling flight)
$result = mysqli_query(
    $connect,
    "SELECT f.flight_number, SUM(b.total_price) AS total
FROM booking b
JOIN flight f ON f.id = b.flight_id
WHERE b.status = 'Confirmed'
GROUP BY b.flight_id
ORDER BY total DESC
LIMIT 5;"
);

$row = mysqli_fetch_assoc($result);

$total_flight_sale = $row['total'] ?? 0;
$top_flight_id     = $row['flight_id'] ?? 'N/A';

$total_flight_sale = number_format($total_flight_sale, 2);

// TOP 5 FLIGHTS BY REVENUE
$top_flights = mysqli_query(
    $connect,
    "SELECT flight_id, SUM(total_price) AS total
     FROM booking
     WHERE status = 'Confirmed'
     GROUP BY flight_id
     ORDER BY total DESC
     LIMIT 5"
);

// FORMAT OUTPUT
$total_users     = number_format($total_users);
$total_customers = number_format($total_customers);
$total_orders    = number_format($total_orders);
$total_revenue   = number_format($total_revenue, 2);

/*// Debug — show session in JS alert
echo '<script>';
echo 'alert(' . json_encode(print_r($_SESSION, true)) . ');';
echo '</script>';*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  /* Role Structure Table Minimal Styles with border-radius */
  .cards .card table {
      border-collapse: separate; /* needed for border-radius on cells */
      border-spacing: 0;
      width: 100%;
  }

  .cards .card table thead tr:first-child td {
      background-color: #0b103c;  /* Section name row */
      color: #dddddd;             /* Dark gray text */
      font-weight: bold;
      padding: 8px 12px;
      text-align: left;
  }

  .cards .card table thead tr:nth-child(2) td {
      background-color: #293b54ff;  /* Dark blue header row */
      color: #ffffff;             /* White text */
      padding: 6px 12px;
      text-align: left;
  }

  .cards .card table tbody td {
      background-color: #ffffff;  /* Keep table body white */
      color: #000000;             /* default text black */
      padding: 6px 12px;
      border-top: 1px solid #ddd;
      text-align: left;
  }

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <h1>Home</h1>
      <p>Welcome back! Here’s what’s happening.</p>

      <div class="cards">
        <?php if ($_SESSION['user_role_id'] <= 2): ?>
        <div class="card">
          <h3>Total Admin Portal Users</h3>
          <p class="value"><?= $total_users ?></p>
          <small>All admin system users (Superadmin + Admin + Staff)</small>
        </div>
        <?php endif; ?>

        <div class="card">
          <h3>Total Customers</h3>
          <p class="value"><?= $total_customers ?></p>
          <small>Registered passengers</small>
        </div>

        <?php if ($_SESSION['user_role_id'] <= 2): ?>
        <div class="card">
          <h3>Revenue</h3>
          <p class="value">RM <?= $total_revenue ?></p>
          <small>Paid bookings</small>
        </div>
        <?php endif; ?>

        <div class="card">
          <h3>Orders</h3>
          <p class="value"><?= $total_orders ?></p>
          <small>Total bookings</small>
        </div>

        <div class="card">
          <h3>Total Sale by Month</h3>
          <p class="value">RM <?= $total_monthly_sale ?></p>
          <small>Confirmed bookings (<?= $current_month_name ?>)</small>
        </div>

        <div class="card">
          <h3>Total Sale by Flight</h3>
          <p class="value">RM <?= $total_flight_sale ?></p>
          <small>Top flight (ID: <?= $top_flight_id ?>)</small>
        </div>

        <div class="card">
          <canvas id="monthlySalesChart"></canvas>
        </div>

          <div class="card">
            <h2>Top 5 Flights by Revenue</h2>
            <table>
              <thead>
                <tr>
                  <td>Rank</td>
                  <td>Flight ID</td>
                  <td>Total Revenue (RM)</td>
                </tr>
              </thead>
              <tbody>
                <?php
                $rank = 1;
                while ($row = mysqli_fetch_assoc($top_flights)) {
                    echo "<tr>";
                    echo "<td>{$rank}</td>";
                    echo "<td>{$row['flight_id']}</td>";
                    echo "<td>" . number_format($row['total'], 2) . "</td>";
                    echo "</tr>";
                    $rank++;
                }
                ?>
              </tbody>
            </table>
          </div>

      </div>

      <!-- section class="chart-section">
        <div class="chart-box">Revenue Overview (Chart Placeholder)</div>
        <div class="chart-box">Recent Activity (List Placeholder)</div>
      </section><br><br-->

      <div class="cards">
        <div class="card">
          <h2>Permissions:</h2>
          <table class="permissions">
            <thead>
              <tr>
                <td></td>
                <td>Manage Admin</td>
                <td>Manage Staff</td>
                <td>Manage Aircraft</td>
                <td>Manage Airport</td>
                <td>Manage Flight</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Superadmin</td>
                <td>✔️</td>
                <td>✔️</td>
                <td>✔️</td>
                <td>✔️</td>
                <td>✔️</td>
              </tr>
              <tr>
                <td>Admin</td>
                <td>❌</td>
                <td>✔️</td>
                <td>✔️</td>
                <td>✔️</td>
                <td>✔️</td>
              </tr>
              <tr>
                <td>Staff</td>
                <td>❌</td>
                <td>❌</td>
                <td>❌</td>
                <td>❌</td>
                <td>✔️</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><br>

      <div class="cards">
        <div class="card">
          <h2>Role Structure</h2>

          <?php
          // Fetch sections first
          $sections = mysqli_query($connect, "SELECT * FROM section ORDER BY id ASC");

          while ($section = mysqli_fetch_assoc($sections)) {
              echo '<table>';
              echo '<thead>';
              echo '<tr><td colspan="3">' . htmlspecialchars($section['name']) . '</td></tr>';
              echo '<tr><td>Role</td><td>Description</td></tr>';
              echo '</thead>';
              echo '<tbody>';

              // Fetch roles under this section
              $roles = mysqli_query($connect, "SELECT * FROM role WHERE section_id = {$section['id']} ORDER BY id ASC");
              while ($role = mysqli_fetch_assoc($roles)) {
                  echo '<tr>';
                  echo '<td>' . htmlspecialchars($role['name']) . '</td>';
                  echo '<td>' . htmlspecialchars($role['description']) . '</td>';
                  echo '</tr>';
              }

              echo '</tbody>';
              echo '</table><br>';
          }
          ?>
        </div>
      </div>

    </main>

    <footer>
        &copy; 2025 Airline Management System | Admin Panel 
        <img src="image/malaysia.png" alt="Admin" class="icon">
    </footer>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('monthlySalesChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($months) ?>,
                datasets: [{
                    label: 'Monthly Revenue (RM)',
                    data: <?= json_encode($sales) ?>,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                }
            }
        });
    });
  </script>

</body>
</html>
