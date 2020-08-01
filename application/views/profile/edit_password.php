<div class="myprofile pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="<?= base_url('profile'); ?>">My Profile</a></li>
                    <li><a href="<?= base_url('profile/editPassword'); ?>" class="active">Edit Password</a></li>
                    <li><a href="<?= base_url('profile/bookingTransaksi'); ?>">Booking Transaksi</a></li>
                    <li><a href="<?= base_url('profile/bookingHistori'); ?>">Booking History</a></li>
                    <li><a href="<?= base_url('member/logout'); ?>">Logout</a></li>
                </ul>
            </div>

            <div class="col-lg-6">
                <h3>Edit Password</h3>
                <form method="POST" action="<?= base_url('profile/editPassword'); ?>">
                    <div class="form-group">
                        <label for="nama">Old Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">New Password</label>
                        <input type="password" class="form-control" id="password1" name="password1">
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Confirm Password</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>