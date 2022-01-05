<div class="sidebar" data-image="assets/img/sidebar-4.jpg" data-color="black">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <h2>Kienric</h2>
                <ul>
                
                <li>
                    <a href="index.php">
                        <img src="assets/img/dashboard-icon.png"> 
                       Dashboard
                    </a>
                </li>
                    <li>
                        <a href="listaccounts.php">
                            <img src="assets/img/panel-icon.png"> 
                            List Accounts
                        </a>
                    </li>
                    <li>
                        <a href="listbusiness.php">
                            <img src="assets/img/panel-icon.png"> 
                            List Business
                        </a>
                    </li>
                    <li>
                        <a href="listads.php">
                            <img src="assets/img/panel-icon.png"> 
                            List Ads
                        </a>
                    </li>
                    
                <?php /*   
                <li class="nav-item active">
                        <a class="nav-link" href="pages_list.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Pages List</p>
                        </a>
                    </li>
                <li class="nav-item active">
                        <a class="nav-link" href="listbusiness.php">
                        <!--    <i class="nc-icon nc-chart-pie-35"></i> -->
                            <p>List Business</p>
                        </a>
                    </li>
                <li class="nav-item active">
                        <a class="nav-link" href="adsinsight.php">
                        <!--    <i class="nc-icon nc-chart-pie-35"></i> -->
                            <p>Ads Insights</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">
                        <!--    <i class="nc-icon nc-chart-pie-35"></i> -->
                            <p>Dashboard</p>
                        </a>
                    </li>
                   <li class="nav-item active">
                        <a class="nav-link" href="post_to_facebook.php">
                       <!--      <i class="nc-icon nc-send"></i> -->
                            <p>Post To Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="best_posts.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Best Posts</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="pages_list.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Pages List</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="groups_list.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Groups List</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="groupPostsByTag.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Group POST By Tag</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="groupEditedPosts.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>Groups Edited POST</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="TopPostAnyPage.php">
                      <!--       <i class="fa fa-list"></i> -->
                            <p>TOP POST ANY PAGE</p>
                        </a>
                    </li>
                 
                    <li class="nav-item active">
                        <a class="nav-link" href="search_page.php">
                      <!--       <i class="nc-icon nc-zoom-split"></i> -->
                            <p>Page Search</p>
                        </a>
                    </li>
                    <?php /* foreach($_SESSION['pages'] as $page){ ?>
                    <li>
                        <a class="nav-link" href="inbox.php?page_id=<?php echo $page['id'] ?>">
                            <img src="<?php echo $page['picture']['data']['url'];  ?>" width="50" />
                            <p><?php echo $page['name'] ?></p>
                        </a>
                    </li>
                    <?php  } */ ?>
                    
                    <li>
                        <a href="logout.php">
                             <img src="assets/img/logout-icon.png"> 
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <script>
        jQuery(document).ready(function(){
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
             jQuery('.sidebar-wrapper ul li a').each(function() {
              if (this.href === path) {
               jQuery(this).addClass('active');
              }
             });
        });
            
        </script>