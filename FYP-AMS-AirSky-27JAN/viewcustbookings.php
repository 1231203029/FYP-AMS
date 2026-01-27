<?php
include('auth.php');

// Get customer ID from URL
$customer_id = isset($_GET['custid']) ? intval($_GET['custid']) : 0;

// Fetch customer info
$customer_result = mysqli_query($connect, "SELECT * FROM customer WHERE id = $customer_id");
$customer = mysqli_fetch_assoc($customer_result);

// Fetch bookings for this customer
$booking_result = mysqli_query($connect, "
    SELECT 
        b.id AS booking_id,
        b.seat_number,
        b.booking_date,
        b.total_price,
        b.status AS booking_status,
        f.flight_number
    FROM booking b
    LEFT JOIN flight f ON b.flight_id = f.id
    WHERE b.customer_id = $customer_id
    ORDER BY b.booking_date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Manage Customer | Airline Management System</title>
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
      <a href="managecustomer.php"><button>← Return</button></a><br><br>
      <h1>Customer Bookings</h1>
      <p>View customer current bookings.</p>

      <div class="cards">
        <div class="card">
          <table>
              <p><strong>Customer ID:</strong> <?= $customer['id'] ?> <strong> | Customer Name:</strong> <?= htmlspecialchars($customer['name']) ?></p>
            <thead>
              <tr>
                <th>Booking ID</th>
                <th>Flight No.</th>
                <th>Seat No.</th>
                <th>Booking Date</th>
                <th>Total Price (RM)</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if(mysqli_num_rows($booking_result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($booking_result)): ?>
                  <tr>
                    <td><?= $row['booking_id'] ?></td>
                    <td><?= $row['flight_number'] ?></td>
                    <td><?= $row['seat_number'] ?></td>
                    <td><?= date("d-m-Y H:i", strtotime($row['booking_date'])) ?></td>
                    <td><?= number_format($row['total_price'], 2) ?></td>
                    <td><?= $row['booking_status'] ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" style="text-align:center;">No bookings found for this customer.</td>
                </tr>
              <?php endif; ?>
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
