<?php
include('auth.php');
requireSystemRole('staff', true);

if (isset($_POST['addflightbtn']) || isset($_POST['savedraftbtn'])) {

    $flight_number      = mysqli_real_escape_string($connect, $_POST['flight_number']);
    $origin_airport     = (int) $_POST['origin_airport_id'];
    $destination_airport= (int) $_POST['destination_airport_id'];
    $departure_time     = $_POST['departure_time'];
    $arrival_time       = $_POST['arrival_time'];
    $aircraft_id        = (int) $_POST['aircraft_id'];

    // Status: Scheduled if 'Create Flight', Draft if 'Save Draft'
    $status = isset($_POST['savedraftbtn']) ? 'Draft' : mysqli_real_escape_string($connect, $_POST['status']);
    isset($_POST['addflightbtn']) ? 'Scheduled':

    $insert_query = "INSERT INTO flight 
            (flight_number, origin_airport_id, destination_airport_id, departure_time, arrival_time, aircraft_id, status)
            VALUES 
            ('$flight_number', $origin_airport, $destination_airport, '$departure_time', '$arrival_time', $aircraft_id, '$status')";

    if (mysqli_query($connect, $insert_query)) {
        $msg = isset($_POST['savedraftbtn']) ? 'Flight saved as draft!' : 'Flight created successfully!';
        echo "<script>alert('$msg'); window.location='manageflight.php';</script>";
        exit;
    } else {
        $error = "Error: " . mysqli_error($connect);
    }
}

// Dropdowns
$airports = mysqli_query($connect, "SELECT id, name FROM airport ORDER BY name");
$aircrafts = mysqli_query($connect, "SELECT id, model FROM aircraft ORDER BY model");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Flight | Airline Management System</title>
    <link rel="stylesheet" href="ams_overall_admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Error message styling */
        .field-error {
            color: #d9534f;
            font-size: 13px;
            margin-top: 2px;
            display: block;
        }

        /* Image preview styling */
        #preview {
            width: 240px;
            height: 240px;
            margin-top:5px;
            margin-bottom:5px;
        }

        /* Form spacing overrides inside grid */
        .form-grid input,
        .form-grid select,
        .form-grid textarea {
            width: 70%;
        }
        .form-grid label {
            padding-top: 6px;
        }
    </style>
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
        <a href="manageflight.php"><button>← Return</button></a><br><br>
        <h1>Create Flight Form</h1>
        <p>Add a new flight</p>

        <!--?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?-->
        <div class="cards">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-grid">

                        <label>Flight Number</label>
                        <div>
                            <input type="text" name="flight_number" required placeholder="e.g., MH123">
                            <?php if(isset($errors['flight_number'])): ?><span class="field-error"><?= $errors['flight_number'] ?></span><?php endif; ?>
                        </div>

                        <label>Origin Airport</label>
                        <div>
                            <select name="origin_airport_id" required>
                                <option value="">Select origin</option>
                                <?php while($row = mysqli_fetch_assoc($airports)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($errors['origin_airport_id'])): ?><span class="field-error"><?= $errors['origin_airport_id'] ?></span><?php endif; ?>
                        </div>

                        <label>Destination Airport</label>
                        <div>
                            <select name="destination_airport_id" required>
                                <option value="">Select destination</option>
                                <?php
                                // Reset pointer to re-use result
                                mysqli_data_seek($airports, 0);
                                while($row = mysqli_fetch_assoc($airports)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($errors['destination_airport_id'])): ?><span class="field-error"><?= $errors['destination_airport_id'] ?></span><?php endif; ?>
                        </div>

                        <label>Departure Time</label>
                        <div>
                            <input type="datetime-local" name="departure_time" required>
                            <?php if(isset($errors['departure_time'])): ?><span class="field-error"><?= $errors['departure_time'] ?></span><?php endif; ?>
                        </div>

                        <label>Arrival Time</label>
                        <div>
                            <input type="datetime-local" name="arrival_time" required>
                            <?php if(isset($errors['arrival_time'])): ?><span class="field-error"><?= $errors['arrival_time'] ?></span><?php endif; ?>
                        </div>

                        <label>Aircraft</label>
                        <div>
                            <select name="aircraft_id" required>
                                <option value="">Select aircraft</option>
                                <?php while($row = mysqli_fetch_assoc($aircrafts)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['model']) ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($errors['aircraft_id'])): ?><span class="field-error"><?= $errors['aircraft_id'] ?></span><?php endif; ?>
                        </div>

                        <!--label>Status</label>
                        <div>
                            <select name="status" required>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Delayed">Delayed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <?php if(isset($errors['status'])): ?><span class="field-error"><?= $errors['status'] ?></span><?php endif; ?>
                        </div-->

                        <!--div style="display:flex; gap:10px;">
                            <button type="submit" name="create_flight">Create Flight</button>
                            <button type="submit" name="save_draft">Save as Draft</button>
                            <a href="manageflight.php"><button type="button" style="background:#ccc; color:#000;">Cancel/Return</button></a>
                        </div-->

                        <div></div> <!--Grid alignment-->
                        <div class="form-buttons">
                            <button type="submit" class="button" name="addflightbtn">Submit</button>
                            <button type="submit" class="button" name="savedraftbtn">Save as Draft</button>
                            <a href="manageflight.php"><button type="button" class="button">Cancel</button></a>
                        </div>

                    </div>
                </form>
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