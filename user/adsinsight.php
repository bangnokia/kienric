<?php include 'header.php' ?>
        <?php include 'sidebar.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'nav.php'; ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card adsights">
                                <div class="card-header ">
                                    <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    require_once '../phpBusinessSDK/vendor/autoload.php';
                                    use FacebookAds\Object\AdAccount;
                                    use FacebookAds\Object\Campaign;
                                    if(!isset($_GET['cam_id'])){
                                        header('Location: listads.php');
                                    }else{
                                    $cam_id = $_GET['cam_id'];
                                    include 'adAccountSetting.php';
                                    $adaccount_id = $_SESSION['adaccounts'][0]['id'];
                                    // echo $adaccount_id;
                                    $fields = array(
                                      'name',
                                      'objective',
                                      'status',
                                      'lifetime_budget',
                                      'link_url_asset',
                                      'cost_per_action_type',
                                      'cost_per_action_result'
                                    );
                                    $params = array(
                                      'effective_status' => array('ACTIVE','PAUSED'),
                                    );
                                    
                                    $data = new AdAccount($adaccount_id);
                                    $data = $data->getCampaigns($fields,$params)->getResponse()->getContent();
                                    //  echo '<pre>';
                                    //     print_r($data);
                                    //     echo '</pre>';
                                    $stat="";
                                    foreach($data['data'] as $d){
                                        // echo $d['id'];
                                        if($d['id'] == $cam_id){
                                        $campaign = new Campaign($d['id']);
                                        $insights = $campaign->getInsights();
                                        // $insights = $insights->getObjects();
                                        //  echo '<pre>';
                                        // print_r($insights);
                                        // echo '</pre>';
                                        $stat = $d['status'];
                                        if(isset($insights[0])){
                                            $insights = $insights[0];
                                            $insights = $insights->getData();
                                        
                                        // $insights = $insights[0];
                                        // $insights = $insights->getData();
                                        // echo '<pre>';
                                        // print_r($insights);
                                        // echo '</pre>';
                                        // echo 'yes';
                                    ?>
                                            <tr>
                                                <th scope="row">ID :</th>
                                                <td><?= $d['id']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Name :</th>
                                                <td><?= $d['name']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Objective :</th>
                                                <td><?= $d['objective']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td><a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="changestatus.php?cam_id=<?=$d['id'] ?>&status=<?= $d['status']?>"><?= $d['status']?></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">lifetime budget :</th>
                                                <td><?php if(isset($d['lifetime_budget'])){ echo $d['lifetime_budget']; } ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Impressions :</th>
                                                <td><?php if(isset($insights['impressions'])){ echo $insights['impressions']; } ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Spend :</th>
                                                <td><?php if(isset($insights['spend'])){ echo $insights['spend']; } ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Start date :</th>
                                                <td><?php if(isset($insights['date_start'])){ echo $insights['date_start']; } ?></td>
                                            </tr>
                                            
                                    <?php }else{ ?>
                                            <tr>
                                                <th scope="row">ID :</th>
                                                <td><?= $d['id']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Name :</th>
                                                <td><?= $d['name']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Objective :</th>
                                                <td><?= $d['objective']?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td><a class="mds-btn" data-toggle="modal" data-target="#exampleModal" href="changestatus.php?cam_id=<?=$d['id'] ?>&status=<?= $d['status']?>"><?= $d['status']?></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">lifetime budget :</th>
                                                <td><?php if(isset($d['lifetime_budget'])){ echo $d['lifetime_budget']; } ?></td>
                                            </tr>
                                    <?php } } } ?>
                                  </tbody>
                                  </table>
                                 <?php } ?>
                                       
                                </div>
                                <div class="card-body ">
                                    
                                </div>
                                <div class="card-footer ">
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are You Sure You want to change the Ad STATUS to <?php if($stat == "PAUSED"){echo 'ACTIVE';}else{ echo 'PAUSED'; }  ?>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="changestatus.php?cam_id=<?=$cam_id ?>&status=<?= $stat?>"><?php if($stat == "PAUSED"){echo 'ACTIVE';}else{ echo 'PAUSE'; }  ?></a>
                          </div>
                        </div>
                      </div>
                    </div>


                </div>
            </div>
            
<?php include 'footer.php'; ?>