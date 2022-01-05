<div class="col-md-6">
    <div class="card card-user">
        <div class="card-image">
            <img src="../image/bg.png" alt="..." />
        </div>
        <div class="card-body" style="min-height: auto;">
            <div class="author">
                <img class="avatar border-gray" src="https://graph.facebook.com/<?= $_SESSION['fbid']; ?>/picture?width=500&height=500&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662" alt="" style="width: 80px; height: 80px;" />
                <h5 style="color: black;" class="title"><?= 'Tài khoản demo'; ?></h5>
            </div>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td>Likes</td>
                    <td class="" style="display: block;">
                        <span class="badge bg-success"><?php echo rand(100,1000) ?></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr />
        <div class="button-container mr-auto ml-auto">
            <a href="https://www.facebook.com/4" class="btn btn-simple btn-link btn-icon">
                <!--<i class="fa fa-eye"></i> -->
                Facebook Page Link
            </a>
        </div>
    </div>
</div>
