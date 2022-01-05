<div class="card">
    <div class="card-header">
        <p class="card-category"></p>
    </div>
    <div class="card-body">
        <div class="author">
            <img class="avatar border-gray" src="https://graph.facebook.com/<?= $_SESSION['fbid']; ?>/picture?width=500&height=500&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662" alt="" style="width: 80px; height: 80px;" />
        </div>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <td>Business ID</td>
                <td class="" style="display: block;">
                    <span class="badge bg-success"><?= $_SESSION['fbid'] ? $_SESSION['fbid'] : '3125632047682683'; ?></span>
                </td>
            </tr>
            <tr>
                <td>Business Name</td>
                <td class="" style="display: block;">
                    <span class="badge bg-info"><?= 'Tài khoản demo'; ?></span>
                </td>
            </tr>
            <tr>
                <td>Insta Account</td>
                <td class="" style="display: block;"><span class="badge bg-info">NULL</span></td>
            </tr>
            <tr>
                <td>Assets</td>
                <td class="" style="display: block;">
                    <a class="mds-btn" href="business_pages.php?bus_id=<?=  $_SESSION['fbid'] ? $_SESSION['fbid'] : '3125632047682683'; ?>">Pages</a>
                    <a class="mds-btn" href="business_ad_accounts.php?bus_id=<?=  $_SESSION['fbid'] ? $_SESSION['fbid'] : '3125632047682683'; ?>">Ad Accounts</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
