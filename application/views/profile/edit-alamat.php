<div class="myprofile pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="<?= base_url('profile'); ?>" class="active">My Profile</a></li>
                    <li><a href="<?= base_url('profile/editPassword'); ?>">Edit Password</a></li>
                    <li><a href="<?= base_url('profile/bookingTransaksi'); ?>">Booking Transaksi</a></li>
                    <li><a href="<?= base_url('profile/bookingHistori'); ?>">Booking History</a></li>
                    <li><a href="<?= base_url('member/logout'); ?>">Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <h3><?= $judul; ?></h3>
                <div class="ubah-profile">
                    <form method="POST" action="<?= base_url('profile/ubahAlamat'); ?>">
                        <div class="form-group">
                            <label for="telepon">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"><?= $user['alamat']; ?></textarea>
                            <p><?php echo form_error('alamat', '<div class="text-danger">', '</div>'); ?></p>
                        </div>
                        <button type="submit" class="btn update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>