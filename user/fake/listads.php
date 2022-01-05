<?php
$_SESSION['fbid_test'] = '3125632047682683';
?>
<tr>
    <th scope="row"><?= $_SESSION['fbid_test']?></th>
    <td>POST</td>
    <td>MESSAGE</td>
    <td><?= $_SESSION['fbid_status'] ? $_SESSION['fbid_status'] : 'ACTIVE'; ?></td>
    <td><?= rand(1000000,1050000); ?></td>
    <td><a class="mds-btn" href="adsinsight-beta.php?cam_id=<?= $_SESSION['fbid_test'] ?>">insight</a></td>
</tr>