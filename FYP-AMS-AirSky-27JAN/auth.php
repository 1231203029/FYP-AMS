<?php
session_start();
include('dataconnection.php');

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Normalize session values (THE BONUS)
$_SESSION['user_role_id'] = $_SESSION['user_role_id'] ?? 0;
$_SESSION['user_role']    = $_SESSION['user_role'] ?? 'UNKNOWN';
$_SESSION['user_name']    = $_SESSION['user_name'] ?? 'User';
$_SESSION['user_image']   = $_SESSION['user_image'] ?? 'image/default.png';

//Middleware Role page Auth
function requireRole(array $roles) {
    if (!in_array($_SESSION['user_role_id'], $roles)) {
        http_response_code(403);
        include('403.php');
        exit();
    }
}

function requireSystemRole($level, $allowHigher = true) {
    $roleId = $_SESSION['user_role_id'] ?? 0;

    switch ($level) {
        case 'superadmin':
            if ($roleId != 1) deny();
            break;

        case 'admin':
            if (!in_array($roleId, [1,2])) deny();
            break;

        case 'staff':
            if ($roleId < 3 && !$allowHigher) deny(); // only actual staff
            // if $allowHigher = true, Superadmin/Admin can also see
            break;

        default:
            deny();
    }
}

function deny() {
    http_response_code(403);
    include('403.php');
    exit();
}

?>