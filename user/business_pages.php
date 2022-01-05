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
                            if(isset($_GET['bus_id'])){
                                $bus_id = $_GET['bus_id'];
                                try {
                                      // Returns a `Facebook\FacebookResponse` object
                                      
                                      $response = $fb->get('/'.$bus_id.'/owned_pages?fields=id,name,picture,cover,link,category,about,fan_count,website,access_token&type=page&limit=1000', $_SESSION['access_token'])->getDecodedBody();
                                      
                                      
                                    } catch(Facebook\Exceptions\FacebookResponseException $e) {
                                      echo 'Graph returned an error: ' . $e->getMessage();
                                      exit;
                                    } catch(Facebook\Exceptions\FacebookSDKException $e) {
                                      echo 'Facebook SDK returned an error: ' . $e->getMessage();
                                      exit;
                                    }
                        //print_r($response);
                        if(!empty($response['data'])){
                            foreach($response['data'] as $page){ // echo '<pre>';// print_r($page);// echo '</pre>';
                        ?>
                        <div class="col-md-6">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="<?php if(!empty($page['cover']['source'])) { ?><?php echo $page['cover']['source']; ?> <?php }else {echo "#337ab7"; }  ?>" alt="...">
                                </div>
                                <div class="card-body" style="min-height:auto">
                                    <div class="author">
                                      <img class="avatar border-gray" src="<?php echo $page['picture']['data']['url'] ?>" alt="" style="width:80px; height:80px">
                                      <h5 style="color:black" class="title"><?php echo $page['name'] ?></h5>
                                    </div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Likes</td>
                                            <td class="" style="display: block;"><span class="badge bg-success"><?php echo $page['fan_count'] ?></span></td>
                                        </tr>
                                     <!--   <tr>
                                            <td>Category</td>
                                            <td class="" style="display: block;"><span class="badge bg-primary"><?php echo $page['category'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php if(!empty($page['website']))echo $page['website'] ?></span></td>
                                        </tr>
                                        -->
                                        
                                    </tbody>
                                </table>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                   
                                    <a href="<?php echo $page['link'] ?>" class="btn btn-simple btn-link btn-icon"><!--<i class="fa fa-eye"></i> --> Facebook Page Link</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            } 
                          }
                         }
                       ?>
                       <?php include 'fake/business_pages.php'; ?>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>