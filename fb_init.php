<?php  
if (!session_id()) {
   session_start();
}
include 'config.php';
include 'php-graph-sdk-5.x/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => $app_ids, // Replace {app-id} with your app id
  'app_secret' => $app_secrets,
  'default_graph_version' => 'v12.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

?>