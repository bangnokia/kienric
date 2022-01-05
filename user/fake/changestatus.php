<?php
include '../../config.php';
if(isset($_GET['cam_id'])){
    $cam_id = $_GET['cam_id'];
    if(isset($_GET['status'])){
        if($_GET['status'] == 'PAUSED'){
            $newStatus = 'ACTIVE';
        }else{
            $newStatus = 'PAUSED';
        }
        $_SESSION['fbid_status'] = $newStatus;
    }
    
}
header('Location: /user/listads.php');
?>