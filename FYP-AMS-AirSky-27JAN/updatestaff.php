<?php
include('auth.php');
// Admin (role_id = 2) and Superadmin (role_id = 1) can access
requireSystemRole('admin');

/* =====LOAD STAFF===== */
if (!isset($_GET['stfid'])) {
    header("Location: managestaff.php");
    exit;
}

$id = (int) $_GET['stfid'];

$stmt = mysqli_prepare($connect, "SELECT * FROM staff WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$staff = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$staff) {
    echo "<script>alert('Staff not found'); window.location='managestaff.php';</script>";
    exit;
}

/* =====UPDATE STAFF===== */
if (isset($_POST['updstaffbtn'])) {

    // POST values that ACTUALLY exist
    $section_id = $_POST['section'];
    $role_id    = $_POST['role'];
    $status     = $_POST['status'];

    // DB values (disabled inputs)
    $nric        = $staff['nric'];
    $name        = $staff['name'];
    $image       = $staff['image'];
    $gender      = $staff['gender'];
    $race        = $staff['race'];
    $address     = $staff['address'];
    $state       = $staff['state'];
    $nationality = $staff['nationality'];
    $phoneNo     = $staff['phoneNo'];

    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    /* ===== PASSWORD CHANGE ===== */
    if (!empty($password) || !empty($confirm_password)) {

        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match'); history.back();</script>";
            exit;
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE staff SET
            nric=?, name=?, image=?, gender=?, race=?, address=?, state=?, nationality=?,
            password=?, phoneNo=?, section_id=?, role_id=?, status=?
            WHERE id=?";

        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssssissi",
            $nric,
            $name,
            $image,
            $gender,
            $race,
            $address,
            $state,
            $nationality,
            $hashed,
            $phoneNo,
            $section_id,
            $role_id,
            $status,
            $id
        );

    } else {

        // NO password change
        $sql = "UPDATE staff SET
            nric=?, name=?, image=?, gender=?, race=?, address=?, state=?, nationality=?,
            phoneNo=?, section_id=?, role_id=?, status=?
            WHERE id=?";

        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssssssi",
            $nric,
            $name,
            $image,
            $gender,
            $race,
            $address,
            $state,
            $nationality,
            $phoneNo,
            $section_id,
            $role_id,
            $status,
            $id
        );
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Staff updated successfully'); window.location='managestaff.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }

    mysqli_stmt_close($stmt);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Update Staff | Airline Management System</title>
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
      <h1>Update Staff Form</h1>
      <p>Edit or reassign staff roles.</p>

      <div class="cards">
        <div class="card">
          <form action="" method="post">
            <div class="form-grid">
              <label>ID:</label>
              <input type="number" name="id" value="<?= htmlspecialchars($staff['id']) ?>" readonly class="locked">

              <!--label>NRIC:</label>
              <input type="text" name="nric" value="<?= htmlspecialchars($staff['nric']) ?>" readonly class="locked"-->

              <label>Name:</label>
              <input type="text" name="name" value="<?= htmlspecialchars($staff['name']) ?>" readonly class="locked">

              <!--label>Staff Image:</label>
              <input type="file" name="image" value="<?= htmlspecialchars($staff['image']) ?>" accept="image/*" disabled class="locked">

              <!--
              <label>Staff Image:</label>
                ?php if (!empty($staff['image'])): ?>
                    <img id="preview" src="?= htmlspecialchars($staff['image']) ?>" alt="Staff Image" width="120" height="120">
                ?php else: ?>
                    <img id="preview" src="" alt="No Image" width="120" height="120" style="display:none;">
                ?php endif; ?>
                    <br>
              <input type="file" name="image" accept="image/*" onchange="previewImage(event)">

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
              

              <label>Gender:</label>
              <div class="locked">
                <input type="radio" id="male" name="gender" value="Male" <?= $staff['gender']=='Male'?'checked':'' ?> disabled>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" <?= $staff['gender']=='Female'?'checked':'' ?> disabled>
                <label for="female">Female</label>
              </div>

              <label>Race:</label>
              <select name="race" class="locked" disabled>
                <option value="" disabled selected>Select Race</option>
                <option value="Malay" <?= $staff['race']=='Malay'?'selected':'' ?>>Malay</option>
                <option value="Chinese" <?= $staff['race']=='Chinese'?'selected':'' ?>>Chinese</option>
                <option value="Indian" <?= $staff['race']=='Indian'?'selected':'' ?>>Indian</option>
                <option value="Borneo" <?= $staff['race']=='Borneo'?'selected':'' ?>>Borneo</option>
                <option value="Others" <?= $staff['race']=='Others'?'selected':'' ?>>Others</option>
              </select>

              <label>Home Address:</label>
              <textarea name="address" rows="3" class="locked" readonly><?= htmlspecialchars($staff['address']) ?></textarea>

              <label>State:</label>
              <input type="text" name="state" value="<?= htmlspecialchars($staff['state']) ?>" readonly class="locked">

              <label>Nationality:</label>
              <input type="text" name="nationality" value="<?= htmlspecialchars($staff['nationality']) ?>" readonly class="locked">

              <label>Email:</label>
              <input type="email" name="email" value="<?= htmlspecialchars($staff['email']) ?>" readonly class="locked">

              <label>Phone No.:</label>
              <input type="tel" name="phoneNo" value="<?= htmlspecialchars($staff['phoneNo']) ?>" readonly class="locked">

              <label>Password:</label>
              <input type="password" name="password" readonly class="locked">

              <label>Confirm Password:</label>
              <input type="password" name="confirm_password" readonly class="locked">

              -->

              <?php
              // Load sections and roles from DB
              $sections = mysqli_query($connect, "SELECT * FROM section WHERE id != 1");
              $roles = mysqli_query($connect, "SELECT * FROM role WHERE section_id != 1");
              $roles_array = [];
              while ($r = mysqli_fetch_assoc($roles)) {
                  $roles_array[$r['section_id']][] = $r;
              }

              $staff_section_id = $staff['section_id'] ?? 0;
              $staff_role_id = $staff['role_id'] ?? 0;
              ?>

              <label>Section:</label>
              <select name="section" id="section" required>
                  <option value="" disabled <?= $staff_section_id == 0 ? 'selected' : '' ?>>Select Section</option>
                  <?php while($s = mysqli_fetch_assoc($sections)): ?>
                      <option value="<?= $s['id'] ?>" <?= $staff_section_id == $s['id'] ? 'selected' : '' ?>>
                          <?= htmlspecialchars($s['name']) ?>
                      </option>
                  <?php endwhile; ?>
              </select>

              <label>Role:</label>
              <select name="role" id="role" required>
                  <option value="" disabled>Select Role</option>
                  <?php
                  if ($staff_section_id && isset($roles_array[$staff_section_id])) {
                      foreach ($roles_array[$staff_section_id] as $r) {
                          $selected = ($staff_role_id == $r['id']) ? 'selected' : '';
                          echo "<option value='{$r['id']}' $selected>{$r['name']}</option>";
                      }
                  }
                  ?>
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
                              const option = document.createElement("option");
                              option.value = r.id;
                              option.textContent = r.name;
                              roleSelect.appendChild(option);
                          });
                      }
                  });
              </script>

              <label>Status:</label>
              <select name="status" required>
                <option value="Active" <?= $staff['status']=='Active'?'selected':'' ?>>Active</option>
                <option value="Inactive" <?= $staff['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                <option value="On Leave" <?= $staff['status']=='On Leave'?'selected':'' ?>>On Leave</option>
                <option value="Suspended" <?= $staff['status']=='Suspended'?'selected':'' ?>>Suspended</option>
              </select>

              <!-- Buttons row -->
              <div></div>
              <div class="form-buttons">
                <button type="submit" class="button" name="updstaffbtn">Update Staff</button>
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