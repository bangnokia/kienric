<?php  include '../head.php' ?>
<script>
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '219364460182899',
      cookie     : true,
      xfbml      : true,
      version    : 'v12.0'
    });
    FB.AppEvents.logPageView();   
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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
        <h3>Kienric</h3>
        <p>Will provide users to Manage his business and Ads, also could see Ads Insights</p>
        <div class="fbbuttons">   
        <fb:login-button class="h3" id="fbbtns" scope="public_profile,email" onlogin="checkLoginState();">
          Login with Facebook
        </fb:login-button>
        <a href="policy.php" class="privacys">Privacy Policy</a>
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
<script>
$(function() {
FB.getLoginStatus(function(response) {
    data = response;
    if(data.status === 'connected'){
        $.ajax({
            url: 'kienric/fb-callback.php',
            method: 'POST',
            dataType: 'json',
            data: { 
                accessToken: data.authResponse.accessToken, 
                userID: data.authResponse.userID 
            },
            success:function(result){
             if(result == 'success') alert('Your are login Facebook') 
             else alert('Your are not login Facebook')  
            },
            error: function(){
              alert('URL Callback not Found')
            }
        })
    }
    /*
    {
    status: 'connected',
    authResponse: {
        accessToken: '...',
        expiresIn:'...',
        signedRequest:'...',
        userID:'...'
    }
    }
    */
});   
})

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>
<!-- /./ -->
</div>
</div>