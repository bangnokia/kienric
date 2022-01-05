<?php
include '../config.php';
require_once '../phpBusinessSDK/vendor/autoload.php';
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\Page;
use FacebookAds\Object\PagePost;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;


$app_id = $app_ids;
$app_secret = $app_secrets;
$access_token = $_SESSION['access_token'];

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());



?>