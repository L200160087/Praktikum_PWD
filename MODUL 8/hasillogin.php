<?php
session_start();
echo "Anda berhasil login sebagai ".$_SESSION['username']."
dan anda terdaftar sebagai ".$_SESSION['status'];
?>
<br>
Silakan Logout dengan klik link <a href='logout.php'> Disini
</a>