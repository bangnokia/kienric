<?php include '../fb_init.php'; ?>
<?php include 'sessionCheck.php'; ?>
<?php
if(isset($_GET['cam_id'])){
    $cam_id = $_GET['cam_id'];
    if(isset($_GET['status'])){
        if($_GET['status'] == 'PAUSED'){
            $newStatus = 'ACTIVE';
        }else{
            $newStatus = 'PAUSED';
        }
        
        try {
          // Returns a `Facebook\FacebookResponse` object
          
        //   $response = $fb->get('/me?fields=id,name,adaccounts', $_SESSION['fb_access_token']);
          $response = $fb->post('/'.$cam_id, array('status' => $newStatus),$_SESSION['access_token']);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        
    }
    
}else{
    
}
header('Location: listads.php');
// header('Location: adsinsight.php?cam_id-'.$cam_id);


?>