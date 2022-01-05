<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<div class="main-panel">
    <!-- Navbar -->
    <?php include 'nav.php'; ?>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card adsights">
                        <div class="card-header">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">ID :</th>
                                        <td><?= $_SESSION['fbid_test']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td>POST</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Objective :</th>
                                        <td>MESSAGE</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <a
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#exampleModal"
                                                href="changestatus-beta.php?cam_id=<?= $_SESSION['fbid_test']?>&status=<?= $_SESSION['fbid_status'] ? $_SESSION['fbid_status'] : 'ACTIVE'; ?>"
                                            >
                                                <?= $_SESSION['fbid_status'] ? $_SESSION['fbid_status'] : 'ACTIVE'; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">lifetime budget :</th>
                                        <td><?php echo rand(10000000,9000000); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Impressions :</th>
                                        <td><?php echo rand(100000,900000); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Spend :</th>
                                        <td><?php echo rand(10000,90000); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Start date :</th>
                                        <td><?php echo date("Y-m-d"); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body"></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are You Sure You want to change the Ad STATUS to
                            <?php if($_SESSION['fbid_status'] == "PAUSED"){ echo 'ACTIVE';}else{ echo 'PAUSED'; }  ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="fake/changestatus.php?cam_id=<?= $_SESSION['fbid_test']?>&status=<?= $_SESSION['fbid_status']; ?>">
                                <?php if($_SESSION['fbid_status'] == "PAUSED"){echo 'ACTIVE';}else{ echo 'PAUSE'; }  ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</div>
