<?php
include('auth.php');

if (isset($_SESSION['show_login_message']) && $_SESSION['show_login_message'] === true) {
    echo '<script>
        window.onload = function() {
            alert("✅Login successful!\nWelcome to Airline Management System.");
        };
    </script>';
    $_SESSION['show_login_message'] = false;
}

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
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" class="active">Dashboard</a></li>
      <li><a href="manageadmin.php">Admin</a></li>
      <li><a href="managecustomer.php">Customer</a></li>
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
      <h1>Dashboard</h1>
      <p>Welcome back! Here’s what’s happening.</p>

      <div class="cards">
        <div class="card">
          <h3>Total Users</h3>
          <p class="value">12,428</p>
          <small>↑ 12.5% from last week</small>
        </div>
        <div class="card">
          <h3>Revenue</h3>
          <p class="value">$54,320</p>
          <small>↑ 8.2%</small>
        </div>
        <div class="card">
          <h3>Orders</h3>
          <p class="value">1,852</p>
          <small>↓ 2.1%</small>
        </div>
        <div class="card">
          <h3>Avg. Response</h3>
          <p class="value">2.3s</p>
          <small>↑ 5.4%</small>
        </div>
      </div>

      <section class="chart-section">
        <div class="chart-box">Revenue Overview (Chart Placeholder)</div>
        <div class="chart-box">Recent Activity (List Placeholder)</div>
      </section><br><br>

      <div class="cards">
        <div class="card">
          <h2>Permissions:</h2>
          <table>
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
          <h2>Role Structure - Staff</h2>
          <table>
            <thead>
              <tr><td colspan="3">In-flight Crew</td></tr>
              <tr>
                <td>Section</td>
                <td>Role</td>
                <td>Description</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="3">Cockpit</td>
                <td>Captain (Pilot-in-Command)</td>
                <td>Overall authority, decision-making, and safe operation of flight</td>
              </tr>
              <tr>
                <td>First Officer (Co-Pilot)</td>
                <td>Assists captain in flying, navigation, and communication</td>
              </tr>
              <tr>
                <td>Second Officer / Relief Pilot</td>
                <td>Take over during long-haul flights to allow main pilots to rest</td>
              </tr>
              <tr>
                <td rowspan="2">Cabin</td>
                <td>Purser / Chief Flight Attendant / Cabin Manager</td>
                <td>Leads cabin crew, manages service and safety procedures</td>
              </tr>
              <tr>
                <td>Flight Attendants</td>
                <td>Serve food/drinks, assist passengers, handle emergencies</td>
              </tr>
            </tbody>
          </table><br>
          <table>
            <thead>
              <tr><td colspan="3">Ground Crew</td></tr>
              <tr>
                <td>Section</td>
                <td>Role</td>
                <td>Description</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="6">Ramp/Apron</td>
                <td>Ground Handler / Baggage Handler</td>
                <td>Load and unload luggage/cargo</td>
              </tr>
              <tr>
                <td>Marshaler</td>
                <td>Guide aircraft during parking and pushback</td>
              </tr>
              <tr>
                <td>Pushback Operator / Tug Driver</td>
                <td>Move aircraft from gate using tow vehicle</td>
              </tr>
              <tr>
                <td>Fueling Crew</td>
                <td>Refuel aircraft safely</td>
              </tr>
              <tr>
                <td>Catering Crew</td>
                <td>Load meals and beverages</td>
              </tr>
              <tr>
                <td>Cleaning Crew</td>
                <td>Clean cabin and prepare it for passengers</td>
              </tr>

              <tr>
                <td rowspan="2">Technical</td>
                <td>Aircraft Maintenance Engineer / Technician</td>
                <td>Perform pre/post-flight checks, fix technical issues</td>
              </tr>
              <tr>
                <td>Avionics Technician</td>
                <td>Maintain and repair electronic systems/instruments</td>
              </tr>

              <tr>
                <td rowspan="4">Traffic / Operational</td>
                <td>Air Traffic Controller (ATC)</td>
                <td>Guide aircraft during takeoff, en-route, and landing </td>
              </tr>
              <tr>
                <td>Flight Dispatcher / Operations Officer </td>
                <td>Plan flight paths, fuel loads, and weather monitoring</td>
              </tr>
              <tr>
                <td>Load Controller / Weight & Balance Officer</td>
                <td>Ensure safe distribution of passengers, luggage, and cargo </td>
              </tr>
              <tr>
                <td>Traffic Inspector / Ground Operations Supervisor</td>
                <td>Monitor ramp/ground operations and enforce safety rules</td>
              </tr>

              <tr>
                <td rowspan="4">Airport & Support Staff</td>
                <td>Check-in Agents / Ticketing Agents </td>
                <td>Assist with tickets, check-in, and boarding passes</td>
              </tr>
              <tr>
                <td>Gate Agents</td>
                <td>Manage boarding, announcements, and gate changes</td>
              </tr>
              <tr>
                <td>Security Personnel</td>
                <td>Screen passengers and baggage for safety</td>
              </tr>
              <tr>
                <td>Customs & Immigration Officers</td>
                <td>Inspect travel documents, manage border control</td>
              </tr>
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
