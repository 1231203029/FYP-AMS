<?php
session_start();
include("dataconnection.php");

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($connect, 
        "SELECT a.*, r.name AS role_name 
                FROM admin a 
                LEFT JOIN role r ON a.role_id = r.id 
                WHERE a.email='$email' LIMIT 1"
    );

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $db_pass = $row['password'];

        // 1️⃣ If hashed (bcrypt), use password_verify
        if (password_get_info($db_pass)['algo'] != 0) {

            if (password_verify($password, $db_pass)) {
                // Login success
            } else {
                $error = "Incorrect password.";
            }

        } else {
            // 2️⃣ If NOT hashed (old plaintext), compare directly (TEMPORARY)
            if ($password === $db_pass) {

                // Optionally auto-upgrade to hash:
                // $newHash = password_hash($password, PASSWORD_DEFAULT);
                // mysqli_query($connect, "UPDATE customer SET password='$newHash' WHERE id=".$row['id']);

            } else {
                $error = "Incorrect password.";
            }
        }

        // 3️⃣ Login success — create session
        if (!isset($error)) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id']        = $row['id'];
            $_SESSION['admin_name']      = $row['name'];
            $_SESSION['admin_email']     = $row['email'];
            $_SESSION['admin_image']     = $row['image'];
            $_SESSION['admin_role_id']   = $row['role_id'];
            $_SESSION['admin_role']      = $row['role_name'];

            // Set this flag to show the alert on homepage
            $_SESSION['show_login_message'] = true;

            header("Location: adminhomepage.php");
            exit;
        }

    } else {
        $error = "Email not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
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
            background-color: rgba(0,128,255,0.8);
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
            background-color: rgba(0,100,200,0.9);
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
    <h2>Airline Management System<br>Admin Login</h2>

    <form method="POST" action="">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php if (!empty($message)) { ?>
        <p class="message <?php echo (strpos($message, 'successful') !== false) ? 'success' : ''; ?>">
            <?php echo $message; ?>
        </p>
    <?php } ?>
</div>

</body>
</html>
