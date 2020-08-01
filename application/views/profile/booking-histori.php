<div class="myprofile pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="<?= base_url('profile'); ?>">My Profile</a></li>
                    <li><a href="<?= base_url('profile/editPassword'); ?>">Edit Password</a></li>
                    <li><a href="<?= base_url('profile/bookingTransaksi'); ?>">Booking Transaksi</a></li>
                    <li><a href="<?= base_url('profile/bookingHistori'); ?>" class="active">Booking History</a></li>
                    <li><a href="<?= base_url('member/logout'); ?>">Logout</a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <h3><?= $judul; ?></h3>

                <div class="histori mt-3">
                    <div class="row">
                        <?php foreach ($histori as $h) : ?>
                            <div class="col-lg-4">
                                <h5 class="text-danger"><?= $h['kd_invoice']; ?></h5><br>
                                <h5><?= $h['status']; ?></h5><br>

                                <h5>Date Added:</h5>
                                <p class="text-secondary"><?= bulan($h['tgl_input']); ?></p>
                                <h5>Customer:</h5>
                                <p class="text-secondary"><?= $h['nama']; ?></p>
                                <h5>Lapangan:</h5>
                                <p class="text-secondary"><?= $h['nm_lapangan']; ?> Futsal+</p>

                                <p>IDR <?= number_format($h['total_bayar'], 0, ',', ','); ?></p>
                                <a href="" class="btn text-white rounded-0" style="background-color: black;">VIEW</a>
                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>
                <p><?= $this->pagination->create_links(); ?></p>
            </div>

        </div>
    </div>
</div>