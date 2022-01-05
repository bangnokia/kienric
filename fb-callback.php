<?php include 'config.php' ?>
<?php include 'fb_init.php' ?>
<?php 
try {
 echo  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$oAuth2Client = $fb->getOAuth2Client();
$accessToken    = $oAuth2Client->getLongLivedAccessToken($accessToken);
$response       = $fb->get("/me?fields=id, name, first_name, last_name, email, picture.type(large)", $accessToken);
$userData       = $response->getGraphNode()->asArray();

//-----------------------------
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
$tokenMetadata->validateAppId($app_ids);
$tokenMetadata->validateExpiration();
//--------------------------------/
$_SESSION['fbid'] = $userData['id'];
$_SESSION['name'] = $userData['name'];
//$_SESSION['username'] = $userData['name'];
$_SESSION['access_token'] = (string) $accessToken;

$sql = "SELECT * FROM user_facebook WHERE fbid = '".$userData['id']."' ";
$checked = $kunloc->query($sql);
if($checked->num_rows)
{
  $UPDATE = $kunloc->query("UPDATE user_facebook SET access_token = '$accessToken' WHERE fbid = '".$userData['id']."'");
  if($UPDATE) echo 'Your are login facebook'; else echo 'Your are not login';
}
else{
 $INSERT = $kunloc->query("INSERT INTO user_facebook (fbid,username,access_token)
 VALUES ('".$userData['id']."','".$userData['name']."','$accessToken') "); 
 if($INSERT) echo 'Your are login facebook'; else echo 'Your are not login';
}
header("Location: /user/index.php");
?>