<?php
// Ensure session exists
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Current page
$currentPage = basename($_SERVER['PHP_SELF']);

// Logged-in role
$user_role_id = $_SESSION['user_role_id'] ?? 0;
$user_role    = $_SESSION['user_role'] ?? 'UNKNOWN';

// Helper for active class (supports subpages)
function active($pagePrefix) {
    global $currentPage;
    $currentPageName = explode('?', $currentPage)[0]; // ignore query string
    return str_starts_with($currentPageName, $pagePrefix) ? 'active' : '';
}
?>

<aside class="sidebar">
  <h2 class="logo">
    <img src="image/plane1.png" alt="Admin" class="icon">
    AirSky - AMS Admin Portal
  </h2>

  <ul class="menu">

    <!-- Dashboard (ALL) -->
    <li>
      <a href="homepage.php" class="<?= active('homepage') ?>">Home</a>
    </li>

    <!-- Superadmin ONLY -->
    <?php if ($user_role_id == 1): ?>
      <li>
        <a href="manageadmin.php" class="<?= active('manageadmin') ?>">Admin</a>
      </li>
      <li>
        <a href="managelog.php" class="<?= active('managelog') ?>">Progession Log</a>
      </li>
    <?php endif; ?>

    <!-- Customer (ALL) -->
    <li>
      <a href="managecustomer.php" class="<?= active('managecustomer') ?>
      <?= active('viewcust') ?><?= active('viewcustbookings') ?>">Customer</a>
    </li>

    <!-- Superadmin + Admin -->
    <?php if ($user_role_id == 1 || $user_role_id == 2): ?>
      <li>
        <a href="managestaff.php" class="<?= active('managestaff') ?>
        <?= active('addstaff') ?><?= active('viewstaff') ?><?= active('updatestaff') ?>">Staff</a>
      </li>
      <li>
        <a href="manageaircraft.php" class="<?= active('manageaircraft') ?>
        <?= active('addaircraft') ?><?= active('viewaircraft') ?><?= active('updateaircraft') ?>">Aircraft</a>
      </li>
      <li>
        <a href="manageairport.php" class="<?= active('manageairport') ?>
        <?= active('addairport') ?><?= active('viewairport') ?><?= active('updateairport') ?>">Airport</a>
      </li>
    <?php endif; ?>

    <!-- Flight (ALL staff roles) -->
    <li>
      <a href="manageflight.php" class="<?= active('manageflight') ?><?= active('addflight') ?><?= active('updateflight') ?><?= active('passengerlist') ?>">Flight</a>
    </li>

    <!-- Delay / Refund (ALL) 
    <li>
      <a href="#" class="<//?????= active('managedelayorrefund') ?>">
        Delay / Refund
      </a>
    </li>

    <li>
      <a href="#" class="<//?= active('managesale') ?>">Sale</a>
    </li>
    -->

    <!-- Role label -->
    <li class="menu-section">
    <?php
        if ($user_role_id == 1 || $user_role_id == 2) {
            echo strtoupper(htmlspecialchars($user_role));
        } else {
            echo 'STAFF';
        }
    ?>
    </li>

    <!-- Logout -->
    <li>
      <a href="logout.php"
         onclick="return confirm('Are you sure you want to log out?');"
         style="background-color:red; color:white;">
        Logout
      </a>
    </li>

    <!-- Other static links -->
    <li><a href="#">Settings</a></li>
    <li><a href="#">Help & Support</a></li>

  </ul>
</aside>
