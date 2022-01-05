<?php
// Include FB config file
require_once '../config.php';
require_once '../fb_init.php';
// Remove access token from session
$_SESSION = array();
// Redirect to the homepage
header("Location: $WEBSITE_URL");
?>