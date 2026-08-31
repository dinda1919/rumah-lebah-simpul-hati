<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
requireLogin();

// logout
session_unset();
session_destroy();
redirect('login.php');
<?php