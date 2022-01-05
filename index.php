<?php  include 'config.php' ?>
<?php  include 'fb_init.php' ?>
<?php  include 'head.php' ?>

<div class="row">
<div class="col-md-6 col-sm-12 d-none d-sm-block" style="height:0 auto;background-image: url('/image/logo.png');background-repeat: no-repeat;background-size: cover;">
    <!--div class="p-4 text-center card-body">
        <img class="img-fluid" src="/image/logo.png" style="height:100%;background-repeat: repeat;background-size: cover;">    
   </div-->  
</div>
<div class="col-md-6 col-sm-12">
<div class="login-with-fb3">
    <h2><i class="fa fa-refresh fa-spin"></i> Kienric</h2>
     <div cclass="content">
        <h3>Kienric </h3>
        <p>Will provide users to Manage his business and Ads, also could see Ads Insights</p>
        <div class="fbbuttons">                     
        <a id="fbbtns" href="
        <?php 
        $permissions = ['pages_show_list','pages_read_engagement','ads_read' ,'ads_management', 'business_management','pages_show_list']; // Optional permissions // ,'manage_pages', 'read_page_mailboxes', 'publish_pages', 'read_insights'
        $loginUrl = $helper->getLoginUrl($WEBSITE_URL.'/fb-callback.php', $permissions);
        echo '' . htmlspecialchars($loginUrl) . '"'; ?>">
        <i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook
        </a> 
        <a href="kienric/policy.php" class="privacys">Privacy Policy</a>
     </div> 
     <!--- fbbuttons ---->
</div>
</div>
<!-- /./ -->
<style>
    #fbbtns
    {
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
	display: inline-block;
	padding: 15px 55px;
	width:100%;
	text-align:center;
	margin-bottom:10px;
	background: #4267b2;
	color: #fff;
	font-size: 18px;
	border-radius: 2px;
    }
</style>
<!-- /./ -->
</div>
</div>