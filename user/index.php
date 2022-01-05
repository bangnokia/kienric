<?php include '../config.php' ?>
<?php include 'header.php' ?>
        <?php include 'sidebar.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'nav.php'; ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="hello-box">
                        <div class="left">
                              <h2>
                              Welcome!
                              <?php if(isset($_SESSION['access_token'])) echo $_SESSION['name']; else echo 'Người dùng Facebook'; ?>
                              </h2>
                              <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>-->
                        </div> <!-- left -->
                        <div class="right">
                          <img src="assets/img/hello.png">
                      </div> <!-- right -->
                  </div> <!-- hello-box -->
                    
                </div>
            </div>
            
<?php include 'footer.php'; ?>