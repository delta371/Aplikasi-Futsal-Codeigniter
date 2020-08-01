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
                    <form method="POST" action="<?= base_url('profile/ubahTglLahirAksi'); ?>">
                        <div class="form-group">
                            <label for="tgl_lahir">Telepon</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tanggal_lahir']; ?>">
                            <div class="icon"><img src="<?= base_url('assets/img/icon/birthday.png'); ?>" alt=""></div>
                            <p><?php echo form_error('telepon', '<div class="text-danger">', '</div>'); ?></p>
                        </div>
                        <button type="submit" class="btn update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>