<?php
include('dataconnection.php');
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
      <li><a href="manageuser.php">User</a></li>
      <li><a href="managestaff.php">Staff</a></li>
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
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
      </section>
    </main>

    <footer>
        &copy; 2025 Airline Management System | Admin Panel 
        <img src="image/malaysia.png" alt="Admin" class="icon">
    </footer>

  </div>

</body>
</html>
