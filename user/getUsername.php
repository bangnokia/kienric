<?php
include '../fb_init.php';
if(empty($_SESSION['username'])){
    try {
    // Returns a `Facebook\FacebookResponse` object
    //$response = $fb->get('/me?fields=id,name,adaccounts', $_SESSION['fb_access_token']);
      $response = $fb->get('/'.$_SESSION['fbid'].'?fields=id,name,adaccounts', $_SESSION['access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    // print_r($response);
    $user = $response->getDecodedBody(); //print_r($user['adaccounts']['data'][0]['id']);// echo 'here';die;
    $_SESSION['username'] =  $user['name'];
    $_SESSION['id'] =  $user['id'];
    $_SESSION['ad_account_id'] =  $user['adaccounts']['data'][0]['id'];
}
?>