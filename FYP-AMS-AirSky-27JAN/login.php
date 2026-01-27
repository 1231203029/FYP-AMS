<?php
session_start();
include("dataconnection.php");

if (isset($_POST['login'])) {

    $email    = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    $row   = null;
    $table = null;

    /* ====TRY SUPERADMIN==== */
    $sql = "SELECT sa.*, r.name AS role_name
            FROM superadmin sa
            LEFT JOIN role r ON sa.role_id = r.id
            WHERE sa.email = '$email'
            LIMIT 1";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row   = mysqli_fetch_assoc($result);
        $table = 'superadmin';
    }

    /* ====TRY ADMIN==== */
    if (!$row) {
        $sql = "SELECT a.*, r.name AS role_name
                FROM admin a
                LEFT JOIN role r ON a.role_id = r.id
                WHERE a.email = '$email'
                LIMIT 1";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row   = mysqli_fetch_assoc($result);
            $table = 'admin';
        }
    }

    /* ====TRY STAFF==== */
    if (!$row) {
        $sql = "SELECT s.*, r.name AS role_name
                FROM staff s
                LEFT JOIN role r ON s.role_id = r.id
                WHERE s.email = '$email'
                LIMIT 1";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row   = mysqli_fetch_assoc($result);
            $table = 'staff';
        }
    }

    /* ====EMAIL NOT FOUND==== */
    if (!$row) {
        $error = "Email not found.";
    } else {

        $db_pass = $row['password'];
        $login_ok = false;

        /* ====HYBRID PASSWORD CHECK==== */

        // Case A: Hashed password
        if (password_get_info($db_pass)['algo'] !== 0) {
            if (password_verify($password, $db_pass)) {
                $login_ok = true;
            }
        }

        // Case B: Plaintext password (auto-upgrade)
        if (!$login_ok && $password === $db_pass) {
            $login_ok = true;

            // Upgrade password to hash
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query(
                $connect,
                "UPDATE $table SET password='$newHash' WHERE id=" . $row['id']
            );
        }

        if (!$login_ok) {
            $error = "Incorrect password.";
        }

        /* ====LOGIN SUCCESS==== */
        if (!isset($error)) {

            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id']        = $row['id'];
            $_SESSION['user_name']      = $row['name'];
            $_SESSION['user_email']     = $row['email'];
            $_SESSION['user_image']     = $row['image'];
            $_SESSION['user_role_id']   = $row['role_id'];
            $_SESSION['user_role']      = $row['role_name'];
            $_SESSION['show_login_message'] = true;

            header("Location: homepage.php");
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Superadmin / Admin / Staff Login</title>

    <link rel="stylesheet" href="ams_overall_admin.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1600&q=80')
                        no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
            width: 360px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 6px;
            background: rgba(0,0,0,0.3);
            color: white;
            font-size: 15px;
        }

        input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        input[type="submit"] {
            background-color: rgba(0,128,255,0.85);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            width: 95%;
            font-weight: bold;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: rgba(0,100,200,0.95);
        }

        .message {
            margin-top: 15px;
            color: #ffdddd;
            font-weight: bold;
        }

        .success {
            color: #90ee90;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>
        Airline Management System<br>
        Superadmin / Admin / Staff Login
    </h2>

    <form method="POST" action="">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>

    <?php if (!empty($error)) { ?>
        <p class="message"><?php echo $error; ?></p>
    <?php } ?>
</div>

</body>
</html>