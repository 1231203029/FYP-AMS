<?php
session_start();
include("dataconnection.php");

// Check if form submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    // Query customer table
    $query = "SELECT * FROM customer WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Check password (if plain text)
        if ($password === $row['password']) {

            // Save session
            $_SESSION['customer_id']    = $row['id'];
            $_SESSION['customer_name']  = $row['name'];
            $_SESSION['customer_email'] = $row['email'];
            $_SESSION['customer_image'] = $row['image']; // correct

            header("Location: homepage.php");
            exit();
        
        } else {
            echo "<script>alert('Incorrect password.'); history.back();</script>";
        }

    } else {
        echo "<script>alert('Email not found.'); history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Login</title>
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
    <h2>Customer Login</h2>

    <form method="POST" action="">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>

    <?php if (!empty($message)) { ?>
        <p class="message <?php echo (strpos($message, 'successful') !== false) ? 'success' : ''; ?>">
            <?php echo $message; ?>
        </p>
    <?php } ?>
</div>

</body>
</html>
