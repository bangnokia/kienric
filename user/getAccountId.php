<?php
if(empty($_SESSION['adaccounts']))
{
    $data = $fb->get('/'.$_SESSION['fbid'].'/adaccounts?fields=id,name,adaccounts', $_SESSION['access_token'])->getDecodedBody();
    $_SESSION['adaccounts'] = $data['data'];
}
?>