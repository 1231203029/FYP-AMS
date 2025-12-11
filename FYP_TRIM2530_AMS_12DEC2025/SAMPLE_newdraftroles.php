<?php
include('dataconnection.php');
?>

<!-- Sidebar -->
  <aside class="sidebar">
    <?php
      if(session=='superadmin'){
      ?>
    <h2 class="logo"><img src="image/plane1.png" alt="Superadmin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" class="active">Dashboard</a></li>
      <li><a href="manageuser.php">User</a></li>
      <li><a href="manageadmin.php">Admin</a></li>  <!-- Superadmin manages Admin -->
      <li><a href="managestaff.php">Staff</a></li>  <!-- Superadmin manages Staff -->
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section">SUPERADMIN</li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Help & Support</a></li>
     <?php
     }
      else if(session=='admin'){
      ?>
    <h2 class="logo"><img src="image/plane1.png" alt="Admin" class="icon">Airline Management System - Admin</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" class="active">Dashboard</a></li>
      <li><a href="manageuser.php">User</a></li>
      <li><a href="managestaff.php">Staff</a></li>  <!-- Admin manages Staff -->
      <li><a href="manageaircraft.php">Aircraft</a></li>
      <li><a href="manageairport.php">Airport</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section">ADMIN</li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Help & Support</a></li>
      <?php
     }
      else{
      ?>
    <h2 class="logo"><img src="image/plane1.png" alt="Staff" class="icon">Airline Management System - Staff</h2>
    <ul class="menu">
      <li><a href="adminhomepage.php" class="active">Dashboard</a></li>
      <li><a href="manageuser.php">User</a></li>
      <li><a href="manageflight.php">Flight</a></li>
      <li><a href="managedelayorrefund.php">Delay/Refund</a></li>
      <li><a href="managesale.php">Sale</a></li>
      <li class="menu-section">STAFF</li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Help & Support</a></li>
      <?php
     }
      ?>
    </ul>
  </aside>

