<?php

if(empty($_SESSION['pages'])){
    try {
      // Returns a `Facebook\FacebookResponse` object
      
      $response = $fb->get('/'.$_SESSION['fbid'].'/accounts?fields=id,name,picture,cover,link,category,about,fan_count,website,access_token&type=page&limit=1000', $_SESSION['access_token'])->getDecodedBody();
      
      
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    
    $pages = $response['data'];
    $_SESSION['pages'] = $pages;
    $_SESSION['paging'] = $response['paging'];
    
   
}


?>