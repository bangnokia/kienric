<?php

include '../fb_init.php';
if (empty($_SESSION['business'])) {
    try {
        // Returns a `Facebook\FacebookResponse` object
        //$response = $fb->get('/me?fields=id,name,adaccounts', $_SESSION['fb_access_token']);
        $response = $fb->get(
            '/me/businesses?fields=id,name,business_users,profile_picture_uri,instagram_accounts{username}',
            $_SESSION['access_token']
        )->getDecodedBody();
//      var_dump($response); die;
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: '.$e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: '.$e->getMessage();
        exit;
    }
    //echo var_dump($response);
    // exit();
    //$user = $response->getDecodedBody();
    //echo var_dump($user['adaccounts']['data'][0]['id']);
    // echo 'here';die;
    //$_SESSION['username'] =  $user['name'];
    //$_SESSION['id'] =  $user['id'];
    //$_SESSION['ad_account_id'] =  $user['adaccounts']['data'][0]['id'];
    $_SESSION['business'] = $response['data'];
}

?>