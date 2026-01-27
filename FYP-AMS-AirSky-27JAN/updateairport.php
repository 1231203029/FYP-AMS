<?php
include('auth.php');
// Admin (role_id = 2) and Superadmin (role_id = 1) can access
requireSystemRole('admin');

$errors = [];
$display_image = '';
$image_reselect_notice = '';

/* Prevent undefined variable errors */
$name = $coordinate = $address = $state = $country = '';

// === Load airport data for editing ===
if (isset($_GET['apid'])) {
    $id = $_GET['apid'];

    $query = "SELECT * FROM airport WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $airport = mysqli_fetch_assoc($result);

    if (!$airport) {
        echo "<script>alert('Airport not found!'); window.location='manageairport.php';</script>";
        exit;
    }
    mysqli_stmt_close($stmt);

    $display_image = $airport['image'] ?? '';
} else {
    echo "<script>alert('Invalid access.'); window.location='manageairport.php';</script>";
    exit;
}

if (isset($_POST["updapbtn"])) {

    $id = $_POST["id"];  //needed or not???
    $name = $_POST["name"] ?? '';
    $image = $_POST["image"] ?? '';
    $coordinate = $_POST["coordinate"] ?? '';
    $address = $_POST["address"] ?? '';
    $state = $_POST["state"] ?? '';
    $country = $_POST["country"] ?? '';
    $status = $_POST["status"] ?? '';

    //Validation
    if ($name == '') $errors['name'] = "Insert the name of the airport.";
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
    } else {
        $image_name = $airport['image']; // keep original DB image
    }

    // If errors exist and a new image was selected, revert preview to DB image and show notice
    if (!empty($errors) && $new_image_selected) {
        $display_image = $airport['image']; // revert preview
        $image_reselect_notice = "⚠ You need to reselect the new image.";
    }
    
    // Update DB
    if (empty($errors)) {

        $update_query = "UPDATE airport SET
                        name=?, image=?, coordinate=?, address=?, state=?, country=?, status=?
                        WHERE id=?";

        $stmt = mysqli_prepare($connect, $update_query);

        mysqli_stmt_bind_param(
            $stmt,
            "sssssssi",
            $name, 
            $image,
            $coordinate,
            $address,
            $state,
            $country,
            $status,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Airport updated successfully.'); window.location='manageairport.php';</script>";
            mysqli_stmt_close($stmt);
            exit;
        } else {
            echo "<script>alert('Error updating airport: " . mysqli_error($connect) . "');</script>";
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
    <title>Admin Update Airport | Airline Management System</title>
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
            <a href="manageairport.php"><button>← Return</button></a><br><br>
            <h1>Update Airport Form</h1>
            <p>Update current airport</p>

            <div class="cards">
                <div class="card">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-grid">

                            <label>ID:</label>
                            <div>
                                <input type="text" name="id" value="<?= htmlspecialchars($_POST[''] ?? $airport['id']) ?>" readonly class="locked">
                            </div>

                            <label>Name:</label>
                            <div>
                                <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? $airport['name']) ?>" required>
                                <?php if(isset($errors['name'])): ?><span class="field-error"><?= $errors['name'] ?></span><?php endif; ?>
                            </div>

                            <label>Airport Image:</label>
                            <div>
                                <img id="preview" src="<?= htmlspecialchars($display_image) ?>" <?= empty($display_image) ? 'style="display:none;"' : '' ?>>
                                <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                                <?php if(!empty($image_reselect_notice)): ?>
                                    <span class="reselect-notice"><?= $image_reselect_notice ?></span>
                                <?php endif; ?>
                            </div>

                            <label>Coordinate:</label>
                            <div>
                                <input type="text" name="coordinate" value="<?= htmlspecialchars($_POST['coordinate'] ?? $airport['coordinate']) ?>" required>
                                <?php if(isset($errors['coordinate'])): ?><span class="field-error"><?= $errors['coordinate'] ?></span><?php endif; ?>
                            </div>

                            <label>Address:</label>
                            <div>
                                <input type="text" name="address" value="<?= htmlspecialchars($_POST['address'] ?? $airport['address']) ?>" required>
                                <?php if(isset($errors['address'])): ?><span class="field-error"><?= $errors['address'] ?></span><?php endif; ?>
                            </div>

                            <label>State:</label>
                            <div>
                                <input type="text" name="state" value="<?= htmlspecialchars($_POST['state'] ?? $airport['state']) ?>" required>
                                <?php if(isset($errors['state'])): ?><span class="field-error"><?= $errors['state'] ?></span><?php endif; ?>
                            </div>

                            <label>Country:</label>
                            <div>
                                <input type="text" name="country" value="<?= htmlspecialchars($_POST['country'] ?? $airport['country']) ?>" required>
                                <?php if(isset($errors['country'])): ?><span class="field-error"><?= $errors['country'] ?></span><?php endif; ?>
                            </div>

                            <label>Status:</label>
                            <div>
                                <select name="status" required>
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

                            <div></div>
                            <div class="form-buttons">
                                <button type="submit" class="button" name="updapbtn">Submit</button>
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
        function previewImage(event){
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if(file){
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = "<?= htmlspecialchars($airport['image']) ?>"; // revert to DB image
                preview.style.display = 'block';
            }
        }
    </script>

</body>
</html>