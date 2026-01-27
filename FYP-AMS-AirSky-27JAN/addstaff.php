<?php
include('dataconnection.php');

/* =====ADD STAFF===== */
if (isset($_POST["addstaffbtn"])) {

    $nric        = $_POST["nric"];
    $name        = $_POST["name"];
    $gender      = $_POST["gender"];
    $race        = $_POST["race"];
    $address     = $_POST["address"];
    $state       = $_POST["state"];
    $nationality = $_POST["nationality"];
    $email       = $_POST["email"];
    $phoneNo     = $_POST["phoneNo"];
    $section_id  = $_POST["section"];
    $role_id     = $_POST["role"];
    $status      = $_POST["status"];
    $password    = $_POST["password"];
    $confirm     = $_POST["confirm_password"];

    // default image (no upload logic)
    $image = "image/defaultprofilepic.png";

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match'); history.back();</script>";
        exit;
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO staff (
        nric, name, image, gender, race, address, state, nationality,
        email, password, phoneNo, section_id, role_id, status
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssiss",
        $nric,
        $name,
        $image,
        $gender,
        $race,
        $address,
        $state,
        $nationality,
        $email,
        $hashed,
        $phoneNo,
        $section_id,
        $role_id,
        $status
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Staff added successfully'); window.location='managestaff.php';</script>";
    } else {
        echo "<script>alert('Add failed');</script>";
    }

    mysqli_stmt_close($stmt);
    exit;
}

/* =====LOAD SECTION & ROLE===== */
$sections = mysqli_query($connect, "SELECT * FROM section WHERE id != 1");
$roles    = mysqli_query($connect, "SELECT * FROM role WHERE section_id != 1");

$roles_array = [];
while ($r = mysqli_fetch_assoc($roles)) {
    $roles_array[$r['section_id']][] = $r;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Add Staff | Airline Management System</title>
  <link rel="stylesheet" href="ams_overall_admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <!-- Sidebar -->
  <?php include('sidebar.php'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <div class="search-box">
        <input type="text" placeholder="Search... (Ctrl+K)">
      </div>
      <?php include('profileheader.php'); ?>
    </header>

    <main>
      <a href="managestaff.php"><button>← Return</button></a><br><br>
      <h1>Add Staff Form</h1>
      <p>Add new staff</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-grid">
              <label>NRIC:</label>
              <input type="number" name="nric" required>

              <label>Name:</label>
              <input type="text" name="name" required>

              <label>Image (3.5 x 4.5 cm) or (1.38 x 1.77 in):</label>
              <input type="file" name="image" accept="image/*">

              <!--
              <label>Image (3.5 x 4.5 cm) or (1.38 x 1.77 in):</label>
                <img id="preview" src="" alt="Staff Image Preview" width="120" height="120" style="display:none;"><br>
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

              <label>Gender:</label>
              <div class="radio-group">
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">Female</label>
              </div>

              <label>Race:</label>
              <select name="race" required>
                <option value="" disabled selected>Select Race</option>
                <option value="Malay">Malay</option>
                <option value="Chinese">Chinese</option>
                <option value="Indian">Indian</option>
                <option value="Borneo">Borneo</option>
                <option value="Others">Others</option>
              </select>

              <label>Home Address:</label>
              <textarea name="address" rows="3" required></textarea>

              <label>State:</label>
              <input type="text" name="state" required>

              <label>Nationality:</label>
              <input type="text" name="nationality" required>

              <label>Email:</label>
              <input type="email" name="email" required>

              <label>Password:</label>
              <input type="password" name="password" required>

              <label>Confirm Password:</label>
              <input type="password" name="confirm_password" required>

              <label>Phone No.:</label>
              <input type="tel" name="phoneNo" required>

              <label>Section:</label>
                <select name="section" id="section" required>
                    <option value="" disabled selected>Select Section</option>
                    <?php while ($s = mysqli_fetch_assoc($sections)): ?>
                        <option value="<?= $s['id'] ?>">
                            <?= htmlspecialchars($s['name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>

              <label>Role:</label>
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select Role</option>
                </select>

                <script>
                    const roles = <?= json_encode($roles_array) ?>;
                    const sectionSelect = document.getElementById("section");
                    const roleSelect = document.getElementById("role");

                    sectionSelect.addEventListener("change", () => {
                        const sectionId = sectionSelect.value;
                        roleSelect.innerHTML = '<option value="" disabled selected>Select Role</option>';
                        if (roles[sectionId]) {
                            roles[sectionId].forEach(r => {
                                const opt = document.createElement("option");
                                opt.value = r.id;
                                opt.textContent = r.name;
                                roleSelect.appendChild(opt);
                            });
                        }
                    });
                </script>

              <label>Status:</label>
              <select name="status" required>
                <option value="" disabled selected>Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="On Leave">On Leave</option>
                <option value="Suspended">Suspended</option>
              </select>

              <!-- Buttons row -->
              <div></div> <!-- empty cell for label column -->
              <div class="form-buttons">
                <button type="submit" class="button" name="addstaffbtn">Submit</button>
                <a href="managestaff.php"><button type="button" class="button">Cancel</button></a>
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