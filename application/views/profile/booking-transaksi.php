<div class="myprofile pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="<?= base_url('profile'); ?>">My Profile</a></li>
                    <li><a href="<?= base_url('profile/editPassword'); ?>">Edit Password</a></li>
                    <li><a href="<?= base_url('profile/bookingTransaksi'); ?>" class="active">Booking Transaksi</a></li>
                    <li><a href="<?= base_url('profile/bookingHistori'); ?>">Booking History</a></li>
                    <li><a href="<?= base_url('member/logout'); ?>">Logout</a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <h3><?= $judul; ?></h3>

                <div class="transaksi">
                    <table class="table-bordered table-striped text-center" width="1200px" height="100%">
                        <thead class="text-white" style="background-color: #fbc02d;">
                            <tr height="50px">
                                <th scope="col">Kode Booking</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Booking</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Total Jam</th>
                                <th scope="col">Lapangan</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col">Uang Muka</th>
                                <th scope="col">Sisa Bayar</th>
                                <th scope="col">Action</th>
                                <th scope="col">Batal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($booking == 0) { ?>
                                <td></td>
                            <?php } else { ?>
                                <tr>
                                    <td><?= $booking['kd_booking']; ?></td>
                                    <td><?= $booking['nama']; ?></td>
                                    <td><?= tanggal($booking['tgl_booking']); ?></td>
                                    <td><?= $booking['jam_mulai']; ?></td>
                                    <td><?= $booking['total_jam']; ?></td>
                                    <td><?= $booking['nm_lapangan']; ?></td>
                                    <td>IDR <?= number_format($invoice['total_bayar'], 0, ',', ','); ?></td>
                                    <td>IDR <?= number_format($invoice['uang_muka'], 0, ',', ','); ?></td>
                                    <td>IDR <?= number_format($invoice['sisa_bayar'], 0, ',', ','); ?></td>
                                    <?php if ($booking['status_main'] == 'Selesai') { ?>
                                        <td><a href="<?= base_url('booking/bookingSelesai/' . $booking['id_user']); ?>" class="btn btn-success text-white">Selesai</a></td>
                                    <?php } elseif ($booking['status_main'] == 'Belum Selesai') { ?>
                                        <td><a href="<?= base_url('booking/finishBook'); ?>" class="btn btn-success">Cek Pembayaran</a></td>
                                    <?php } elseif ($booking['status_main'] == 'Sedang Proses') { ?>
                                        <td><a href="<?= base_url('booking/finishBook'); ?>" class="btn btn-success">Cek Pembayaran</a></td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>


                                    <?php if ($booking['status_main'] == 'Selesai') { ?>
                                        <td><button data-toggle="modal" data-target="#infoBatal" class="btn btn-danger">Batal</button></td>
                                    <?php } elseif ($booking['status_main'] == 'Belum Selesai') { ?>
                                        <td>
                                            <av href="<?= base_url('booking/batal_booking/' . $booking['id_user']); ?>" id="batal-booking" class="btn btn-danger batal_booking">Batal</av>
                                        </td>
                                    <?php } elseif ($booking['status_main'] == 'Sedang Proses') { ?>
                                        <td>
                                            <av href="<?= base_url('booking/batal_booking/' . $booking['id_user']); ?>" id="batal-booking" class="btn btn-danger batal_booking">Batal</av>
                                        </td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>

                                <?php } ?>




                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>