
<?php 
include 'config.php';
include 'fb_init.php';
require_once 'phpBusinessSDK/vendor/autoload.php';
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

    $sql = "SELECT * FROM `user_facebook` WHERE `id` = '20' ";
            $user_faccebook = $kunloc->query($sql);
            while($data = $user_faccebook->fetch_object())
            {
              //echo $data->fbid;
              $sb_adaccount = $kunloc->query("SELECT * FROM `sb_adaccount` WHERE fb_id = '".$data->fbid."' ");
              while($adaccounts = $sb_adaccount->fetch_object())
              {
                  echo $adaccounts->adaccount_id;
                  $fields = array('name','objective','status','lifetime_budget',);
                  $params = array('effective_status' => array('ACTIVE','PAUSED'));
                   for($i = 0; $i<20; $i++){
                    //foreach($adaccounts as $adaccount){
                        //echo $adaccount_id = $adaccount['adaccount_id'];
                        $camp = new AdAccount($adaccounts->adaccount_id);
                        $camp = $camp->getCampaigns($fields,$params)->getResponse()->getContent();
                        echo var_dump($camp);
                        echo $i;
                    //}
                 }
              }
            }
    
?>