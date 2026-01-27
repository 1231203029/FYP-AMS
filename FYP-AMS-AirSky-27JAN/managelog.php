<?php
include('auth.php');
// Only Superadmin (role_id = 1) can access
requireSystemRole('superadmin');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superadmin Manage Log | Airline Management System</title>
    <link rel="stylesheet" href="ams_overall_admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        <?php function formatPhone($p) {
        return "+60" . substr($p, 1, 2) . "-" . substr($p, 3);
        }?>
    </script>
</head>
<body>

    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <header>
        <div class="search-box">
            <input type="text" placeholder="Search... (Ctrl+K)">
        </div>
        <?php include('profileheader.php'); ?>
        </header>

        <main>
            <h1>Log</h1>
            <p>Manage log progress.</p>

            <div class="cards">
                <div class="card">
                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>User Type</th>
                                <th>Date + Time</th>
                                <th>Reference</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $result = mysqli_query($connect, "
                                SELECT 
                                    l.id,
                                    l.user_id,
                                    l.usertype,
                                    l.datetime,
                                    CONCAT(l.module, ' #', l.record_id) AS activity_ref,
                                    l.activity
                                FROM log l
                                ORDER BY l.datetime DESC
                            ");
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["user_id"] ?></td>
                                    <td><?= $row["usertype"] ?></td>
                                    <td><?= $row["datetime"] ?></td>
                                    <td><?= $row["activity_ref"] ?></td>
                                    <td><?= $row["activity"] ?></td>
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