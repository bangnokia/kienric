<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php
require_once '../phpBusinessSDK/vendor/autoload.php';
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;

use function Couchbase\defaultDecoder;

include 'adAccountSetting.php';
?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'nav.php'; ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header listads">
                                    <table class="table">
                                          <thead class="bg-dark text-white">
                                            <tr>
                                              <th scope="col">ID</th>
                                              <th scope="col">Name</th>
                                              <th scope="col">objective</th>
                                              <th scope="col">status</th>
                                              <th scope="col">lifetime_budget</th>
                                              <th scope="col">Insight</th>
                                            </tr>
                                          </thead>
                                     <tbody class="bg-dark text-white">
<!--                                  --><?php //include 'fake/listads.php'; ?><!-- -->
                                  <?php
                                    $adaccount_id = $_SESSION['adaccounts'][0]['id'];
                                    $fields = array(
                                      'name',
                                      'objective',
                                      'status',
                                      'lifetime_budget',
                                    );
                                    $params = array(
                                        'effective_status' => array('ACTIVE', 'PAUSED'),
//                                      'effective_status' => array('ACTIVE', 'PAUSED', 'DELETED', 'PENDING_REVIEW', 'DISAPPROVED', 'PREAPPROVED', 'PENDING_BILLING_INFO', 'CAMPAIGN_PAUSED', 'ARCHIVED', 'ADSET_PAUSED', 'IN_PROCESS', 'WITH_ISSUES'),
                                    );
                                    $data = new AdAccount($adaccount_id);
                                    $data = $data->getCampaigns($fields,$params)->getLastResponse()->getContent();
//                                    echo "<pre>";
//                                    var_dump($data);
//                                    echo "</pre>"; die;
//                                    echo var_dump($data);
                                    if(isset($data['data'])){
                                    foreach($data['data'] as $d){ ?>
                                            <tr>
                                              <th scope="row"><?= $d['id']?></th>
                                              <td><?= $d['name']?></td>
                                              <td><?= $d['objective']?></td>
                                              <td><?= $d['status']?></td>
                                              <td><?php if(isset($d['lifetime_budget'])){ echo $d['lifetime_budget']; } ?></td>
                                              <td><a class="mds-btn" href="adsinsight.php?cam_id=<?=$d['id'] ?>">insight</a></td>
                                            </tr>
                                      
                                    <?php 
                                     } 
                                     // $ret = $d->updateSelf(array(),array('status' => 'ACTIVE')); // print_r($ret);
                                     }
                                     ?>
                                    
                                    </tbody>
                                 </table>
                                </div>
                               <div class="card-body ">
                                    
                              </div>
                              <div class="card-footer ">
                             </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
<?php include 'footer.php'; ?>