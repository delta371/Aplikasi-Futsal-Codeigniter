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
                    <form method="POST" action="<?= base_url('profile/ubahGenderAksi'); ?>">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control" name="gender" id="gender">
                                <?php if ($user['gender'] == 'pria') { ?>
                                    <option value="<?= $user['gender']; ?>">Pria</option>
                                    <option value="wanita">Wanita</option>
                                <?php } else { ?>
                                    <option value="<?= $user['gender']; ?>">Wanita</option>
                                    <option value="pria">Pria</option>
                                <?php } ?>
                            </select>
                            <p><?php echo form_error('telepon', '<div class="text-danger">', '</div>'); ?></p>
                        </div>
                        <button type="submit" class="btn update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>