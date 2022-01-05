<?php  
include '../config.php';
if(empty($_SESSION['access_token'])){
    
    header("Location: $WEBSITE_URL");

}

?>