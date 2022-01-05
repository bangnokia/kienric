<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include '../fb_init.php'; ?>
<div class="main-panel">
            <!-- Navbar -->
            <?php include 'nav.php'; ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        if(isset($_SESSION['fbid'])){
                        try {
                            $graph_account = $fb->get('/me/accounts', $_SESSION['access_token'])->getDecodedBody();
                        } catch (Facebook\Exceptions\FacebookResponseException $e) {
                            echo 'Graph returned an error: ' . $e->getMessage();
                            exit();
                        } catch (Facebook\Exceptions\FacebookSDKException $e) {
                            echo 'Facebook SDK returned an error: ' . $e->getMessage();
                            exit();
                        }
                        //echo var_dump($graph_account);
                        if(isset($graph_account['data']))
                        {
                          foreach($graph_account['data'] as $list_account)
                          {
                          $bus_id = $list_account['id'];
                          try {
                             $graph_page = $fb->get('/'.$bus_id.'/?fields=id,name,picture,cover,link,category,about,fan_count,website,access_token&type=page&limit=1000', $_SESSION['access_token'])->getDecodedBody();
                          
                            } catch (Facebook\Exceptions\FacebookResponseException $ee) {
                                echo 'Graph returned an error: ' . $ee->getMessage();
                                //exit();
                            } catch (Facebook\Exceptions\FacebookSDKException $ee) {
                                echo 'Facebook SDK returned an error: ' . $ee->getMessage();
                                //exit();
                            }
                          if(isset($graph_page['id']))
                          {
                          
                          ?>
                          <div class="col-md-6">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="<?php if(!empty($graph_page['cover']['source'])) { ?><?php echo $graph_page['cover']['source']; ?> <?php }else {echo "/image/bg.png"; }  ?>" alt="...">
                                </div>
                                <div class="card-body" style="min-height:auto">
                                    <div class="author">
                                      <img class="avatar border-gray" src="<?php echo $graph_page['picture']['data']['url'] ?>" alt="" style="width:80px; height:80px">
                                      <h5 style="color:black" class="title"><?php echo $graph_page['name'] ?></h5>
                                    </div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Likes</td>
                                            <td class="" style="display: block;"><span class="badge bg-success"><?php echo $graph_page['fan_count'] ?></span></td>
                                        </tr>
                                     <!--   <tr>
                                            <td>Category</td>
                                            <td class="" style="display: block;"><span class="badge bg-primary"><?php echo $graph_page['category'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php if(!empty($graph_page['website']))echo $graph_page['website'] ?></span></td>
                                        </tr>
                                        -->
                                        
                                    </tbody>
                                </table>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                   
                                    <a href="<?php echo $graph_page['link'] ?>" class="btn btn-simple btn-link btn-icon"><!--<i class="fa fa-eye"></i> --> Facebook Page Link</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            
                            } 
                            } 
                          }
                         }
                       ?>
                       <?php ;//include 'fake/business_pages.php'; ?>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>