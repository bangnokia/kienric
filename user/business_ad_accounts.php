<?php

include 'header.php' ?>
<?php include 'sidebar.php' ?>
   <div class="main-panel">
    <!-- Navbar -->
    <?php 
        include 'nav.php'; 
        include 'getBusiness.php';
        ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                         <?php 
                         if(isset($_GET['bus_id'])) {
                            $bus_id = $_GET['bus_id'];
                            try {
                            // Returns a `Facebook\FacebookResponse` object
                            $response = $fb->get('/'.$bus_id.'/owned_ad_accounts?fields=name,amount_spent,business_city,currency', $_SESSION['access_token'])->getBody();
                            var_dump($response);
                            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                             echo 'Graph returned an error: ' . $e->getMessage();
//                            exit;
                            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                           echo 'Facebook SDK returned an error: ' . $e->getMessage();
//                            exit;
                          }
                        if(!empty($response['data'])){
                        foreach ($response['data'] as $ad){
                        ?>
                        <div class="col-md-12">
                            <div class="card ">
                                <table class="table">
                                    <tbody>
                                        
                                        <tr>
                                            <td>Ad Account ID</td>
                                            <td class="" style="display: block;"><span class="badge bg-success"><?php echo $ad['id'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Ad Account Name</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $ad['name'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Business City</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $ad['business_city'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Currency</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $ad['currency'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Amount Spent</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $ad['amount_spent'] ?></span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                
                                <div class="card-footer ">
                                 
                                </div>
                            </div>
                        </div>
                        <?php 
                           } 
                          }
                         }
                         ?>
<!--                     --><?php //include 'fake/business_ad_accounts.php';  ?>
                    </div>
             
                </div>
            </div>
            
<?php include 'footer.php'; ?>