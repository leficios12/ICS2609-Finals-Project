<?php
session_start();
session_destroy();
header("Location: ../Frontend/Homepage/Homepage.php");
exit();
?>