<?php
$connect = mysqli_connect("localhost", "root", "", "fyp2530-ams");

if ($connect) {
    echo '
    <div class="connection-status success">
        <span class="dot green"></span> Connected successfully
    </div>';
} else {
    echo '
    <div class="connection-status fail">
        <span class="dot red"></span> Connection failed
    </div>';
}
?>



