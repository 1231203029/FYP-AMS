<?php
include('dataconnection.php');

$errors = [];   // store field-specific errors

/* Prevent undefined variable errors */
$name = $coordinate = $address = $state = $country = $status = $image_name = '';

/* Track previously uploaded image if needed */
$preview_image = '';

// Add airport
if (isset($_POST["addapbtn"])) {

    $name = $_POST["name"] ?? '';
    $coordinate = $_POST["coordinate"] ?? '';
    $address = $_POST["address"] ?? '';
    $state = $_POST["state"] ?? '';
    $country = $_POST["country"] ?? '';
    $status = $_POST["status"] ?? '';

    //Validation
    if ($name == '') $errors['name'] = "Insert the name of the airport.";
    if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0)
        $errors['image'] = "Insert the image of the airport.";
    if ($coordinate == '') $errors['coordinate'] = "Insert the coordinate of the airport.";
    if ($address == '') $errors['address'] = "Insert the address of the airport.";
    if ($state == '') $errors['state'] = "Insert the state of the airport.";
    if ($country == '') $errors['country'] = "Insert the country of the airport.";
    if ($status == '') $errors['status'] = "Select the status of the airport.";

    // Image (optional)
    $new_image_selected = false;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
        $display_image = $image_name; // temporary preview
        $new_image_selected = true;
    } else {}

    // Insert DB
    if (empty($errors)) {

        $insert_query = "INSERT INTO airport 
            (name, image, coordinate, address, state, country, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($connect, $insert_query);

        mysqli_stmt_bind_param(
            $stmt,
            "sssssss",
            $name, 
            $image_name,
            $coordinate,
            $address,
            $state,
            $country,
            $status
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Airport added successfully.'); window.location='manageairport.php';</script>";
            mysqli_stmt_close($stmt);
            exit;
        } else {
            echo "<script>alert('Error adding airport: " . mysqli_error($connect) . "');</script>";
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
  <title>Admin Add Airport | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a href="manageairport.php"><button>← Return</button></a><br><br>
        <h1>Add Airport Form</h1>
        <p>Add a new airport</p>

        <div class="cards">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-grid">

                        <label>Name:</label>
                        <div>
                            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
                            <?php if(isset($errors['name'])): ?><span class="field-error"><?= $errors['name'] ?></span><?php endif; ?>
                        </div>

                        <label>Airport Image:</label>
                        <div>
                            <img id="preview" style="display:none;">
                            <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                            <?php if(isset($errors['image'])): ?><span class="field-error"><?= $errors['image'] ?></span><?php endif; ?>
                        </div>

                        <!--
                        <label>Airport Image:</label>
                        <img id="preview" src="" alt="Airport Image Preview" width="150" height="120" style="display:none;"><br>
                        <input type="file" name="image" accept="image/*" onchange="previewImage(event)" required>

                        <script>
                        function previewImage(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('preview');
                        if (file) {
                            preview.src = URL.createObjectURL(file);
                            preview.style.display = 'block';
                        }
                        }
                        </script>
                        -->

                        <label>Coordinate:</label>
                        <div>
                            <input type="text" name="coordinate" value="<?= htmlspecialchars($coordinate) ?>">
                            <?php if(isset($errors['coordinate'])): ?><span class="field-error"><?= $errors['coordinate'] ?></span><?php endif; ?>
                        </div>

                        <label>Address:</label>
                        <div>
                            <input type="text" name="address" value="<?= htmlspecialchars($address) ?>">
                            <?php if(isset($errors['address'])): ?><span class="field-error"><?= $errors['address'] ?></span><?php endif; ?>
                        </div>

                        <label>State:</label>
                        <div>
                            <input type="text" name="state" value="<?= htmlspecialchars($state) ?>">
                            <?php if(isset($errors['state'])): ?><span class="field-error"><?= $errors['state'] ?></span><?php endif; ?>
                        </div>

                        <label>Country:</label>
                        <div>
                            <input type="text" name="country" value="<?= htmlspecialchars($country) ?>">
                            <?php if(isset($errors['country'])): ?><span class="field-error"><?= $errors['country'] ?></span><?php endif; ?>
                        </div>

                        <label>Status:</label>
                        <div>
                            <select name="status">
                                <option value="" disabled <?= $status=='' ? 'selected' : '' ?>>Select Status</option>
                                <?php
                                $statuses = ["Operational","Maintenance","Closed"];
                                foreach($statuses as $s) {
                                    $sel = ($status==$s) ? 'selected' : '';
                                    echo "<option value=\"$s\" $sel>$s</option>";
                                }
                                ?>
                            </select>
                            <?php if(isset($errors['status'])): ?><span class="field-error"><?= $errors['status'] ?></span><?php endif; ?>
                        </div>

                        <div></div> <!--Grid alignment-->
                        <div class="form-buttons">
                            <button type="submit" class="button" name="addapbtn">Submit</button>
                            <a href="manageairport.php"><button type="button" class="button">Cancel</button></a>
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