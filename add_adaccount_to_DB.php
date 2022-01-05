
<?php 
    include 'config.php';
    include 'fb_init.php';
    $sql = "SELECT * FROM user_facebook WHERE fbid = '".$_SESSION['fbid']."'";
    $user_facebook = $kunloc->query($sql);
    while($data  = $user_facebook->fetch_object()){
     $response = $fb->get('/'.$data->fbid.'/adaccounts?fields=id,name,adaccounts', $data->access_token)->getDecodedBody();   
     //echo json_encode($response);
     //echo $response['data'][0]['id'];
     if($kunloc->query("SELECT * FROM sb_adaccount WHERE `fb_id` = '".$data->fbid."' ")->num_rows < 1){
       $sb_adaccount = $kunloc->query("INSERT INTO sb_adaccount(fb_id,adaccount_id,sent) VALUES ('".$data->fbid."','".$response['data'][0]['id']."','0') ");
       if($sb_adaccount) echo 'success'; else echo 'error';  
     }else{
         echo 'update';
     }
  
    }
?>