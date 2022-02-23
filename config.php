<?php
error_reporting(E_ALL);
if (!session_id()) {
    session_start();
}
ob_start();
$CONGIG = [ 
    "host_name"  => 'localhost',
    "username"  => 'root',
    "password"  => '',
    "database"  => 'kienric',
  ];
//phpinfo(); die;
$star = (object) $CONGIG;
$kunloc = new mysqli($star->host_name, $star->username, $star->password, $star->database);
$kunloc->set_charset('UTF8');
if ($kunloc->connect_error) die('Error : ('. $kunloc->connect_errno .') '. $kunloc->connect_error); 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$WEBSITE_URL = 'https://kienric.test';
$app_ids = 'xxx';
$app_secrets = 'xxx';

$kunloc->query("CREATE TABLE `user_facebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
$kunloc->query("CREATE TABLE `sb_adaccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(255) NOT NULL,
  `adaccount_id` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL,
PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
?>

