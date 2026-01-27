<?php
include('auth.php');
// Admin (role_id = 2) and Superadmin (role_id = 1) can access
requireSystemRole('admin');

$errors = [];
$display_image = '';
$image_reselect_notice = '';

if (isset($_GET['acid'])) {
    $id = $_GET['acid'];

    $query = "SELECT * FROM aircraft WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $aircraft = mysqli_fetch_assoc($result);

    if (!$aircraft) {
        echo "<script>alert('Aircraft not found!'); window.location='manageaircraft.php';</script>";
        exit;
    }
    mysqli_stmt_close($stmt);

    $display_image = $aircraft['image'] ?? '';
} else {
    echo "<script>alert('Invalid access.'); window.location='manageaircraft.php';</script>";
    exit;
}

if (isset($_POST["updacbtn"])) {

    $id = $_POST["id"];
    $model = $_POST["model"] ?? '';
    $company = $_POST["company"] ?? '';
    $country = $_POST["country"] ?? '';
    $cost_myr = $_POST["cost_myr"] ?? '';
    $type = $_POST["type"] ?? '';
    $quantity = $_POST["quantity"] ?? '';
    $horsepower_hp = $_POST["horsepower_hp"] ?? '';
    $fuel_tank_litre = $_POST["fuel_tank_litre"] ?? '';
    $total_seats = $_POST["total_seats"] ?? '';

    // Input Validation
    if ($model == '') $errors['model'] = "Insert the model name of the aircraft.";
    if ($company == '') $errors['company'] = "Insert the company name of the aircraft.";
    if ($country == '') $errors['country'] = "Insert the country name of the aircraft.";
    /*if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0)
        $errors['image'] = "Insert the image of the aircraft.";*/
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

    // Image (optional)
    $new_image_selected = false;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
        $display_image = $image_name; // temporary preview
        $new_image_selected = true;
    } else {
        $image_name = $aircraft['image']; // keep original DB image
    }

    // If errors exist and a new image was selected, revert preview to DB image and show notice
    if (!empty($errors) && $new_image_selected) {
        $display_image = $aircraft['image']; // revert preview
        $image_reselect_notice = "⚠ You need to reselect the new image.";
    }

    //25/12/2025
    //$model = $company = $country = $cost_myr = $type =
    //$quantity = $horsepower_hp = $fuel_tank_litre = $total_seat
    //echo"·".$aircraft['']." → ".$
    
    //25/12/2025
    //DB change for log messages
    $logmessage = "";
    $logconfirm = false;

    function addLog(&$msg, $label, $old, $new) {
        if ($old != $new) {
            $msg .= "· $label: $old → $new\n";
            return true;
        }
        return false;
    }

    $changed = false;

    $changed |= addLog($logmessage, "Model", $aircraft['model'], $model);
    $changed |= addLog($logmessage, "Company", $aircraft['company'], $company);
    $changed |= addLog($logmessage, "Country", $aircraft['country'], $country);
    $changed |= addLog($logmessage, "Image", $aircraft['image'], $image_name);
    $changed |= addLog($logmessage, "Cost (MYR)", $aircraft['cost_myr'], $cost_myr);
    $changed |= addLog($logmessage, "Type", $aircraft['type'], $type);
    $changed |= addLog($logmessage, "Quantity", $aircraft['quantity'], $quantity);
    $changed |= addLog($logmessage, "Horsepower", $aircraft['horsepower_hp'], $horsepower_hp);
    $changed |= addLog($logmessage, "Fuel Tank", $aircraft['fuel_tank_litre'], $fuel_tank_litre);
    $changed |= addLog($logmessage, "Total Seats", $aircraft['total_seats'], $total_seats);

    if ($changed) {
        $logconfirm = true;
        $logmessage = "Aircraft ID $id updated:\n" . $logmessage;
    }

    // Update DB
    if (empty($errors)) {

        $update_query = "UPDATE aircraft SET
            model=?, company=?, country=?, image=?, cost_myr=?, type=?,
            quantity=?, horsepower_hp=?, fuel_tank_litre=?, total_seats=?
            WHERE id=?";

        $stmt = mysqli_prepare($connect, $update_query);

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssssi",
            $model,
            $company,
            $country,
            $image_name,
            $cost_myr,
            $type,
            $quantity,
            $horsepower_hp,
            $fuel_tank_litre,
            $total_seats,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            if ($logconfirm) {

                $insertLog = "INSERT INTO log (user_id, usertype, module, record_id, activity)
                            VALUES (?, ?, 'Aircraft', ?, ?)";

                $stmtLog = mysqli_prepare($connect, $insertLog);

                $userId = $_SESSION['user_role_id'] ?? 0;           // fallback ID (safe)
                $userType = $_SESSION['user_role'] ?? 'UNKNOWN';    // Superadmin / Admin / Staff

                mysqli_stmt_bind_param(
                    $stmtLog,
                    "isis",
                    $userId,
                    $userType,
                    $id,
                    $logmessage
                );
                mysqli_stmt_execute($stmtLog);
                mysqli_stmt_close($stmtLog);
            }
            echo "<script>alert('Aircraft updated successfully.'); window.location='manageaircraft.php';</script>";
            mysqli_stmt_close($stmt);
            exit;
        } else {
            echo "<script>alert('Error updating aircraft.');</script>";
        }

        mysqli_stmt_close($stmt);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Update Aircraft | Airline Management System</title>
    <link rel="stylesheet" href="ams_overall_admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .field-error {
            color: #d9534f;
            font-size: 13px;
            display: block;
            margin-top: 2px;
        }

        .reselect-notice {
            color: #e67e22;
            font-size: 13px;
            margin-top: 3px;
            display: block;
        }

        #preview {
            width: 240px;
            height: 240px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
        }

        .form-grid label {
            padding-top: 6px;
        }

        .form-grid input,
        .form-grid select,
        .form-grid textarea {
            width: 70%;
        }

        .form-grid input[type="file"] {
            display: block;
            margin-top: 5px;
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
        <h1>Update Aircraft Form</h1>
        <p>Update aircraft information</p>

        <div class="cards">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($aircraft['id']) ?>">
                    <div class="form-grid">

                        <label>ID:</label>
                        <div>
                            <input type="text" name="id" value="<?= htmlspecialchars($_POST[''] ?? $aircraft['id']) ?>" readonly class="locked">
                        </div>

                        <label>Model:</label>
                        <div>
                            <input type="text" name="model" value="<?= htmlspecialchars($_POST['model'] ?? $aircraft['model']) ?>">
                            <?php if(isset($errors['model'])): ?><span class="field-error"><?= $errors['model'] ?></span><?php endif; ?>
                        </div>

                        <label>Company:</label>
                        <div>
                            <input type="text" name="company" value="<?= htmlspecialchars($_POST['company'] ?? $aircraft['company']) ?>">
                            <?php if(isset($errors['company'])): ?><span class="field-error"><?= $errors['company'] ?></span><?php endif; ?>
                        </div>

                        <label>Country:</label>
                        <div>
                            <input type="text" name="country" value="<?= htmlspecialchars($_POST['country'] ?? $aircraft['country']) ?>">
                            <?php if(isset($errors['country'])): ?><span class="field-error"><?= $errors['country'] ?></span><?php endif; ?>
                        </div>

                        <label>Aircraft Image:</label>
                        <div>
                            <img id="preview" src="<?= htmlspecialchars($display_image) ?>" <?= empty($display_image) ? 'style="display:none;"' : '' ?>>
                            <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                            <?php if(!empty($image_reselect_notice)): ?>
                                <span class="reselect-notice"><?= $image_reselect_notice ?></span>
                            <?php endif; ?>
                        </div>

                        <label>Cost (MYR):</label>
                        <div>
                            <input type="number" name="cost_myr" value="<?= htmlspecialchars($_POST['cost_myr'] ?? $aircraft['cost_myr']) ?>">
                            <?php if(isset($errors['cost_myr'])): ?><span class="field-error"><?= $errors['cost_myr'] ?></span><?php endif; ?>
                        </div>

                        <label>Type:</label>
                        <div>
                            <select name="type">
                                <option value="" disabled <?= $type=='' ? 'selected' : '' ?>>Select Type</option>
                                <?php
                                    $types = ["Passenger Jet","Turboprop","Wide-body Jet","Light Aircraft","Business Jet","Regional Jet","Super Jumbo Jet"];
                                    foreach($types as $t){
                                        $sel = (($_POST['type'] ?? $aircraft['type']) == $t) ? 'selected' : '';
                                        echo "<option value=\"$t\" $sel>$t</option>";
                                    }
                                ?>
                            </select>
                            <?php if(isset($errors['type'])): ?><span class="field-error"><?= $errors['type'] ?></span><?php endif; ?>
                        </div>

                        <label>Quantity:</label>
                        <div>
                            <input type="number" name="quantity" value="<?= htmlspecialchars($_POST['quantity'] ?? $aircraft['quantity']) ?>">
                            <?php if(isset($errors['quantity'])): ?><span class="field-error"><?= $errors['quantity'] ?></span><?php endif; ?>
                        </div>

                        <label>Horsepower (hp):</label>
                        <div>
                            <input type="number" name="horsepower_hp" value="<?= htmlspecialchars($_POST['horsepower_hp'] ?? $aircraft['horsepower_hp']) ?>">
                            <?php if(isset($errors['horsepower_hp'])): ?><span class="field-error"><?= $errors['horsepower_hp'] ?></span><?php endif; ?>
                        </div>

                        <label>Fuel Tank (litre):</label>
                        <div>
                            <input type="number" name="fuel_tank_litre" value="<?= htmlspecialchars($_POST['fuel_tank_litre'] ?? $aircraft['fuel_tank_litre']) ?>">
                            <?php if(isset($errors['fuel_tank_litre'])): ?><span class="field-error"><?= $errors['fuel_tank_litre'] ?></span><?php endif; ?>
                        </div>

                        <label>Total Seats:</label>
                        <div>
                            <input type="number" name="total_seats" value="<?= htmlspecialchars($_POST['total_seats'] ?? $aircraft['total_seats']) ?>">
                            <?php if(isset($errors['total_seats'])): ?><span class="field-error"><?= $errors['total_seats'] ?></span><?php endif; ?>
                        </div>

                        <div></div>
                        <div class="form-buttons">
                            <button type="submit" class="button" name="updacbtn">Update</button>
                            <a href="manageaircraft.php"><button type="button" class="button">Cancel</button></a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 Airline Management System | Admin Panel
        <img src="image/malaysia.png" class="icon">
    </footer>

</div>

<script>
    function previewImage(event){
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        if(file){
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = "<?= htmlspecialchars($aircraft['image']) ?>"; // revert to DB image
            preview.style.display = 'block';
        }
    }
</script>

</body>
</html>
