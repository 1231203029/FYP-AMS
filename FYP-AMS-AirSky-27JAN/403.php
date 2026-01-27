<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 Forbidden | Airline Management System</title>
    <link rel="stylesheet" href="ams_overall_admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .forbidden-container {
            text-align: center;
            background: white;
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 500px;
        }
        .forbidden-container h1 {
            font-size: 100px;
            color: #ff4d4d;
            margin: 0;
        }
        .forbidden-container h2 {
            font-size: 24px;
            margin: 20px 0 10px;
            color: #333;
        }
        .forbidden-container p {
            color: #666;
            margin-bottom: 20px;
        }
        .forbidden-container a {
            display: inline-block;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .forbidden-container a:hover {
            background: #0056b3;
        }
        .icon {
            width: 40px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="forbidden-container">
        <h1>403</h1>
        <h2>Access Forbidden</h2>
        <p>Sorry, you do not have permission to view this page.</p>
        <a href="homepage.php">
            <img src="image/plane1.png" class="icon" alt="Dashboard Icon"> Back to Dashboard
        </a>
    </div>
</body>
</html>
