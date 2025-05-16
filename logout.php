<?php
session_start();
session_destroy();

// start new session to carry logout message
session_start();
$_SESSION['logout_success'] = true;

// redirect to login page
header("Location: login.php");
exit;
