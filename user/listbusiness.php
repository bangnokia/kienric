<?php
use function Couchbase\defaultDecoder;

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
                        <div class="col-md-12">
                            <div class="businesslist-section">
                                <?php 
                                if(isset($_SESSION['business'])){
                                foreach ($_SESSION['business'] as $bus){
                                ?>
                                <div class="card ">
                                <div class="card-header ">
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body ">
                                 <div class="author">
                                   <img class="avatar border-gray" src="<?= $bus['profile_picture_uri'] ?>" alt="" style="width:80px; height:80px">
                                  </div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        
                                        <tr>
                                            <td>Business ID</td>
                                            <td class="" style="display: block;"><span class="badge bg-success"><?php echo $bus['id'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Business Name</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $bus['name'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Insta Account</td>
                                            <td class="" style="display: block;"><span class="badge bg-info"><?php echo $bus['instagram_accounts']['data'][0]['username'] ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Assets</td>
                                            <td class="" style="display: block;"><a class="mds-btn" href="business_pages.php?bus_id=<?= $bus['id'] ?>">Pages</a> <a class="mds-btn" href="business_ad_accounts.php?bus_id=<?= $bus['id'] ?>">Ad Accounts</a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                </div>
                                <?php 
                                } 
                                }
                                ?>
                            </div>
                         
                        </div>
                    <div class="col-md-12">
                            <div class="businesslist-section">
<!--                       --><?php //include 'fake/listbusiness.php';  ?><!--    -->
                        </div>
                     </div>
                            
                    </div>
                    
                </div>
            </div>
            
<?php include 'footer.php'; ?>