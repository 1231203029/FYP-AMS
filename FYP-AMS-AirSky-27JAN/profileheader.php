<?php
// Safety check (optional but recommended)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="profile">
<span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?> ( <?php echo htmlspecialchars($_SESSION['user_role']); ?> ) </span>
<img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" 
    alt="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" 
    class="profile-pic">
</div>