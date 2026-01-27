<?php
include('dataconnection.php');

$errors = [];   // store field-specific errors

/* Prevent undefined variable errors */
$model = $company = $country = $cost_myr = $type =
$quantity = $horsepower_hp = $fuel_tank_litre = $total_seats = $image_name = '';

/* Track previously uploaded image if needed */
$preview_image = '';

// Add aircraft
if (isset($_POST["addacbtn"])) {

    $model = $_POST["model"] ?? '';
    $company = $_POST["company"] ?? '';
    $country = $_POST["country"] ?? '';
    $cost_myr = $_POST["cost_myr"] ?? '';
    $type = $_POST["type"] ?? '';
    $quantity = $_POST["quantity"] ?? '';
    $horsepower_hp = $_POST["horsepower_hp"] ?? '';
    $fuel_tank_litre = $_POST["fuel_tank_litre"] ?? '';
    $total_seats = $_POST["total_seats"] ?? '';

    // ---------- VALIDATION ----------
    if ($model == '') $errors['model'] = "Insert the model name of the aircraft.";
    if ($company == '') $errors['company'] = "Insert the company name of the aircraft.";
    if ($country == '') $errors['country'] = "Insert the country name of the aircraft.";
    if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0)
        $errors['image'] = "Insert the image of the aircraft.";
    if ($cost_myr == '') $errors['cost_myr'] = "Insert the cost of the aircraft.";
    else if ($cost_myr < 1) $errors['cost_myr'] = "Insert a positive number.";
    if ($type == '') $errors['type'] = "Select the type of the aircraft.";
    if ($quantity == '') $errors['quantity'] = "Insert the quantity of the aircraft.";
    else if ($quantity < 1) $errors['quantity'] = "Insert a positive number.";
    if ($horsepower_hp == '') $errors['horsepower_hp'] = "Insert the horsepower of the aircraft.";
    else if ($horsepower_hp < 1) $errors['horsepower_hp'] = "Insert a positive number.";
    if ($fuel_tank_litre == '') $errors['fuel_tank_litre'] = "Insert the fuel tank capacity.";
    else if($fuel_tank_litre < 1) $errors['fuel_tank_litre'] = "Insert a positive number." ;
    if ($total_seats == '') $errors['total_seats'] = "Insert the total seats of the aircraft.";
    else if($total_seats < 1) $errors['total_seats'] = "Insert a positive number." ;

    // ---------- INSERT ----------
    if (empty($errors)) {
        $image_name = $_FILES['image']['name'];

        $insert_query = "INSERT INTO aircraft 
            (model, company, country, image, cost_myr, type, quantity, horsepower_hp, fuel_tank_litre, total_seats)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($connect, $insert_query);

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssss",
            $model,
            $company,
            $country,
            $image_name,
            $cost_myr,
            $type,
            $quantity,
            $horsepower_hp,
            $fuel_tank_litre,
            $total_seats
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Aircraft added successfully.'); window.location='manageaircraft.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error adding aircraft.');</script>";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Add Aircraft | Airline Management System</title>
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
        <a href="manageaircraft.php"><button>← Return</button></a><br><br>
        <h1>Add Aircraft Form</h1>
        <p>Add a new aircraft</p>

        <div class="cards">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-grid">

                        <label>Model:</label>
                        <div>
                            <input type="text" name="model" value="<?= htmlspecialchars($model) ?>">
                            <?php if(isset($errors['model'])): ?><span class="field-error"><?= $errors['model'] ?></span><?php endif; ?>
                        </div>

                        <label>Company:</label>
                        <div>
                            <input type="text" name="company" value="<?= htmlspecialchars($company) ?>">
                            <?php if(isset($errors['company'])): ?><span class="field-error"><?= $errors['company'] ?></span><?php endif; ?>
                        </div>

                        <label>Country:</label>
                        <div>
                            <input type="text" name="country" value="<?= htmlspecialchars($country) ?>">
                            <?php if(isset($errors['country'])): ?><span class="field-error"><?= $errors['country'] ?></span><?php endif; ?>
                        </div>

                        <label>Aircraft Image:</label>
                        <div>
                            <img id="preview" style="display:none;">
                            <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                            <?php if(isset($errors['image'])): ?><span class="field-error"><?= $errors['image'] ?></span><?php endif; ?>
                        </div>

                        <label>Cost (MYR):</label>
                        <div>
                            <input type="number" name="cost_myr" value="<?= htmlspecialchars($cost_myr) ?>">
                            <?php if(isset($errors['cost_myr'])): ?><span class="field-error"><?= $errors['cost_myr'] ?></span><?php endif; ?>
                        </div>

                        <label>Type:</label>
                        <div>
                            <select name="type">
                                <option value="" disabled selected>Select Type</option>
                                <?php
                                $types = ["Passenger Jet","Turboprop","Wide-body Jet","Light Aircraft","Business Jet","Regional Jet","Super Jumbo Jet"];
                                foreach($types as $t) {
                                    $sel = ($type==$t) ? 'selected' : '';
                                    echo "<option value=\"$t\" $sel>$t</option>";
                                }
                                ?>
                            </select>
                            <?php if(isset($errors['type'])): ?><span class="field-error"><?= $errors['type'] ?></span><?php endif; ?>
                        </div>

                        <label>Quantity:</label>
                        <div>
                            <input type="number" name="quantity" value="<?= htmlspecialchars($quantity) ?>">
                            <?php if(isset($errors['quantity'])): ?><span class="field-error"><?= $errors['quantity'] ?></span><?php endif; ?>
                        </div>

                        <label>Horsepower (hp):</label>
                        <div>
                            <input type="number" name="horsepower_hp" value="<?= htmlspecialchars($horsepower_hp) ?>">
                            <?php if(isset($errors['horsepower_hp'])): ?><span class="field-error"><?= $errors['horsepower_hp'] ?></span><?php endif; ?>
                        </div>

                        <label>Fuel Tank (litre):</label>
                        <div>
                            <input type="number" name="fuel_tank_litre" value="<?= htmlspecialchars($fuel_tank_litre) ?>">
                            <?php if(isset($errors['fuel_tank_litre'])): ?><span class="field-error"><?= $errors['fuel_tank_litre'] ?></span><?php endif; ?>
                        </div>

                        <label>Total Seats:</label>
                        <div>
                            <input type="number" name="total_seats" value="<?= htmlspecialchars($total_seats) ?>">
                            <?php if(isset($errors['total_seats'])): ?><span class="field-error"><?= $errors['total_seats'] ?></span><?php endif; ?>
                        </div>

                        <div></div> <!--Grid alignment-->
                        <div class="form-buttons">
                            <button type="submit" class="button" name="addacbtn">Submit</button>
                            <a href="manageaircraft.php"><button type="button" class="button">Cancel</button></a>
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

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }
    </script>

</body>
</html>