<?php
function getRecordsMonthWise($data){
    $record_wise_arr = array();
    foreach($data as $record){
                $month = date('F', strtotime(explode('T', $record['end_time'])[0]));
                if(isset($record_wise_arr[$month])){
                    $record_wise_arr[$month]+= $record['value'];
                }
                else{
                    $record_wise_arr[$month] = $record['value'];
                }
            }
    return $record_wise_arr;
}

if(!empty($_GET['id'])){
    $page_id = $_GET['id'];
     $page_info = array();
        $page_parent = array_search($page_id, array_column($_SESSION['pages'], 'id'));
        if($page_parent >= 0){
            
            $page_info = $_SESSION['pages'][$page_parent];
            
        }
        
    try {
      // Returns a `Facebook\FacebookResponse` object
      
      $response = $fb->get($page_id.'/insights/page_views_total?date_preset=this_year&period=day', $page_info['access_token'])->getDecodedBody();
      $page_total_view = getRecordsMonthWise($response['data'][0]['values']);
      
      $response = $fb->get($page_id.'/insights/page_fan_adds?date_preset=this_year&period=day', $page_info['access_token'])->getDecodedBody();
      $page_total_likes = getRecordsMonthWise($response['data'][0]['values']);
      
    //   $response = $fb->get($page_id.'/insights/page_fans_gender_age?date_preset=this_year&period=lifetime', $page_info['access_token'])->getDecodedBody();
    //   $page_total_likes_gender_wise = end($response['data'][0]['values'])['value'];
    //   $response = $fb->get($page_id.'/insights/page_fans_city?date_preset=this_year&period=lifetime', $page_info['access_token'])->getDecodedBody();
    //   $page_total_likes_country_wise = end($response['data'][0]['values'])['value'];
      
    //print_r($response);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    
}
?>